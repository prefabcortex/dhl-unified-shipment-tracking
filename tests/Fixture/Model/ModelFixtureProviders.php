<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture\Model;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\SelfNormalizingModel;
use Symfony\Component\Validator\Constraint;

/**
 * The data providers over the fixture classes beside them: one schema-conformant instance of every
 * model in this package, and what each is checked against.
 *
 * Values are the ones the API description states — `example` or `default` where it gives one, a
 * typed placeholder where it does not. They are shaped like real data, not equal to it: nothing
 * here has been sent to the service, so a value being accepted by the schema says nothing about it
 * being accepted by the server.
 */
final class ModelFixtureProviders
{
    /**
     * Every model that could be built and reads back what it writes, keyed by class name so a
     * failure names the model.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel}>
     */
    public static function roundTrips(): iterable
    {
        yield 'TrackingShipments' => [TrackingShipmentsFixture::build(), TrackingShipmentsFixture::reader()];
        yield 'TrackingShipment' => [TrackingShipmentFixture::build(), TrackingShipmentFixture::reader()];
        yield 'TrackingShipmentDetails' => [
            TrackingShipmentDetailsFixture::build(),
            TrackingShipmentDetailsFixture::reader(),
        ];
        yield 'TrackingShipmentStatus' => [
            TrackingShipmentStatusFixture::build(),
            TrackingShipmentStatusFixture::reader(),
        ];
        yield 'TrackingShipmentEvent' => [
            TrackingShipmentEventFixture::build(),
            TrackingShipmentEventFixture::reader(),
        ];
        yield 'ValueAddedServices' => [ValueAddedServicesFixture::build(), ValueAddedServicesFixture::reader()];
        yield 'SecuredAddress' => [SecuredAddressFixture::build(), SecuredAddressFixture::reader()];
        yield 'ServicePoint' => [ServicePointFixture::build(), ServicePointFixture::reader()];
        yield 'SecuredPlace' => [SecuredPlaceFixture::build(), SecuredPlaceFixture::reader()];
        yield 'EstimatedDeliveryTimeFrame' => [
            EstimatedDeliveryTimeFrameFixture::build(),
            EstimatedDeliveryTimeFrameFixture::reader(),
        ];
        yield 'Product' => [ProductFixture::build(), ProductFixture::reader()];
        yield 'Provider' => [ProviderFixture::build(), ProviderFixture::reader()];
        yield 'UnknownEntity' => [UnknownEntityFixture::build(), UnknownEntityFixture::reader()];
        yield 'Organization' => [OrganizationFixture::build(), OrganizationFixture::reader()];
        yield 'Company' => [CompanyFixture::build(), CompanyFixture::reader()];
        yield 'Person' => [PersonFixture::build(), PersonFixture::reader()];
        yield 'ProofOfDelivery' => [ProofOfDeliveryFixture::build(), ProofOfDeliveryFixture::reader()];
        yield 'QuantitativeValue' => [QuantitativeValueFixture::build(), QuantitativeValueFixture::reader()];
        yield 'Dimensions' => [DimensionsFixture::build(), DimensionsFixture::reader()];
        yield 'Reference' => [ReferenceFixture::build(), ReferenceFixture::reader()];
        yield 'ValueAddedService' => [ValueAddedServiceFixture::build(), ValueAddedServiceFixture::reader()];
        yield 'DgfLocation' => [DgfLocationFixture::build(), DgfLocationFixture::reader()];
        yield 'DgfAirport' => [DgfAirportFixture::build(), DgfAirportFixture::reader()];
        yield 'DgfRoute' => [DgfRouteFixture::build(), DgfRouteFixture::reader()];
        yield 'Location' => [LocationFixture::build(), LocationFixture::reader()];
        yield 'Humidity' => [HumidityFixture::build(), HumidityFixture::reader()];
        yield 'Pressure' => [PressureFixture::build(), PressureFixture::reader()];
        yield 'Temperature' => [TemperatureFixture::build(), TemperatureFixture::reader()];
        yield 'Tilt' => [TiltFixture::build(), TiltFixture::reader()];
        yield 'Measurement' => [MeasurementFixture::build(), MeasurementFixture::reader()];
        yield 'ProblemDetail' => [ProblemDetailFixture::build(), ProblemDetailFixture::reader()];
    }

    /**
     * Each model with the wire names its document must carry.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel, list<string>}>
     */
    public static function documentsMissingARequiredProperty(): iterable
    {
        yield 'TrackingShipmentStatus' => [
            TrackingShipmentStatusFixture::build(),
            TrackingShipmentStatusFixture::reader(),
            ['timestamp', 'statusCode'],
        ];
        yield 'TrackingShipmentEvent' => [
            TrackingShipmentEventFixture::build(),
            TrackingShipmentEventFixture::reader(),
            ['timestamp', 'statusCode'],
        ];
        yield 'Provider' => [ProviderFixture::build(), ProviderFixture::reader(), ['destinationProvider']];
        yield 'UnknownEntity' => [UnknownEntityFixture::build(), UnknownEntityFixture::reader(), ['@type']];
        yield 'Organization' => [OrganizationFixture::build(), OrganizationFixture::reader(), ['@type']];
        yield 'Company' => [CompanyFixture::build(), CompanyFixture::reader(), ['@type']];
        yield 'Person' => [PersonFixture::build(), PersonFixture::reader(), ['@type']];
        yield 'Reference' => [ReferenceFixture::build(), ReferenceFixture::reader(), ['type']];
    }

