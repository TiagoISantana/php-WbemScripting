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
final class Win32_Product extends WMIConnector
{

    /**
     * @return array
     * Retrieve information volumes(disks) of the machine
     */
    public function getAttributes(): array
    {

        $productList = [];

        foreach ($this->_wmi_connector->instancesof('Win32_Product') as $product) {

            $productList[] = [
                'AssignmentType' => $product->AssignmentType,
                'Caption' => $product->Caption,
                'Description' => $product->Description,
                'HelpLink' => $product->HelpLink,
                'HelpTelephone' => $product->HelpTelephone,
                'IdentifyingNumber' => $product->IdentifyingNumber,
                'InstallDate' => $product->InstallDate,
                'InstallDate2' => $product->InstallDate2,
                'InstallLocation' => $product->InstallLocation,
                'InstallSource' => $product->InstallSource,
                'InstallState' => $product->InstallState,
                'Language' => $product->Language,
                'LocalPackage' => $product->LocalPackage,
                'Name' => $product->Name,
                'PackageCache' => $product->PackageCache,
                'PackageCode' => $product->PackageCode,
                'PackageName' => $product->PackageName,
                'ProductID' => $product->ProductID,
                'RegCompany' => $product->RegCompany,
                'RegOwner' => $product->RegOwner,
                'SKUNumber' => $product->SKUNumber,
                'Transforms' => $product->Transforms,
                'URLInfoAbout' => $product->URLInfoAbout,
                'URLUpdateInfo' => $product->URLUpdateInfo,
                'Vendor' => $product->Vendor,
                'Version' => $product->Version,
                'WordCount' => $product->WordCount,
            ];
        }

        return (array)$productList;

    }

    public function Install()
    {

        $return = null;

        foreach ($this->_wmi_connector->instancesof('Win32_Product') as $product) {
            $return =  $product->Install("C:\Users\Tiago\LCARS_47_Version_6_3_Install.exe",null,TRUE);
            break;

        }

        return $return;

    }

}