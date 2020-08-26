<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_SystemSetting
 * @package CIMV2
 * The Win32_SystemSetting class represents an association between a computer system and a general setting on that system.
 */
final class Win32_DesktopMonitor extends WMIConnector
{

    /**
     * @return array
     * Retrieve information OS of the machine
     */
    public function getAttributes(): array
    {

        $setting = [];

        foreach ($this->_wmi_connector->instancesof('Win32_DesktopMonitor') as $settings) {

            $setting[] = [
                'Availability'=>$settings->Availability,
                'Bandwidth'=>$settings->Bandwidth,
                'ConfigManagerErrorCode'=>$settings->ConfigManagerErrorCode,
                'ConfigManagerUserConfig'=>$settings->ConfigManagerUserConfig,
                'CreationClassName'=>$settings->CreationClassName,
                'DeviceID'=>$settings->DeviceID,
                'DisplayType'=>$settings->DisplayType,
                'ErrorCleared'=>$settings->ErrorCleared,
                'ErrorDescription'=>$settings->ErrorDescription,
                'IsLocked'=>$settings->IsLocked,
                'LastErrorCode'=>$settings->LastErrorCode,
                'MonitorManufacturer'=>$settings->MonitorManufacturer,
                'MonitorType'=>$settings->MonitorType,
                'PixelsPerXLogicalInch'=>$settings->PixelsPerXLogicalInch,
                'PixelsPerYLogicalInch'=>$settings->PixelsPerYLogicalInch,
                'PNPDeviceID'=>$settings->PNPDeviceID,
                'PowerManagementCapabilities'=>$settings->PowerManagementCapabilities,
                'PowerManagementSupported'=>$settings->PowerManagementSupported,
                'ScreenHeight'=>$settings->ScreenHeight,
                'ScreenWidth'=>$settings->ScreenWidth,
                'StatusInfo'=>$settings->StatusInfo,
                'SystemCreationClassName'=>$settings->SystemCreationClassName,
                'SystemName'=>$settings->SystemName,
            ];
        }

        return (array)$setting;

    }

}