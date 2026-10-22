<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecuredPlace;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\SecuredPlaceConstraint;
use Symfony\Component\Validator\Constraint;

final class SecuredPlaceFixture
{
    public static function build(): SecuredPlace
    {
        return SecuredPlace::builder()->build();
    }

    /** @return callable(array<int|string, mixed>): SecuredPlace */
    public static function reader(): callable
    {
        return SecuredPlace::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return SecuredPlaceConstraint::constraints();
    }
}
