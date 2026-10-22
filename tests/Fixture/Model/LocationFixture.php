<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Location;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\LocationConstraint;
use Symfony\Component\Validator\Constraint;

final class LocationFixture
{
    public static function build(): Location
    {
        return Location::builder()
            ->setLat(18.556873)
            ->setLon(-70.06104000000001)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Location */
    public static function reader(): callable
    {
        return Location::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return LocationConstraint::constraints();
    }
}
