<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Tilt;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TiltUnit;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TiltConstraint;
use Symfony\Component\Validator\Constraint;

final class TiltFixture
{
    public static function build(): Tilt
    {
        return Tilt::builder()
            ->setUnit(TiltUnit::degree)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Tilt */
    public static function reader(): callable
    {
        return Tilt::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TiltConstraint::constraints();
    }
}
