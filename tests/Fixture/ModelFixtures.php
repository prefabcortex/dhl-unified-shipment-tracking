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
use Prefabcortex\DhlUnifiedShipmentTracking\Model\HumidityUnit;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Location;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Measurement;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Organization;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Person;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Pressure;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\PressureUnit;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ProblemDetail;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Product;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ProofOfDelivery;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Provider;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ProviderDestinationProvider;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\QuantitativeValue;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Reference;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ReferenceType;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecretPolicy;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecuredAddress;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\SecuredPlace;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ServicePoint;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\StatusCode;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Temperature;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TemperatureUnit;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\Tilt;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TiltUnit;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipment;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipmentDetails;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipmentEvent;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipments;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\TrackingShipmentStatus;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\UnknownEntity;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ValueAddedService;
use Prefabcortex\DhlUnifiedShipmentTracking\Model\ValueAddedServices;

final class ModelFixtures
{
    public static function buildTrackingShipments(): TrackingShipments
    {
        return TrackingShipments::builder()->build();
    }

    public static function buildTrackingShipment(): TrackingShipment
    {
        return TrackingShipment::builder()
            ->setTtl(15552000)
            ->setReturnFlag(false)
            ->build();
    }

    public static function buildTrackingShipmentDetails(): TrackingShipmentDetails
    {
        return TrackingShipmentDetails::builder()->build();
    }

    public static function buildTrackingShipmentStatus(): TrackingShipmentStatus
    {
        return TrackingShipmentStatus::builder(
            // timestamp
            'REPLACE_ME',
            // statusCode
            StatusCode::delivered,
        )->build();
    }

    public static function buildTrackingShipmentEvent(): TrackingShipmentEvent
    {
        return TrackingShipmentEvent::builder(
            // timestamp
            'REPLACE_ME',
            // statusCode
            StatusCode::delivered,
        )->build();
    }

    public static function buildValueAddedServices(): ValueAddedServices
    {
        return ValueAddedServices::builder()->build();
    }

    public static function buildSecuredAddress(): SecuredAddress
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

    public static function buildServicePoint(): ServicePoint
    {
        return ServicePoint::builder()->build();
    }

    public static function buildSecuredPlace(): SecuredPlace
    {
        return SecuredPlace::builder()->build();
    }

    public static function buildEstimatedDeliveryTimeFrame(): EstimatedDeliveryTimeFrame
    {
        return EstimatedDeliveryTimeFrame::builder()->build();
    }

    public static function buildProduct(): Product
    {
        return Product::builder()
            ->setDeliveryMethodRemark('D2P')
            ->setProductName('Worldwide Priority')
            ->build();
    }

    public static function buildProvider(): Provider
    {
        return Provider::builder(ProviderDestinationProvider::acs_courier)->build();
    }

    public static function buildUnknownEntity(): UnknownEntity
    {
        return UnknownEntity::builder('UnknownEntity')->build();
    }

    public static function buildOrganization(): Organization
    {
        return Organization::builder('Organization')
            ->setPolicy(SecretPolicy::none)
            ->setName('Linford Alene')
            ->setOrganizationName('Highgate School and Academy')
            ->build();
    }

    public static function buildCompany(): Company
    {
        return Company::builder('Company')
            ->setPolicy(SecretPolicy::none)
            ->setName('Linford Alene')
            ->setOrganizationName('The First Dome Ltd.')
            ->build();
    }

    public static function buildPerson(): Person
    {
        return Person::builder('Person')
            ->setPolicy(SecretPolicy::none)
            ->setName('Dariel Leola')
            ->build();
    }

    public static function buildProofOfDelivery(): ProofOfDelivery
    {
        return ProofOfDelivery::builder()
            ->setDocumentUrl('https://webpod.dhl.com/pod?token=510f1359603a768a57af49cf10083f90&language=en')
            ->setTimestamp('2022-10-21T12:30:00')
            ->build();
    }

    public static function buildQuantitativeValue(): QuantitativeValue
    {
        return QuantitativeValue::builder()
            ->setUnitText('m')
            ->setValue(1.5)
            ->build();
    }

    public static function buildDimensions(): Dimensions
    {
        return Dimensions::builder()->build();
    }

    public static function buildReference(): Reference
    {
        return Reference::builder(ReferenceType::container_number)->build();
    }

    public static function buildValueAddedService(): ValueAddedService
    {
        return ValueAddedService::builder()->build();
    }

    public static function buildDgfLocation(): DgfLocation
    {
        return DgfLocation::builder()
            ->setDgfLocationName('GOTHENBURG')
            ->build();
    }

    public static function buildDgfAirport(): DgfAirport
    {
        return DgfAirport::builder()
            ->setDgfLocationCode('AMS')
            ->setDgfLocationName('GOTHENBURG')
            ->build();
    }

    public static function buildDgfRoute(): DgfRoute
    {
        return DgfRoute::builder()
            ->setDgfVesselName('MAERSK SARAT')
            ->setDgfVoyageFlightNumber('TR TRUCK')
            ->build();
    }

    public static function buildLocation(): Location
    {
        return Location::builder()
            ->setLat(18.556873)
            ->setLon(-70.06104000000001)
            ->build();
    }

    public static function buildHumidity(): Humidity
    {
        return Humidity::builder()
            ->setUnit(HumidityUnit::percentage)
            ->build();
    }

    public static function buildPressure(): Pressure
    {
        return Pressure::builder()
            ->setUnit(PressureUnit::pascal)
            ->build();
    }

    public static function buildTemperature(): Temperature
    {
        return Temperature::builder()
            ->setUnit(TemperatureUnit::celsius)
            ->build();
    }

    public static function buildTilt(): Tilt
    {
        return Tilt::builder()
            ->setUnit(TiltUnit::degree)
            ->build();
    }

    public static function buildMeasurement(): Measurement
    {
        return Measurement::builder()
            ->setPolicy(SecretPolicy::postal_code)
            ->build();
    }

    public static function buildProblemDetail(): ProblemDetail
    {
        return ProblemDetail::builder()
            ->setDetail('Detailed explanation of problem')
            ->setInstance('https://www.some.uri/issue/400')
            ->setStatus(400.0)
            ->setTitle('Something already happen')
            ->setType('SomeException')
            ->build();
    }
}
