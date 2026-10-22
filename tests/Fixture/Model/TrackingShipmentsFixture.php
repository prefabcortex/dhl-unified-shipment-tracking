<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipments;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentsConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingShipmentsFixture
{
    public static function build(): TrackingShipments
    {
        return TrackingShipments::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingShipments */
    public static function reader(): callable
    {
        return TrackingShipments::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingShipmentsConstraint::constraints();
    }
}
