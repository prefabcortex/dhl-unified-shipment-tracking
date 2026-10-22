<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Measurement;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecretPolicy;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\MeasurementConstraint;
use Symfony\Component\Validator\Constraint;

final class MeasurementFixture
{
    public static function build(): Measurement
    {
        return Measurement::builder()
            ->setPolicy(SecretPolicy::postal_code)
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Measurement */
    public static function reader(): callable
    {
        return Measurement::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return MeasurementConstraint::constraints();
    }
}
