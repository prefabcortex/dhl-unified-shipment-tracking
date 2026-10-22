<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Reference;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ReferenceType;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ReferenceConstraint;
use Symfony\Component\Validator\Constraint;

final class ReferenceFixture
{
    public static function build(): Reference
    {
        return Reference::builder(ReferenceType::container_number)->build();
    }

    /** @return callable(array<int|string, mixed>): Reference */
    public static function reader(): callable
    {
        return Reference::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ReferenceConstraint::constraints();
    }
}
