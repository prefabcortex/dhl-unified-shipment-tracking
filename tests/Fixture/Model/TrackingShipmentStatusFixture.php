<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\StatusCode;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipmentStatus;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentStatusConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingShipmentStatusFixture
{
    public static function build(): TrackingShipmentStatus
    {
        return TrackingShipmentStatus::builder(
            // timestamp
            'REPLACE_ME',
            // statusCode
            StatusCode::delivered,
        )->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingShipmentStatus */
    public static function reader(): callable
    {
        return TrackingShipmentStatus::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingShipmentStatusConstraint::constraints();
    }
}
