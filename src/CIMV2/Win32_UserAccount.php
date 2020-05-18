<?php


namespace CIMV2;

use Connector\WMIConnector;

final class Win32_UserAccount extends WMIConnector
{


    /**
     * @return array
     * Retrieve information off all users in the machine
     */
    public function getMachineUsersBETA(): array
    {

        $usersList = [];

        foreach ($this->_wmi_connector->instancesof('Win32_UserAccount') as $users) {

            $usersList[] = [
                'FullName' => $users->FullName,
                'AccountType' => $users->AccountType,
                'Domain' => $users->Domain,
                'LocalAccount' => $users->LocalAccount,
                'Name' => $users->Name,
                'SID' => $users->SID,

            ];

        }

        return $usersList;

    }

}