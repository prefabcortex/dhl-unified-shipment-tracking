<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Company;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecretPolicy;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\CompanyConstraint;
use Symfony\Component\Validator\Constraint;

final class CompanyFixture
{
    public static function build(): Company
    {
        return Company::builder('Company')
            ->setPolicy(SecretPolicy::none)
            ->setName('Linford Alene')
            ->setOrganizationName('The First Dome Ltd.')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Company */
    public static function reader(): callable
    {
        return Company::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return CompanyConstraint::constraints();
    }
}
