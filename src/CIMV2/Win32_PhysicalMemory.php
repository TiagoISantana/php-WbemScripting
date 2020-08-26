<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_PhysicalMemory
 * @package CIMV2
 * The Win32_PhysicalMemory class represents a physical memory device located on a computer system as available to the operating system.
 *
 */
final class Win32_PhysicalMemory extends WMIConnector
{

    /**
     * @return array
     * Retrieve information memory of the machine
     */
    public function getAttributes(): array
    {

        foreach ($this->_wmi_connector->instancesof('Win32_PhysicalMemory') as $mem) {

            $memory[] = [
                'Attributes' => $mem->Attributes,
                'BankLabel' => $mem->BankLabel,
                'Capacity' => $mem->Capacity,
                'ConfiguredClockSpeed' => $mem->ConfiguredClockSpeed,
                'ConfiguredVoltage' => $mem->ConfiguredVoltage,
                'CreationClassName' => $mem->CreationClassName,
                'DataWidth' => $mem->DataWidth,
                'DeviceLocator' => $mem->DeviceLocator,
                'FormFactor' => $mem->FormFactor,
                'HotSwappable' => $mem->HotSwappable,
                'InterleaveDataDepth' => $mem->InterleaveDataDepth,
                'InterleavePosition' => $mem->InterleavePosition,
                'Manufacturer' => $mem->Manufacturer,
                'MaxVoltage' => $mem->MaxVoltage,
                'MemoryType' => $mem->MemoryType,
                'MinVoltage' => $mem->MinVoltage,
                'Model' => $mem->Model,
                'OtherIdentifyingInfo' => $mem->OtherIdentifyingInfo,
                'PartNumber' => $mem->PartNumber,
                'PositionInRow' => $mem->PositionInRow,
                'PoweredOn' => $mem->PoweredOn,
                'Removable' => $mem->Removable,
                'Replaceable' => $mem->Replaceable,
                'SerialNumber' => $mem->SerialNumber,
                'SKU ' => $mem->SKU,
                'SMBIOSMemoryType ' => $mem->SMBIOSMemoryType,
                'Speed' => $mem->Speed,
                'Tag' => $mem->Tag,
                'TotalWidth' => $mem->TotalWidth,
                'TypeDetail' => $mem->TypeDetail,
                'Version' => $mem->Version,
            ];
        }

        return $memory;

    }

}