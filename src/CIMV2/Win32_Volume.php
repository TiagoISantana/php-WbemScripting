<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Volume
 * TODO: Methods to add - AddMountPoint(), DefragAnalysis(), ExcludeFromAutoChk(), Reset(), ScheduleAutoChk()
 * @package WMI
 */
final class Win32_Volume extends WMIConnector
{

    /**
     * @return array
     * Retrieve information volumes(disks) of the machine
     */
    public function getAttributes(): array
    {

        foreach ($this->_wmi_connector->instancesof('Win32_Volume') as $volume) {

            $data[] = [
                'Access' => (int)$volume->Access,
                'Automount' => (bool)$volume->Automount,
                'Availability' => (int)$volume->Availability,
                'BlockSize' => (int)$volume->BlockSize,
                'BootVolume' => (bool)$volume->BootVolume,
                'Capacity' => (int)$volume->Capacity,
                'Compressed' => (bool)$volume->Compressed,
                'ConfigManagerErrorCode' => (int)$volume->ConfigManagerErrorCode,
                'ConfigManagerUserConfig' => (bool)$volume->ConfigManagerUserConfig,
                'CreationClassName' => (string)$volume->CreationClassName,
                'DeviceID' => (string)$volume->DeviceID,
                'DirtyBitSet' => (bool)$volume->DirtyBitSet,
                'DriveLetter' => (string)$volume->DriveLetter,
                'DriveType' => (bool)$volume->DriveType,
                'ErrorCleared' => (bool)$volume->ErrorCleared,
                'ErrorDescription' => (string)$volume->ErrorDescription,
                'ErrorMethodology' => (string)$volume->ErrorMethodology,
                'FileSystem' => (string)$volume->FileSystem,
                'FreeSpace' => (int)$volume->FreeSpace,
                'IndexingEnabled' => (bool)$volume->IndexingEnabled,
                'Label' => (string)$volume->Label,
                'LastErrorCode' => (int)$volume->LastErrorCode,
                'MaximumFileNameLength' => (int)$volume->MaximumFileNameLength,
                'NumberOfBlocks' => (int)$volume->NumberOfBlocks,
                'PageFilePresent' => (bool)$volume->PageFilePresent,
                'PowerManagementCapabilities' => (int)$volume->PowerManagementCapabilities,
                'PNPDeviceID' => (string)$volume->PNPDeviceID,
                'PowerManagementSupported' => (bool)$volume->PowerManagementSupported,
                'Purpose' => (string)$volume->Purpose,
                'QuotasEnabled' => (bool)$volume->QuotasEnabled,
                'QuotasIncomplete' => (bool)$volume->QuotasIncomplete,
                'QuotasRebuilding' => (bool)$volume->QuotasRebuilding,
                'SerialNumber' => (int)$volume->SerialNumber,
                'StatusInfo' => (int)$volume->StatusInfo,
                'SupportsDiskQuotas' => (bool)$volume->SupportsDiskQuotas,
                'SupportsFileBasedCompression' => (bool)$volume->SupportsFileBasedCompression,
                'SystemCreationClassName' => (string)$volume->SystemCreationClassName,
                'SystemName' => (string)$volume->SystemName,
                'SystemVolume' => (bool)$volume->SystemVolume,
            ];

        }

        return $data;

    }

    /**
     * @param string $DriverLetter
     * @param string $FileSystem
     * @param bool $QuickFormat
     * @param string $ClusterSize
     * @param string $Label
     */
    public function FormatDisk(string $DriverLetter, string $FileSystem, bool $QuickFormat, string $ClusterSize, string $Label = 'DATA')
    {

        $volumes = $this->_wmi_connector->ExecQuery("SELECT * FROM Win32_Volume WHERE DriveLetter = '$DriverLetter' ");


        foreach ($volumes as $volume)
            $volume->Format($FileSystem, $QuickFormat);


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
            $disk->Dismount($Force, $Permanent);


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

    /**
     * @param string $DriverLetter
     * @param bool $Force
     * @return int
     */
    public function Defrag(string $DriverLetter, bool $Force): int
    {

        $disks = $this->_wmi_connector->ExecQuery("SELECT * FROM Win32_Volume WHERE DriveLetter = '$DriverLetter' ");

        foreach ($disks as $disk)
            return $disk->Defrag($Force);


    }



}