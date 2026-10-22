<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecretPolicy;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecuredAddress;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\SecuredAddressConstraint;
use Symfony\Component\Validator\Constraint;

final class SecuredAddressFixture
{
    public static function build(): SecuredAddress
    {
        return SecuredAddress::builder()
            ->setPolicy(SecretPolicy::postal_code)
            ->setAddressLocality('Prague')
            ->setAddressLocalityServicing('Chodov')
            ->setAddressRegion('Prague 11')
            ->setPostalCode('14000')
            ->setStreetAddress('Batman Avenue 1040')
            ->setAddressLine('3rd Floor')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): SecuredAddress */
    public static function reader(): callable
    {
        return SecuredAddress::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return SecuredAddressConstraint::constraints();
    }
}
