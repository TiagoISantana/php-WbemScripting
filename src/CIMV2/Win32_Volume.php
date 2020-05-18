<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Volume
 * @package WMI
 */
final class Win32_Volume extends WMIConnector
{

    /**
     * @return array
     * Retrieve information volumes(disks) of the machine
     */
    public function getMachineVolumes(): array
    {

        $volumeList = [];

        foreach ($this->_wmi_connector->instancesof('Win32_Volume') as $volume) {

            $volumeList[] = [
                'Capacity' => $volume->Capacity,
                'DriveLetter' => $volume->DriveLetter,
                'DeviceID' => $volume->DeviceID,
                'FreeSpace' => $volume->FreeSpace,
                'FileSystem' => $volume->FileSystem,
            ];
        }

        return $volumeList;

    }

    /**
     * @param string $DriverLetter
     * @param string $FileSystem
     * @param bool $QuickFormat
     * @param string $ClusterSize
     * @param string $Label
     */
    public function formatDisk(string $DriverLetter, string $FileSystem, bool $QuickFormat, string $ClusterSize, string $Label = 'DATA'  )
    {

        $volumes = $this->_wmi_connector->ExecQuery("SELECT * FROM Win32_Volume WHERE DriveLetter = '$DriverLetter' ");


        foreach ($volumes as $volume)
             $volume->Format($FileSystem,$QuickFormat);


    }

    /**
     * @param string $DriverLetter
     * @param bool $Force
     * @param bool $Permanent
     */
    public function DismountDisk(string $DriverLetter, bool $Force = false, bool $Permanent = false): void
    {

        $disks = $this->_wmi_connector->ExecQuery("SELECT * FROM Win32_Volume WHERE DriveLetter = '$DriverLetter' ");

        foreach ($disks as $disk)
            $disk->Dismount($Force,$Permanent);


    }

    /**
     * @param string $DriverLetter
     * @return int
     */
    public function MountDisk(string $DriverLetter): int
    {

        $disks = $this->_wmi_connector->ExecQuery("SELECT * FROM Win32_Volume WHERE DriveLetter = '$DriverLetter' ");

        //TODO: bool $EnableCompression = false, int $Version = 0
        foreach ($disks as $disk)
            return $disk->Mount();


    }

}