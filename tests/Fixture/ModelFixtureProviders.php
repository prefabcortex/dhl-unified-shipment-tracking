<?php

declare(strict_types=1);

namespace Prefabcortex\DhlUnifiedShipmentTracking\Tests\Fixture;

use Prefabcortex\DhlUnifiedShipmentTracking\Model\Company;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\DgfAirport;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\DgfLocation;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\DgfRoute;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Dimensions;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\EstimatedDeliveryTimeFrame;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Humidity;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Location;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Measurement;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Organization;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Person;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Pressure;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ProblemDetail;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Product;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ProofOfDelivery;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Provider;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\QuantitativeValue;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Reference;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecuredAddress;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecuredPlace;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SelfNormalizingModel;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ServicePoint;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Temperature;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Tilt;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipment;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipmentDetails;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipmentEvent;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipments;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipmentStatus;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\UnknownEntity;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ValueAddedService;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ValueAddedServices;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\CompanyConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\DgfAirportConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\DgfLocationConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\DgfRouteConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\DimensionsConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\EstimatedDeliveryTimeFrameConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\HumidityConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\LocationConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\MeasurementConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\OrganizationConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\PersonConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\PressureConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ProblemDetailConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ProductConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ProofOfDeliveryConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ProviderConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\QuantitativeValueConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ReferenceConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\SecuredAddressConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\SecuredPlaceConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ServicePointConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TemperatureConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TiltConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentDetailsConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentEventConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentsConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\TrackingShipmentStatusConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\UnknownEntityConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ValueAddedServiceConstraint;
use Prefabcortex\DhlUnifiedShipmentTracking\Validator\ValueAddedServicesConstraint;
use Symfony\Component\Validator\Constraint;

