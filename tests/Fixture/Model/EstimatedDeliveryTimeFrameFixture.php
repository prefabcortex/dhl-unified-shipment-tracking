<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\EstimatedDeliveryTimeFrame;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\EstimatedDeliveryTimeFrameConstraint;
use Symfony\Component\Validator\Constraint;

final class EstimatedDeliveryTimeFrameFixture
{
    public static function build(): EstimatedDeliveryTimeFrame
    {
        return EstimatedDeliveryTimeFrame::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): EstimatedDeliveryTimeFrame */
    public static function reader(): callable
    {
        return EstimatedDeliveryTimeFrame::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return EstimatedDeliveryTimeFrameConstraint::constraints();
    }
}
