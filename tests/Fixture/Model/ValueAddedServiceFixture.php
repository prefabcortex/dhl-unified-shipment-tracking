<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\ValueAddedService;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ValueAddedServiceConstraint;
use Symfony\Component\Validator\Constraint;

final class ValueAddedServiceFixture
{
    public static function build(): ValueAddedService
    {
        return ValueAddedService::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): ValueAddedService */
    public static function reader(): callable
    {
        return ValueAddedService::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ValueAddedServiceConstraint::constraints();
    }
}
