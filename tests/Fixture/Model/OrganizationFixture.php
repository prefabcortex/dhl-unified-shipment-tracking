<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Organization;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecretPolicy;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\OrganizationConstraint;
use Symfony\Component\Validator\Constraint;

final class OrganizationFixture
{
    public static function build(): Organization
    {
        return Organization::builder('Organization')
            ->setPolicy(SecretPolicy::none)
            ->setName('Linford Alene')
            ->setOrganizationName('Highgate School and Academy')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Organization */
    public static function reader(): callable
    {
        return Organization::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return OrganizationConstraint::constraints();
    }
}
