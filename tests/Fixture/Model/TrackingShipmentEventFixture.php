<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\StatusCode;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipmentEvent;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentEventConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingShipmentEventFixture
{
    public static function build(): TrackingShipmentEvent
    {
        return TrackingShipmentEvent::builder(
            // timestamp
            'REPLACE_ME',
            // statusCode
            StatusCode::delivered,
        )->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingShipmentEvent */
    public static function reader(): callable
    {
        return TrackingShipmentEvent::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingShipmentEventConstraint::constraints();
    }
}
