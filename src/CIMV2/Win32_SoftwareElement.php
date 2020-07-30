<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Volume
 * @package WMI
 * The Win32_SMBIOSMemory class represents the properties of a computer system's memory as seen through the System Management BIOS (SMBIOS) interface.
 * The SMBIOS interface does not distinguish between non-volatile, volatile, and flash memories.
 * As such, the CIM_Memory class is the parent class of all types of memory.
 */
final class Win32_SoftwareElement extends WMIConnector
{

    /**
     * @return array
     * Retrieve information volumes(disks) of the machine
     */
    public function getAttributes(): array
    {

        $softwareList = [];

        foreach ($this->_wmi_connector->instancesof('Win32_SoftwareElement') as $software) {

            $softwareList[] = [
                'Attributes' => $software->Attributes,
                'BuildNumber' => $software->BuildNumber,
                'CodeSet' => $software->CodeSet,
                'IdentificationCode' => $software->IdentificationCode,
                'InstallState' => $software->InstallState,
                'LanguageEdition' => $software->LanguageEdition,
                'Manufacturer' => $software->Manufacturer,
                'Name' => $software->Name,
                'OtherTargetOS' => $software->OtherTargetOS,
                'Path' => $software->Path,
                'SerialNumber' => $software->SerialNumber,
                'SoftwareElementID' => $software->SoftwareElementID,
                'SoftwareElementState' => $software->SoftwareElementState,
                'TargetOperatingSystem' => $software->TargetOperatingSystem,
                'Version' => $software->Version,
            ];
        }

        return (array)$softwareList;

    }

}