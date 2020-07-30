<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Account
 * @package CIMV2
 * The Win32_Account class contains information about user accounts and group accounts known to the Win32 system.
 * User or group names recognized by a Windows NT domain are descendents (or members) of this class.
 * The Win32_Account class is not included in a default hardware inventory operation.
 */
final class Win32_Account extends WMIConnector
{

    /**
     * @return array
     * Retrieve information off all users in the machine
     * Warning: This method works very fast on local machine but not on domain machine
     */
    public function getAttributes(): array
    {

        $usersList = [];

        foreach ($this->_wmi_connector->instancesof('Win32_Account') as $users) {

            $usersList[] = [
                'Domain' => (string)$users->Domain,
                'LocalAccount' => (bool)$users->LocalAccount,
                'Name' => (string)$users->Name,
                'SID' => (string)$users->SID,
                'SIDType' => (int)$users->SIDType,
            ];

        }

        return (array)$usersList;

    }

}