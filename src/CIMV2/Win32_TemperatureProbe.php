<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_TemperatureProbe
 * @package CIMV2
 * The Win32_TemperatureProbe class represents the properties of a temperature sensor (electronic thermometer).
 */
final class Win32_TemperatureProbe extends WMIConnector
{

    /**
     * @return array
     * Retrieve information OS of the machine
     */
    public function getProperties(): array
    {

        $info = [];

        foreach ($this->_wmi_connector->instancesof('Win32_TemperatureProbe') as $probes) {

            $info[] = [
                'Accuracy'=>(int)$probes->Accuracy,
                'Availability'=>(int)$probes->Availability,
                'ConfigManagerErrorCode'=>(int)$probes->ConfigManagerErrorCode,
                'ConfigManagerUserConfig'=>(bool)$probes->ConfigManagerUserConfig,
                'CurrentReading'=>(int)$probes->CurrentReading,
                'DeviceID'=>(string)$probes->DeviceID,
                'ErrorCleared'=>(bool)$probes->ErrorCleared,
                'ErrorDescription'=>(string)$probes->ErrorDescription,
                'IsLinear'=>(bool)$probes->IsLinear,
                'LastErrorCode'=>(int)$probes->LastErrorCode,
                'LowerThresholdCritical'=>(int)$probes->LowerThresholdCritical,
                'LowerThresholdFatal'=>(int)$probes->LowerThresholdFatal,
                'LowerThresholdNonCritical'=>(int)$probes->LowerThresholdNonCritical,
                'MaxReadable'=>(int)$probes->MaxReadable,
                'NominalReading'=>(int)$probes->NominalReading,
                'NormalMax'=>(int)$probes->NormalMax,
                'NormalMin'=>(int)$probes->NormalMin,
                'PNPDeviceID'=>(string)$probes->PNPDeviceID,
                'PowerManagementCapabilities'=>(int)$probes->PowerManagementCapabilities,
                'PowerManagementSupported'=>(bool)$probes->PowerManagementSupported,
                'Resolution'=>(int)$probes->Resolution,
                'StatusInfo'=>(int)$probes->StatusInfo,
                'SystemCreationClassName'=>(string)$probes->SystemCreationClassName,
                'SystemName'=>(string)$probes->SystemName,
                'Tolerance'=>(int)$probes->Tolerance,
                'UpperThresholdCritical'=>(int)$probes->UpperThresholdCritical,
                'UpperThresholdFatal'=>(int)$probes->UpperThresholdFatal,
                'UpperThresholdNonCritical'=>(int)$probes->UpperThresholdNonCritical,

            ];
        }

        return (array)$info;

    }

}