<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Product;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ProductConstraint;
use Symfony\Component\Validator\Constraint;

final class ProductFixture
{
    public static function build(): Product
    {
        return Product::builder()
            ->setDeliveryMethodRemark('D2P')
            ->setProductName('Worldwide Priority')
            ->build();
    }

    /** @return callable(array<int|string, mixed>): Product */
    public static function reader(): callable
    {
        return Product::fromArray(...);
    }

    /** @return list<Constraint> */
    public static function constraints(): array
    {
        return ProductConstraint::constraints();
    }
}
