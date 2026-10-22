<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\ServicePoint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ServicePointConstraint;
use Symfony\Component\Validator\Constraint;

final class ServicePointFixture
{
    public static function build(): ServicePoint
    {
        return ServicePoint::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): ServicePoint */
    public static function reader(): callable
    {
        return ServicePoint::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ServicePointConstraint::constraints();
    }
}
