<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_USBController
 * @package CIMV2
 * The Win32_USBController class manages the capabilities of a Universal Serial Bus (USB) controller.
 */
final class Win32_USBController extends WMIConnector
{

    /**
     * @return array
     * Retrieve information USB of the machine
     */
    public function getAttributes(): array
    {

        $devices = [];

        foreach ($this->_wmi_connector->instancesof('Win32_USBController') as $usb) {

            $devices[] = [
                'Availability'=>(int)$usb->Availability,
                'ConfigManagerErrorCode'=>(int)$usb->ConfigManagerErrorCode,
                'ConfigManagerUserConfig'=>(bool)$usb->ConfigManagerUserConfig,
                'CreationClassName'=>(string)$usb->CreationClassName,
                'DeviceID'=>(string)$usb->DeviceID,
                'ErrorCleared'=>(bool)$usb->ErrorCleared,
                'ErrorDescription'=>(string)$usb->ErrorDescription,
                'LastErrorCode'=>(int)$usb->LastErrorCode,
                'Manufacturer'=>(string)$usb->Manufacturer,
                'MaxNumberControlled'=>(int)$usb->MaxNumberControlled,
                'PNPDeviceID'=>(string)$usb->PNPDeviceID,
                'PowerManagementCapabilities'=>(int)$usb->PowerManagementCapabilities,
                'PowerManagementSupported'=>(bool)$usb->PowerManagementSupported,
                'ProtocolSupported'=>(int)$usb->ProtocolSupported,
                'StatusInfo'=>(int)$usb->StatusInfo,
                'SystemCreationClassName'=>(string)$usb->SystemCreationClassName,
                'SystemName'=>(string)$usb->SystemName,
                'TimeOfLastReset'=>$usb->TimeOfLastReset,
            ];
        }

        return (array)$devices;

    }




}