<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_OperatingSystem
 * @package CIMV2
 * The Win32_OperatingSystem class represents an operating system installed on a Win32 computer system.
 * Any operating system that can be installed on a Win32 system is a descendent (or member) of this class
 */
final class Win32_OperatingSystem extends WMIConnector
{

    /**
     * @return array
     * Retrieve information OS of the machine
     */
    public function getAttributes(): array
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

    /**
     * @return int
     *  The Reboot method shuts down the computer system, then restarts it.
     * On computers running Windows NT/2000, the calling process must have the SE_SHUTDOWN_NAME privilege.
     * The method returns an integer value that can be interpretted as follows:
     * 0 - Successful completion
     */
    public function Reboot()
    {

        foreach ($this->_wmi_connector->instancesof('Win32_OperatingSystem') as $sd)
            return (int)$sd->Reboot();

    }

    /**
     * @return int
     *  The Shutdown method unloads programs and DLLs to the point where it is safe to turn off the computer.
     * All file buffers are flushed to disk, and all running processes are stopped.
     * On computer systems running Windows NT/2000, the calling process must have the SE_SHUTDOWN_NAME privilege.
     * The method returns an integer value that can be interpretted as follows:
     * 0 - Successful completion.
     */
    public function Shutdown()
    {

        foreach ($this->_wmi_connector->instancesof('Win32_OperatingSystem') as $sd)
            return (int)$sd->Shutdown();

    }

}