    /**
     * Each model with, per wire name, a value of a type that property cannot hold.
     *
     * Only properties whose type is a single closed shape appear. A union may legitimately accept
     * what looks like the wrong type, and a schema stating no type accepts anything.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel, array<array-key, int|string>}>
     */
    public static function documentsWithAMistypedProperty(): iterable
    {
        yield 'TrackingShipmentStatus' => [
            TrackingShipmentStatusFixture::build(),
            TrackingShipmentStatusFixture::reader(),
            ['timestamp' => 42, 'statusCode' => 42],
        ];
        yield 'TrackingShipmentEvent' => [
            TrackingShipmentEventFixture::build(),
            TrackingShipmentEventFixture::reader(),
            ['timestamp' => 42, 'statusCode' => 42],
        ];
        yield 'Provider' => [ProviderFixture::build(), ProviderFixture::reader(), ['destinationProvider' => 42]];
        yield 'UnknownEntity' => [UnknownEntityFixture::build(), UnknownEntityFixture::reader(), ['@type' => 42]];
        yield 'Organization' => [OrganizationFixture::build(), OrganizationFixture::reader(), ['@type' => 42]];
        yield 'Company' => [CompanyFixture::build(), CompanyFixture::reader(), ['@type' => 42]];
        yield 'Person' => [PersonFixture::build(), PersonFixture::reader(), ['@type' => 42]];
        yield 'Reference' => [ReferenceFixture::build(), ReferenceFixture::reader(), ['type' => 42]];
    }

    /**
     * Each model whose values all pass their constraints, with those constraints.
     *
     * @return iterable<string, array{SelfNormalizingModel, list<Constraint>}>
     */
    public static function modelsWithTheirConstraints(): iterable
    {
        yield 'TrackingShipments' => [TrackingShipmentsFixture::build(), TrackingShipmentsFixture::constraints()];
        yield 'TrackingShipment' => [TrackingShipmentFixture::build(), TrackingShipmentFixture::constraints()];
        yield 'TrackingShipmentDetails' => [
            TrackingShipmentDetailsFixture::build(),
            TrackingShipmentDetailsFixture::constraints(),
        ];
        yield 'TrackingShipmentStatus' => [
            TrackingShipmentStatusFixture::build(),
            TrackingShipmentStatusFixture::constraints(),
        ];
        yield 'TrackingShipmentEvent' => [
            TrackingShipmentEventFixture::build(),
            TrackingShipmentEventFixture::constraints(),
        ];
        yield 'ValueAddedServices' => [ValueAddedServicesFixture::build(), ValueAddedServicesFixture::constraints()];
        yield 'SecuredAddress' => [SecuredAddressFixture::build(), SecuredAddressFixture::constraints()];
        yield 'ServicePoint' => [ServicePointFixture::build(), ServicePointFixture::constraints()];
        yield 'SecuredPlace' => [SecuredPlaceFixture::build(), SecuredPlaceFixture::constraints()];
        yield 'EstimatedDeliveryTimeFrame' => [
            EstimatedDeliveryTimeFrameFixture::build(),
            EstimatedDeliveryTimeFrameFixture::constraints(),
        ];
        yield 'Product' => [ProductFixture::build(), ProductFixture::constraints()];
        yield 'Provider' => [ProviderFixture::build(), ProviderFixture::constraints()];
        yield 'UnknownEntity' => [UnknownEntityFixture::build(), UnknownEntityFixture::constraints()];
        yield 'Organization' => [OrganizationFixture::build(), OrganizationFixture::constraints()];
        yield 'Company' => [CompanyFixture::build(), CompanyFixture::constraints()];
        yield 'Person' => [PersonFixture::build(), PersonFixture::constraints()];
        yield 'ProofOfDelivery' => [ProofOfDeliveryFixture::build(), ProofOfDeliveryFixture::constraints()];
        yield 'QuantitativeValue' => [QuantitativeValueFixture::build(), QuantitativeValueFixture::constraints()];
        yield 'Dimensions' => [DimensionsFixture::build(), DimensionsFixture::constraints()];
        yield 'Reference' => [ReferenceFixture::build(), ReferenceFixture::constraints()];
        yield 'ValueAddedService' => [ValueAddedServiceFixture::build(), ValueAddedServiceFixture::constraints()];
        yield 'DgfLocation' => [DgfLocationFixture::build(), DgfLocationFixture::constraints()];
        yield 'DgfAirport' => [DgfAirportFixture::build(), DgfAirportFixture::constraints()];
        yield 'DgfRoute' => [DgfRouteFixture::build(), DgfRouteFixture::constraints()];
        yield 'Location' => [LocationFixture::build(), LocationFixture::constraints()];
        yield 'Humidity' => [HumidityFixture::build(), HumidityFixture::constraints()];
        yield 'Pressure' => [PressureFixture::build(), PressureFixture::constraints()];
        yield 'Temperature' => [TemperatureFixture::build(), TemperatureFixture::constraints()];
        yield 'Tilt' => [TiltFixture::build(), TiltFixture::constraints()];
        yield 'Measurement' => [MeasurementFixture::build(), MeasurementFixture::constraints()];
        yield 'ProblemDetail' => [ProblemDetailFixture::build(), ProblemDetailFixture::constraints()];
    }
}
