<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Processor
 * @package CIMV2
 * The Win32_PNPEntity class represents a device that is capable of interpreting a sequence of machine instructions on a Win32 computer system. On a multiprocessor machine, there will exist one instance of this class for each processor.
 */
final class Win32_PNPEntity extends WMIConnector
{

    /**
     * @return array
     * Retrieve information processor of the machine
     */
    public function getAttributes(): array
    {

        $data = [];
        $devices = $this->_wmi_connector->instancesof("Win32_PNPEntity");

        foreach ($devices as $device) {

            $data[] = [
              'Availability'=>$device->Availability,
              'Caption'=>$device->Caption,
              'ClassGuid'=>$device->ClassGuid,
              'CompatibleID'=>$device->CompatibleID,
              'ConfigManagerErrorCode'=>$device->ConfigManagerErrorCode,
              'ConfigManagerUserConfig'=>$device->ConfigManagerUserConfig,
              'CreationClassName'=>$device->CreationClassName,
              'Description'=>$device->Description,
              'DeviceID'=>$device->DeviceID,
              'ErrorCleared'=>$device->ErrorCleared,
              'ErrorDescription'=>$device->ErrorDescription,
              'HardwareID'=>$device->HardwareID,
              'InstallDate'=>$device->InstallDate,
              'LastErrorCode'=>$device->LastErrorCode,
              'Manufacturer'=>$device->Manufacturer,
              'Name'=>$device->Name,
              'PNPClass'=>$device->PNPClass,
              'PNPDeviceID'=>$device->PNPDeviceID,
              'PowerManagementCapabilities'=>$device->PowerManagementCapabilities,
              'Present'=>$device->Availability,
              'Service'=>$device->Service,
              'Status'=>$device->Status,
              'StatusInfo'=>$device->StatusInfo,
              'SystemCreationClassName'=>$device->SystemCreationClassName,
              'SystemName'=>$device->SystemName
            ];

        }

        return $data;

    }

    /**
     * @param $PNPDeviceID
     */
    public function Disable($PNPDeviceID)
    {

        $devices = $this->_wmi_connector->ExecQuery('SELECT * FROM Win32_PNPEntity WHERE PNPDeviceID = "$PNPDeviceID"');

        foreach ($devices as $device)
            $device->Disable();

    }

    /**
     *
     */
    public function Enable($PNPDeviceID)
    {

        $devices = $this->_wmi_connector->ExecQuery('SELECT * FROM Win32_PNPEntity WHERE PNPDeviceID = "{$PNPDeviceID}"');

        foreach ($devices as $device)
            $device->Enable();

    }

}