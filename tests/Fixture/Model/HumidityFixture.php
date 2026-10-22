<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Humidity;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\HumidityUnit;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\HumidityConstraint;
use Symfony\Component\Validator\Constraint;

final class HumidityFixture
{
    public static function build(): Humidity
    {
        return Humidity::builder()
            ->setUnit(HumidityUnit::percentage)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Humidity */
    public static function reader(): callable
    {
        return Humidity::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return HumidityConstraint::constraints();
    }
}
