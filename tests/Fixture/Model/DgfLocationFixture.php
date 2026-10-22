<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\DgfLocation;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\DgfLocationConstraint;
use Symfony\Component\Validator\Constraint;

final class DgfLocationFixture
{
    public static function build(): DgfLocation
    {
        return DgfLocation::builder()
            ->setDgfLocationName('GOTHENBURG')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): DgfLocation */
    public static function reader(): callable
    {
        return DgfLocation::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return DgfLocationConstraint::constraints();
    }
}
