<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Temperature;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TemperatureUnit;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TemperatureConstraint;
use Symfony\Component\Validator\Constraint;

final class TemperatureFixture
{
    public static function build(): Temperature
    {
        return Temperature::builder()
            ->setUnit(TemperatureUnit::celsius)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Temperature */
    public static function reader(): callable
    {
        return Temperature::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TemperatureConstraint::constraints();
    }
}
