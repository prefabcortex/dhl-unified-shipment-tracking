<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Pressure;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\PressureUnit;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\PressureConstraint;
use Symfony\Component\Validator\Constraint;

final class PressureFixture
{
    public static function build(): Pressure
    {
        return Pressure::builder()
            ->setUnit(PressureUnit::pascal)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Pressure */
    public static function reader(): callable
    {
        return Pressure::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return PressureConstraint::constraints();
    }
}
