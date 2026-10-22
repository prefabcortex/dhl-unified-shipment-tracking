<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\QuantitativeValue;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\QuantitativeValueConstraint;
use Symfony\Component\Validator\Constraint;

final class QuantitativeValueFixture
{
    public static function build(): QuantitativeValue
    {
        return QuantitativeValue::builder()
            ->setUnitText('m')
            ->setValue(1.5)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): QuantitativeValue */
    public static function reader(): callable
    {
        return QuantitativeValue::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return QuantitativeValueConstraint::constraints();
    }
}
