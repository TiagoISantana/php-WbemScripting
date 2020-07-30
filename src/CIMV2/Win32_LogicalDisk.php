<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Volume
 * TODO: Methods to add - AddMountPoint(), DefragAnalysis(), ExcludeFromAutoChk(), Reset(), ScheduleAutoChk(), SetPowerState()
 * @package WMI
 */
final class Win32_LogicalDisk extends WMIConnector
{

    /**
     * @return array
     * Retrieve information volumes(disks) of the machine
     */
    public function getAttributes(): array
    {

        foreach ($this->_wmi_connector->instancesof('Win32_LogicalDisk') as $volume) {

            $data[] = [
                'Access' => (int)$volume->Access,
                'Availability' => (int)$volume->Availability,
                'BlockSize' => (int)$volume->BlockSize,
                'Compressed' => (bool)$volume->Compressed,
                'ConfigManagerErrorCode' => (int)$volume->ConfigManagerErrorCode,
                'ConfigManagerUserConfig' => (bool)$volume->ConfigManagerUserConfig,
                'CreationClassName' => (string)$volume->CreationClassName,
                'DeviceID' => (string)$volume->DeviceID,
                'DriveType' => (int)$volume->DriveType,
                'ErrorCleared' => (bool)$volume->ErrorCleared,
                'ErrorDescription' => (string)$volume->ErrorDescription,
                'ErrorMethodology' => (string)$volume->ErrorMethodology,
                'FileSystem' => (string)$volume->FileSystem,
                'FreeSpace' => (int)$volume->FreeSpace,
                'LastErrorCode' => (int)$volume->LastErrorCode,
                'MediaType' => (int)$volume->MediaType,
                'NumberOfBlocks' => (int)$volume->NumberOfBlocks,
                'PNPDeviceID' => (string)$volume->PNPDeviceID,
                'PowerManagementCapabilities' => (int)$volume->PowerManagementCapabilities,
                'PowerManagementSupported' => (bool)$volume->PowerManagementSupported,
                'ProviderName' => (string)$volume->ProviderName,
                'Purpose' => (string)$volume->Purpose,
                'QuotasDisabled' => (bool)$volume->QuotasDisabled,
                'QuotasIncomplete' => (bool)$volume->QuotasIncomplete,
                'QuotasRebuilding' => (bool)$volume->QuotasRebuilding,
                'Size' => (int)$volume->Size,
                'StatusInfo' => (int)$volume->StatusInfo,
                'SupportsDiskQuotas' => (bool)$volume->SupportsDiskQuotas,
                'SupportsFileBasedCompression' => (bool)$volume->SupportsFileBasedCompression,
                'SystemCreationClassName' => (string)$volume->SystemCreationClassName,
                'SystemName' => (string)$volume->SystemName,
                'VolumeDirty' => (bool)$volume->VolumeDirty,
                'VolumeName' => (string)$volume->VolumeName,
                'VolumeSerialNumber' => (string)$volume->VolumeSerialNumber,
            ];

        }

        return $data;

    }

}