<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipment;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentConstraint;
use Symfony\Component\Validator\Constraint;

final class TrackingShipmentFixture
{
    public static function build(): TrackingShipment
    {
        return TrackingShipment::builder()
            ->setTtl(15552000)
            ->setReturnFlag(false)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): TrackingShipment */
    public static function reader(): callable
    {
        return TrackingShipment::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return TrackingShipmentConstraint::constraints();
    }
}
