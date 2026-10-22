<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\ProofOfDelivery;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ProofOfDeliveryConstraint;
use Symfony\Component\Validator\Constraint;

final class ProofOfDeliveryFixture
{
    public static function build(): ProofOfDelivery
    {
        return ProofOfDelivery::builder()
            ->setDocumentUrl('https://webpod.dhl.com/pod?token=510f1359603a768a57af49cf10083f90&language=en')
            ->setTimestamp('2022-10-21T12:30:00')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): ProofOfDelivery */
    public static function reader(): callable
    {
        return ProofOfDelivery::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ProofOfDeliveryConstraint::constraints();
    }
}
