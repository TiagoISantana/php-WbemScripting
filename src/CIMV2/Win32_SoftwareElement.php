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
                'a' => $software->Name,
                'b' => $software->Path,
                'c' => $software->Version,
                'd' => $software->Manufacturer,
                'e' => $software->InstallState,
            ];
        }

        return $softwareList;

    }

}