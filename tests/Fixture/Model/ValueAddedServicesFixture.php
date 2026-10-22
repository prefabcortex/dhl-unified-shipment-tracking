<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\ValueAddedServices;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ValueAddedServicesConstraint;
use Symfony\Component\Validator\Constraint;

final class ValueAddedServicesFixture
{
    public static function build(): ValueAddedServices
    {
        return ValueAddedServices::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): ValueAddedServices */
    public static function reader(): callable
    {
        return ValueAddedServices::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ValueAddedServicesConstraint::constraints();
    }
}
