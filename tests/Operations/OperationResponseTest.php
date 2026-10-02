<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Operations;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Prefabcortex\DhlUnifiedShipmentTracking\Client;
use Prefabcortex\DhlUnifiedShipmentTracking\ClientConfig;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\ApiException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\GetTrackingShipmentNotFoundException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\MalformedDataException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\UnexpectedContentTypeException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\UnexpectedStatusCodeException;
use Prefabcortex\DhlUnifiedShipmentTracking\Http\JsonBody;
use Prefabcortex\DhlUnifiedShipmentTracking\Parameter\GetTrackingShipmentQueryParameters;
use Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\CannedResponse;
use Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\ModelFixtures;
use Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\RecordingHttpClient;
use RuntimeException;

use function sprintf;

/**
 * Every response an operation reads, answered once through the method that reads it.
 *
 * A recorded client answers with the status and content type of one branch and a body built from
 * the model fixtures; the test checks that the model comes back, or the declared exception with the
 * response still readable. A status no response declares and a declared status under the wrong
 * content type are answered too.
 *
 * What this cannot show: that the service sends these documents. They come from the same
 * description the client came from, so this proves the package reads what it promises.
 */
final class OperationResponseTest extends TestCase
{
    private const string BASE_URL = 'https://response-test.invalid';

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testGetTrackingShipmentReads200(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildTrackingShipments());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(200, 'application/json', $body));
        $client = Client::create(ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient));
        try {
            $result = $client->getTrackingShipment(new GetTrackingShipmentQueryParameters('smoke-test'));
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'getTrackingShipment', 200, $error::class, $error->getMessage()),
            );
        }
        self::assertEquals(ModelFixtures::buildTrackingShipments(), $result);
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testGetTrackingShipmentReads404AsProblemJson(): void
    {
        $body = JsonBody::encode(ModelFixtures::buildProblemDetail());
        $httpClient = new RecordingHttpClient(CannedResponse::answering(404, 'application/problem+json', $body));
        $client = Client::create(ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient));
        try {
            $client->getTrackingShipment(new GetTrackingShipmentQueryParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw GetTrackingShipmentNotFoundException for its %d response',
                    'getTrackingShipment',
                    404,
                ),
            );
        } catch (GetTrackingShipmentNotFoundException $exception) {
            self::assertSame(404, $exception->getResponse()->getStatusCode());
            self::assertEquals(ModelFixtures::buildProblemDetail(), $exception->getProblemDetail());
            self::assertSame($body, $exception->getRawResponse());
            self::assertSame($body, $exception->getResponse()->getBody()->getContents());
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'getTrackingShipment', 404, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testGetTrackingShipmentRejectsAnUndeclaredStatus(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                599,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient));
        try {
            $client->getTrackingShipment(new GetTrackingShipmentQueryParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedStatusCodeException for a %d response it cannot read',
                    'getTrackingShipment',
                    599,
                ),
            );
        } catch (UnexpectedStatusCodeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'getTrackingShipment', 599, $error::class, $error->getMessage()),
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws MalformedDataException
     * @throws RuntimeException
     */
    public function testGetTrackingShipmentRejectsAnUndeclaredContentType(): void
    {
        $httpClient = new RecordingHttpClient(
            CannedResponse::answering(
                200,
                'text/html',
                '<html><body>Served by something in front of the API</body></html>',
            ),
        );
        $client = Client::create(ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient));
        try {
            $client->getTrackingShipment(new GetTrackingShipmentQueryParameters('smoke-test'));
            self::fail(
                sprintf(
                    '%s did not throw UnexpectedContentTypeException for a %d response it cannot read',
                    'getTrackingShipment',
                    200,
                ),
            );
        } catch (UnexpectedContentTypeException $exception) {
            self::assertSame(
                '<html><body>Served by something in front of the API</body></html>',
                $exception->getResponse()->getBody()->getContents(),
            );
        } catch (ApiException $error) {
            self::fail(
                sprintf('%s answered %d with %s: %s', 'getTrackingShipment', 200, $error::class, $error->getMessage()),
            );
        }
    }
}
