<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Examples\Operations;

use Prefabcortex\DhlUnifiedShipmentTracking\Client;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\ApiException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\GetTrackingShipmentNotFoundException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\MalformedResponseException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\ResponseValidationException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\TransportException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\UnexpectedContentTypeException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\UnexpectedStatusCodeException;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\UnsupportedValueException;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipments;
use Prefabcortex\DhlUnifiedShipmentTracking\Parameter\GetTrackingShipmentQueryParameters;

final class GetTrackingShipmentExample
{
    /**
     * Retrieves the tracking information for shipments(s). The shipments are identified using the
     * required `trackingNumber` query parameter.
     *
     * Usage: pass an already-authenticated Client (see examples/Auth/).
     *
     *   $client = Client::withDHLAPIKey($apiKey, $config); // see examples/Auth/
     *   $queryParameters = new GetTrackingShipmentQueryParameters($trackingNumber);
     *   GetTrackingShipmentExample::getTrackingShipment($client, $queryParameters);
     *
     * @throws ApiException
     * @throws UnsupportedValueException
     * @throws TransportException
     * @throws ResponseValidationException
     * @throws MalformedResponseException
     * @throws GetTrackingShipmentNotFoundException
     * @throws UnexpectedContentTypeException
     * @throws UnexpectedStatusCodeException
     */
    public static function getTrackingShipment(
        Client $client,
        GetTrackingShipmentQueryParameters $queryParameters,
    ): TrackingShipments {
        return $client->getTrackingShipment($queryParameters);
    }
}
