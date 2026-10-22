<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Provider;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ProviderDestinationProvider;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ProviderConstraint;
use Symfony\Component\Validator\Constraint;

final class ProviderFixture
{
    public static function build(): Provider
    {
        return Provider::builder(ProviderDestinationProvider::acs_courier)->build();
    }

    /** @return callable(array<int|string, mixed>): Provider */
    public static function reader(): callable
    {
        return Provider::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ProviderConstraint::constraints();
    }
}
