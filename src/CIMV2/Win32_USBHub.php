<?php


namespace CIMV2;

use Connector\WMIConnector;


/**
 * Class Win32_USBHub
 * @package CIMV2
 */
final class Win32_USBHub extends WMIConnector
{

    /**
     * @return array
     * Retrieve information OS of the machine
     */
    public function getAttributes(): array
    {

        $devices = [];

        foreach ($this->_wmi_connector->instancesof('Win32_USBHub') as $usb) {

            $devices[] = [
                'Availability'=>(int)$usb->Availability,
                'ClassCode'=>(int)$usb->ClassCode,
                'ConfigManagerErrorCode'=>(int)$usb->ConfigManagerErrorCode,
                'ConfigManagerUserConfig'=>(bool)$usb->ConfigManagerUserConfig,
                'CreationClassName'=>(string)$usb->CreationClassName,
                'CurrentAlternateSettings'=>(int)$usb->CurrentAlternateSettings,
                'CurrentConfigValue'=>(int)$usb->CurrentConfigValue,
                'DeviceID'=>(string)$usb->DeviceID,
                'ErrorCleared'=>(bool)$usb->ErrorCleared,
                'ErrorDescription'=>(string)$usb->ErrorDescription,
                'GangSwitched'=>(string)$usb->GangSwitched,
                'LastErrorCode'=>(int)$usb->LastErrorCode,
                'Name'=>(string)$usb->Name,
                'NumberOfConfigs'=>(int)$usb->NumberOfConfigs,
                'NumberOfPorts'=>(int)$usb->NumberOfPorts,
                'PNPDeviceID'=>(string)$usb->PNPDeviceID,
                'PowerManagementCapabilities'=>(int)$usb->PowerManagementCapabilities,
                'PowerManagementSupported'=>(bool)$usb->PowerManagementSupported,
                'ProtocolCode'=>(int)$usb->ProtocolCode,
                'StatusInfo'=>(int)$usb->StatusInfo,
                'SubclassCode'=>(int)$usb->SubclassCode,
                'SystemCreationClassName'=>(string)$usb->SystemCreationClassName,
                'SystemName'=>(string)$usb->SystemName,
                'USBVersion'=>(int)$usb->USBVersion,
            ];
        }

        return (array)$devices;

    }

}