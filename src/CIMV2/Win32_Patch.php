<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Patch
 * @package CIMV2
 * Instances of this class represent individual patches that are to be applied to a particular file and whose source reside at a specified location.
 */
final class Win32_Patch extends WMIConnector
{

    /**
     * @return array
     * Retrieve all patches to files information
     */
    public function getAttributes(): array
    {

        $patchList = [];

        foreach ($this->_wmi_connector->instancesof('Win32_Patch') as $patches) {

            $usersList[] = [
                'Attributes' => (int)$patches->Attributes,
                'Caption' => (string)$patches->Caption,
                'Description' => (string)$patches->Description,
                'File' => (string)$patches->File,
                'PatchSize' => (int)$patches->PatchSize,
                'ProductCode' => (string)$patches->ProductCode,
                'Sequence' => (int)$patches->Sequence,
                'SettingID' => (string)$patches->SettingID,
            ];

        }

        return $patchList;

    }

}