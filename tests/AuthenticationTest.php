<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Prefabcortex\DhlUnifiedShipmentTracking\Client;
use Prefabcortex\DhlUnifiedShipmentTracking\ClientConfig;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\ApiException;
use Prefabcortex\DhlUnifiedShipmentTracking\Parameter\GetTrackingShipmentQueryParameters;
use Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\CannedResponse;
use Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\RecordingHttpClient;
use RuntimeException;

use function print_r;
use function sprintf;

/**
 * Each way of building a client, called against an operation it can authenticate.
 *
 * The assertions look only at what the credentials put on the wire: a header, a query parameter, an
 * `Authorization` line. Where a requirement names several schemes, all of their marks are checked
 * on the same request — half a signature is no signature.
 *
 * A factory that no operation in this description requires has no test here: nothing it signs could
 * be observed.
 */
final class AuthenticationTest extends TestCase
{
    private const string BASE_URL = 'https://auth-test.invalid';

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function testWithDHLAPIKeySignsTheRequest(): void
    {
        $httpClient = new RecordingHttpClient(CannedResponse::empty());
        try {
            $client = Client::withDHLAPIKey(
                'placeholder-credential',
                ClientConfig::forBaseUrl(self::BASE_URL)->withHttpClient($httpClient),
            );
            self::assertStringNotContainsString(
                'placeholder-credential',
                print_r($client, true),
                'printing the client shows its credentials',
            );
            $client->getTrackingShipmentRaw(new GetTrackingShipmentQueryParameters('smoke-test'));
        } catch (ApiException $error) {
            self::fail(sprintf('%s could not be called: %s', 'withDHLAPIKey', $error->getMessage()));
        }
        $requests = $httpClient->getRequests();
        self::assertCount(1, $requests, 'the operation did not hand exactly one request to the HTTP client');
        foreach ($requests as $request) {
            self::assertSame(
                'placeholder-credential',
                $request->getHeaderLine('DHL-API-Key'),
                'the request went out without the credentials of the "DHL-API-Key" scheme',
            );
        }
    }
}
