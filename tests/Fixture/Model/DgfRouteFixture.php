<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\DgfRoute;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\DgfRouteConstraint;
use Symfony\Component\Validator\Constraint;

final class DgfRouteFixture
{
    public static function build(): DgfRoute
    {
        return DgfRoute::builder()
            ->setDgfVesselName('MAERSK SARAT')
            ->setDgfVoyageFlightNumber('TR TRUCK')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): DgfRoute */
    public static function reader(): callable
    {
        return DgfRoute::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return DgfRouteConstraint::constraints();
    }
}
