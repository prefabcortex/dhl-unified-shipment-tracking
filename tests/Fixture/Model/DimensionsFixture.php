<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Dimensions;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\DimensionsConstraint;
use Symfony\Component\Validator\Constraint;

final class DimensionsFixture
{
    public static function build(): Dimensions
    {
        return Dimensions::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): Dimensions */
    public static function reader(): callable
    {
        return Dimensions::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return DimensionsConstraint::constraints();
    }
}
