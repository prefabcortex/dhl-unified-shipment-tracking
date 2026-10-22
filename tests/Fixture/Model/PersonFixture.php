<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Person;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecretPolicy;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\PersonConstraint;
use Symfony\Component\Validator\Constraint;

final class PersonFixture
{
    public static function build(): Person
    {
        return Person::builder('Person')
            ->setPolicy(SecretPolicy::none)
            ->setName('Dariel Leola')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Person */
    public static function reader(): callable
    {
        return Person::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return PersonConstraint::constraints();
    }
}
