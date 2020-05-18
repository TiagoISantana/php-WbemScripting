<?php


namespace CIMV2;

use Connector\WMIConnector;

final class Win32_OperatingSystem extends WMIConnector
{

    /**
     * @return array
     * Retrieve information OS of the machine
     */
    public function getMachineOS(): array
    {

        foreach ($this->_wmi_connector->instancesof('Win32_OperatingSystem') as $os) {

            $version = $os->Version;
            $architecture = $os->OSArchitecture;
            $cs = $os->CSName;
            $name = $os->Name;
        }

        return [
            'OSVersion' => $version,
            'OSArchitecture' => $architecture,
            'CSName' => $cs,
            'OSName' => $name,
        ];

    }



    public function restartMachine()
    {

        foreach ($this->_wmi_connector->instancesof('Win32_OperatingSystem') as $sd)
            $sd->Reboot();

    }

}