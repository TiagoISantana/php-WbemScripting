<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Battery
 * @package CIMV2
 * The Win32_Battery class represents a battery connected to the computer system.
 * This class applies to both batteries in Laptop Systems and other internal/external batteries
 */
final class Win32_Battery extends WMIConnector
{

    /**
     * @return array
     * Retrieve information off all batteries on target machine
     */
    public function getAttributes(): array
    {

        $battery = [];

        foreach ($this->_wmi_connector->instancesof('Win32_Battery') as $batteries) {

            $battery[] = [
                'Availability' => (int)$batteries->Availability,
                'BatteryRechargeTime' => (int)$batteries->BatteryRechargeTime,
                'BatteryStatus' => (int)$batteries->BatteryStatus,
                'Chemistry' => (int)$batteries->Chemistry,
                'ConfigManagerErrorCode' => (int)$batteries->ConfigManagerErrorCode,
                'ConfigManagerUserConfig' => (int)$batteries->ConfigManagerUserConfig,
                'CreationClassName' => (string)$batteries->CreationClassName,
                'DesignCapacity' => (int)$batteries->DesignCapacity,
                'DesignVoltage' => (int)$batteries->DesignVoltage,
                'DeviceID' => (string)$batteries->DeviceID,
                'ErrorCleared' => (bool)$batteries->ErrorCleared,
                'ErrorDescription' => (string)$batteries->ErrorDescription,
                'EstimatedChargeRemaining' => (int)$batteries->EstimatedChargeRemaining,
                'EstimatedRunTime' => (int)$batteries->EstimatedRunTime,
                'ExpectedBatteryLife' => (int)$batteries->ExpectedBatteryLife,
                'ExpectedLife' => (int)$batteries->ExpectedLife,
                'FullChargeCapacity' => (int)$batteries->FullChargeCapacity,
                'LastErrorCode' => (int)$batteries->LastErrorCode,
                'MaxRechargeTime' => (int)$batteries->MaxRechargeTime,
                'PNPDeviceID' => (string)$batteries->PNPDeviceID,
                'PowerManagementCapabilities' => $batteries->PowerManagementCapabilities,
                'PowerManagementSupported' => (bool)$batteries->PowerManagementSupported,
                'SmartBatteryVersion' => (string)$batteries->SmartBatteryVersion,
                'StatusInfo' => (int)$batteries->StatusInfo,
                'SystemCreationClassName' => (string)$batteries->SystemCreationClassName,
                'SystemName' => (string)$batteries->SystemName,
                'TimeOnBattery' => (int)$batteries->TimeOnBattery,
                'TimeToFullCharge' => (int)$batteries->TimeToFullCharge,
            ];

        }

        return (array)$battery;

    }

}