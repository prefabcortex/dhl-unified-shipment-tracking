<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Examples\Auth;

use InvalidArgumentException;
use Prefabcortex\DhlUnifiedShipmentTracking\Client;
use Prefabcortex\DhlUnifiedShipmentTracking\ClientConfig;
use Prefabcortex\DhlUnifiedShipmentTracking\Exception\NoHttpClientException;
use Prefabcortex\DhlUnifiedShipmentTracking\Server;
use RuntimeException;

use function getenv;

/**
 * Example: authenticate against the "DHL-API-Key" API key scheme.
 *
 * Usage: set DHL_API_KEY_API_KEY in the environment, then
 *
 *   $client = getDHLAPIKeyClient();
 *
 * @throws RuntimeException
 * @throws InvalidArgumentException
 * @throws NoHttpClientException
 */
function getDHLAPIKeyClient(): Client
{
    $apiKey = getenv('DHL_API_KEY_API_KEY');

    if (false === $apiKey) {
        throw new RuntimeException('Set DHL_API_KEY_API_KEY before running this example.');
    }

    return Client::withDHLAPIKey($apiKey, ClientConfig::forServer(Server::TestServer));
}
