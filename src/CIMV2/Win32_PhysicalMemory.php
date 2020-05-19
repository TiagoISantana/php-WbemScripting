<?php


namespace CIMV2;

use Connector\WMIConnector;

final class Win32_PhysicalMemory extends WMIConnector
{

    /**
     * @return array
     * Retrieve information memory of the machine
     */
    public function getAttributes(): array
    {


        foreach ($this->_wmi_connector->instancesof('Win32_PhysicalMemory') as $mem) {

            $Attributes[] = (int)$mem->Attributes;
            $BankLabel[] = (string)$mem->BankLabel;
            $Capacity[] = (int)$mem->Capacity;
            $ConfiguredClockSpeed[] = (int)$mem->ConfiguredClockSpeed;
            $ConfiguredVoltage[] = (int)$mem->ConfiguredVoltage;
            $CreationClassName[] = (string)$mem->CreationClassName;
            $DataWidth[] = (string)$mem->DataWidth;
            $DeviceLocator[] = (string)$mem->DeviceLocator;
            $FormFactor[] = (string)$mem->FormFactor;
            $HotSwappable[] = (bool)$mem->HotSwappable;
            $InterleaveDataDepth[] = (int)$mem->InterleaveDataDepth;
            $InterleavePosition [] = (int)$mem->InterleavePosition;
            $Manufacturer  [] = (string)$mem->Manufacturer;
            $MaxVoltage   [] = (int)$mem->MaxVoltage;
            $MemoryType[] = (int)$mem->MemoryType;
            $MinVoltage[] = (int)$mem->MinVoltage;
            $Model[] = (string)$mem->Model;
            $OtherIdentifyingInfo[] = (string)$mem->OtherIdentifyingInfo;
            $PartNumber[] = (string)$mem->PartNumber;
            $PositionInRow[] = (int)$mem->PositionInRow;
            $PoweredOn[] = (bool)$mem->PoweredOn;
            $Removable[] = (bool)$mem->Removable;
            $Replaceable[] = (bool)$mem->Replaceable;
            $SerialNumber[] = (string)$mem->SerialNumber;
            $SKU[] = (string)$mem->SKU;
            $SMBIOSMemoryType[] = (int)$mem->SMBIOSMemoryType;
            $Speed[] = (int)$mem->Speed;
            $Tag[] = (string)$mem->Tag;
            $TotalWidth[] = (int)$mem->TotalWidth;
            $TypeDetail[] = (int)$mem->TypeDetail;
            $Version[] = (int)$mem->Version;

        }

        return [
            'Attributes' => $Attributes,
            'BankLabel' => $BankLabel,
            'Capacity' => $Capacity,
            'ConfiguredClockSpeed' => $ConfiguredClockSpeed,
            'ConfiguredVoltage' => $ConfiguredVoltage,
            'CreationClassName' => $CreationClassName,
            'DataWidth' => $DataWidth,
            'DeviceLocator' => $DeviceLocator,
            'FormFactor' => $FormFactor,
            'HotSwappable' => $HotSwappable,
            'InterleaveDataDepth' => $InterleaveDataDepth,
            'InterleavePosition' => $InterleavePosition,
            'Manufacturer' => $Manufacturer,
            'MaxVoltage' => $MaxVoltage,
            'MemoryType' => $MemoryType,
            'MinVoltage' => $MinVoltage,
            'Model' => $Model,
            'OtherIdentifyingInfo' => $OtherIdentifyingInfo,
            'PartNumber' => $PartNumber,
            'PositionInRow' => $PositionInRow,
            'PoweredOn' => $PoweredOn,
            'Removable' => $Removable,
            'Replaceable' => $Replaceable,
            'SerialNumber' => $SerialNumber,
            'SKU ' => $SKU,
            'SMBIOSMemoryType ' => $SMBIOSMemoryType,
            'Speed' => $Speed,
            'Tag' => $Tag,
            'TotalWidth' => $TotalWidth,
            'TypeDetail' => $TypeDetail,
            'Version' => $Version,
        ];

    }

}