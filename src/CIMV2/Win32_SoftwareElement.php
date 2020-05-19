<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Volume
 * @package WMI
 */
final class Win32_SoftwareElement extends WMIConnector
{

    /**
     * @return array
     * Retrieve information volumes(disks) of the machine
     */
    public function getSoftware(): array
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

        return $softwareList;

    }

}