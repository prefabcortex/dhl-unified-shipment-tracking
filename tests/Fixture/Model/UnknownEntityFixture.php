<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\UnknownEntity;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\UnknownEntityConstraint;
use Symfony\Component\Validator\Constraint;

final class UnknownEntityFixture
{
    public static function build(): UnknownEntity
    {
        return UnknownEntity::builder('UnknownEntity')->build();
    }

    /** @return callable(array<int|string, mixed>): UnknownEntity */
    public static function reader(): callable
    {
        return UnknownEntity::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return UnknownEntityConstraint::constraints();
    }
}