/**
 * The data providers over ModelFixtures: one schema-conformant instance of every model in this
 * package, and what each is checked against.
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
        yield 'TrackingShipments' => [ModelFixtures::buildTrackingShipments(), TrackingShipments::fromArray(...)];
        yield 'TrackingShipment' => [ModelFixtures::buildTrackingShipment(), TrackingShipment::fromArray(...)];
        yield 'TrackingShipmentDetails' => [
            ModelFixtures::buildTrackingShipmentDetails(),
            TrackingShipmentDetails::fromArray(...),
        ];
        yield 'TrackingShipmentStatus' => [
            ModelFixtures::buildTrackingShipmentStatus(),
            TrackingShipmentStatus::fromArray(...),
        ];
        yield 'TrackingShipmentEvent' => [
            ModelFixtures::buildTrackingShipmentEvent(),
            TrackingShipmentEvent::fromArray(...),
        ];
        yield 'ValueAddedServices' => [ModelFixtures::buildValueAddedServices(), ValueAddedServices::fromArray(...)];
        yield 'SecuredAddress' => [ModelFixtures::buildSecuredAddress(), SecuredAddress::fromArray(...)];
        yield 'ServicePoint' => [ModelFixtures::buildServicePoint(), ServicePoint::fromArray(...)];
        yield 'SecuredPlace' => [ModelFixtures::buildSecuredPlace(), SecuredPlace::fromArray(...)];
        yield 'EstimatedDeliveryTimeFrame' => [
            ModelFixtures::buildEstimatedDeliveryTimeFrame(),
            EstimatedDeliveryTimeFrame::fromArray(...),
        ];
        yield 'Product' => [ModelFixtures::buildProduct(), Product::fromArray(...)];
        yield 'Provider' => [ModelFixtures::buildProvider(), Provider::fromArray(...)];
        yield 'UnknownEntity' => [ModelFixtures::buildUnknownEntity(), UnknownEntity::fromArray(...)];
        yield 'Organization' => [ModelFixtures::buildOrganization(), Organization::fromArray(...)];
        yield 'Company' => [ModelFixtures::buildCompany(), Company::fromArray(...)];
        yield 'Person' => [ModelFixtures::buildPerson(), Person::fromArray(...)];
        yield 'ProofOfDelivery' => [ModelFixtures::buildProofOfDelivery(), ProofOfDelivery::fromArray(...)];
        yield 'QuantitativeValue' => [ModelFixtures::buildQuantitativeValue(), QuantitativeValue::fromArray(...)];
        yield 'Dimensions' => [ModelFixtures::buildDimensions(), Dimensions::fromArray(...)];
        yield 'Reference' => [ModelFixtures::buildReference(), Reference::fromArray(...)];
        yield 'ValueAddedService' => [ModelFixtures::buildValueAddedService(), ValueAddedService::fromArray(...)];
        yield 'DgfLocation' => [ModelFixtures::buildDgfLocation(), DgfLocation::fromArray(...)];
        yield 'DgfAirport' => [ModelFixtures::buildDgfAirport(), DgfAirport::fromArray(...)];
        yield 'DgfRoute' => [ModelFixtures::buildDgfRoute(), DgfRoute::fromArray(...)];
        yield 'Location' => [ModelFixtures::buildLocation(), Location::fromArray(...)];
        yield 'Humidity' => [ModelFixtures::buildHumidity(), Humidity::fromArray(...)];
        yield 'Pressure' => [ModelFixtures::buildPressure(), Pressure::fromArray(...)];
        yield 'Temperature' => [ModelFixtures::buildTemperature(), Temperature::fromArray(...)];
        yield 'Tilt' => [ModelFixtures::buildTilt(), Tilt::fromArray(...)];
        yield 'Measurement' => [ModelFixtures::buildMeasurement(), Measurement::fromArray(...)];
        yield 'ProblemDetail' => [ModelFixtures::buildProblemDetail(), ProblemDetail::fromArray(...)];
    }

    /**
     * Each model with the wire names its document must carry.
     *
     * @return iterable<string, array{SelfNormalizingModel, callable(array<int|string, mixed>): SelfNormalizingModel, list<string>}>
     */
    public static function documentsMissingARequiredProperty(): iterable
    {
        yield 'TrackingShipmentStatus' => [
            ModelFixtures::buildTrackingShipmentStatus(),
            TrackingShipmentStatus::fromArray(...),
            ['timestamp', 'statusCode'],
        ];
        yield 'TrackingShipmentEvent' => [
            ModelFixtures::buildTrackingShipmentEvent(),
            TrackingShipmentEvent::fromArray(...),
            ['timestamp', 'statusCode'],
        ];
        yield 'Provider' => [ModelFixtures::buildProvider(), Provider::fromArray(...), ['destinationProvider']];
        yield 'UnknownEntity' => [ModelFixtures::buildUnknownEntity(), UnknownEntity::fromArray(...), ['@type']];
        yield 'Organization' => [ModelFixtures::buildOrganization(), Organization::fromArray(...), ['@type']];
        yield 'Company' => [ModelFixtures::buildCompany(), Company::fromArray(...), ['@type']];
        yield 'Person' => [ModelFixtures::buildPerson(), Person::fromArray(...), ['@type']];
        yield 'Reference' => [ModelFixtures::buildReference(), Reference::fromArray(...), ['type']];
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
            ModelFixtures::buildTrackingShipmentStatus(),
            TrackingShipmentStatus::fromArray(...),
            ['timestamp' => 42, 'statusCode' => 42],
        ];
        yield 'TrackingShipmentEvent' => [
            ModelFixtures::buildTrackingShipmentEvent(),
            TrackingShipmentEvent::fromArray(...),
            ['timestamp' => 42, 'statusCode' => 42],
        ];
        yield 'Provider' => [ModelFixtures::buildProvider(), Provider::fromArray(...), ['destinationProvider' => 42]];
        yield 'UnknownEntity' => [ModelFixtures::buildUnknownEntity(), UnknownEntity::fromArray(...), ['@type' => 42]];
        yield 'Organization' => [ModelFixtures::buildOrganization(), Organization::fromArray(...), ['@type' => 42]];
        yield 'Company' => [ModelFixtures::buildCompany(), Company::fromArray(...), ['@type' => 42]];
        yield 'Person' => [ModelFixtures::buildPerson(), Person::fromArray(...), ['@type' => 42]];
        yield 'Reference' => [ModelFixtures::buildReference(), Reference::fromArray(...), ['type' => 42]];
    }

    /**
     * Each model whose values all pass their constraints, with those constraints.
     *
     * @return iterable<string, array{SelfNormalizingModel, list<Constraint>}>
     */
    public static function modelsWithTheirConstraints(): iterable
    {
        yield 'TrackingShipments' => [
            ModelFixtures::buildTrackingShipments(),
            TrackingShipmentsConstraint::constraints(),
        ];
        yield 'TrackingShipment' => [ModelFixtures::buildTrackingShipment(), TrackingShipmentConstraint::constraints()];
        yield 'TrackingShipmentDetails' => [
            ModelFixtures::buildTrackingShipmentDetails(),
            TrackingShipmentDetailsConstraint::constraints(),
        ];
        yield 'TrackingShipmentStatus' => [
            ModelFixtures::buildTrackingShipmentStatus(),
            TrackingShipmentStatusConstraint::constraints(),
        ];
        yield 'TrackingShipmentEvent' => [
            ModelFixtures::buildTrackingShipmentEvent(),
            TrackingShipmentEventConstraint::constraints(),
        ];
        yield 'ValueAddedServices' => [
            ModelFixtures::buildValueAddedServices(),
            ValueAddedServicesConstraint::constraints(),
        ];
        yield 'SecuredAddress' => [ModelFixtures::buildSecuredAddress(), SecuredAddressConstraint::constraints()];
        yield 'ServicePoint' => [ModelFixtures::buildServicePoint(), ServicePointConstraint::constraints()];
        yield 'SecuredPlace' => [ModelFixtures::buildSecuredPlace(), SecuredPlaceConstraint::constraints()];
        yield 'EstimatedDeliveryTimeFrame' => [
            ModelFixtures::buildEstimatedDeliveryTimeFrame(),
            EstimatedDeliveryTimeFrameConstraint::constraints(),
        ];
        yield 'Product' => [ModelFixtures::buildProduct(), ProductConstraint::constraints()];
        yield 'Provider' => [ModelFixtures::buildProvider(), ProviderConstraint::constraints()];
        yield 'UnknownEntity' => [ModelFixtures::buildUnknownEntity(), UnknownEntityConstraint::constraints()];
        yield 'Organization' => [ModelFixtures::buildOrganization(), OrganizationConstraint::constraints()];
        yield 'Company' => [ModelFixtures::buildCompany(), CompanyConstraint::constraints()];
        yield 'Person' => [ModelFixtures::buildPerson(), PersonConstraint::constraints()];
        yield 'ProofOfDelivery' => [ModelFixtures::buildProofOfDelivery(), ProofOfDeliveryConstraint::constraints()];
        yield 'QuantitativeValue' => [
            ModelFixtures::buildQuantitativeValue(),
            QuantitativeValueConstraint::constraints(),
        ];
        yield 'Dimensions' => [ModelFixtures::buildDimensions(), DimensionsConstraint::constraints()];
        yield 'Reference' => [ModelFixtures::buildReference(), ReferenceConstraint::constraints()];
        yield 'ValueAddedService' => [
            ModelFixtures::buildValueAddedService(),
            ValueAddedServiceConstraint::constraints(),
        ];
        yield 'DgfLocation' => [ModelFixtures::buildDgfLocation(), DgfLocationConstraint::constraints()];
        yield 'DgfAirport' => [ModelFixtures::buildDgfAirport(), DgfAirportConstraint::constraints()];
        yield 'DgfRoute' => [ModelFixtures::buildDgfRoute(), DgfRouteConstraint::constraints()];
        yield 'Location' => [ModelFixtures::buildLocation(), LocationConstraint::constraints()];
        yield 'Humidity' => [ModelFixtures::buildHumidity(), HumidityConstraint::constraints()];
        yield 'Pressure' => [ModelFixtures::buildPressure(), PressureConstraint::constraints()];
        yield 'Temperature' => [ModelFixtures::buildTemperature(), TemperatureConstraint::constraints()];
        yield 'Tilt' => [ModelFixtures::buildTilt(), TiltConstraint::constraints()];
        yield 'Measurement' => [ModelFixtures::buildMeasurement(), MeasurementConstraint::constraints()];
        yield 'ProblemDetail' => [ModelFixtures::buildProblemDetail(), ProblemDetailConstraint::constraints()];
    }
}
