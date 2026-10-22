<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipmentDetails;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentDetailsConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingShipmentDetailsFixture
{
    public static function build(): TrackingShipmentDetails
    {
        return TrackingShipmentDetails::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingShipmentDetails */
    public static function reader(): callable
    {
        return TrackingShipmentDetails::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingShipmentDetailsConstraint::constraints();
    }
}
