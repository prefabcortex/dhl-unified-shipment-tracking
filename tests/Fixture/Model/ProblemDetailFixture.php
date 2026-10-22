<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\ProblemDetail;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ProblemDetailConstraint;
use Symfony\Component\Validator\Constraint;

final class ProblemDetailFixture
{
    public static function build(): ProblemDetail
    {
        return ProblemDetail::builder()
            ->setDetail('Detailed explanation of problem')
            ->setInstance('https://www.some.uri/issue/400')
            ->setStatus(400.0)
            ->setTitle('Something already happen')
            ->setType('SomeException')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ProblemDetail */
    public static function reader(): callable
    {
        return ProblemDetail::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ProblemDetailConstraint::constraints();
    }
}
