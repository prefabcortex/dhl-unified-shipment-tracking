<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\DgfAirport;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\DgfAirportConstraint;
use Symfony\Component\Validator\Constraint;

final class DgfAirportFixture
{
    public static function build(): DgfAirport
    {
        return DgfAirport::builder()
            ->setDgfLocationCode('AMS')
            ->setDgfLocationName('GOTHENBURG')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): DgfAirport */
    public static function reader(): callable
    {
        return DgfAirport::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return DgfAirportConstraint::constraints();
    }
}
