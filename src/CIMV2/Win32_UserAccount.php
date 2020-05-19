<?php


namespace CIMV2;

use Connector\WMIConnector;

final class Win32_UserAccount extends WMIConnector
{


    /**
     * @return array
     * Retrieve information off all users in the machine
     * Warning: This method works very fast on local machine but not on domain machine
     */
    public function getAProperties(): array
    {

        $usersList = [];

        foreach ($this->_wmi_connector->instancesof('Win32_UserAccount') as $users) {

            $usersList[] = [
                'AccountType' => (int)$users->AccountType,
                'Disabled' => (bool)$users->Disabled,
                'Domain' => (string)$users->Domain,
                'FullName' => (string)$users->FullName,
                'LocalAccount' => (bool)$users->LocalAccount,
                'Lockout' => (bool)$users->Lockout,
                'Name' => (string)$users->Name,
                'PasswordChangeable' => (bool)$users->PasswordChangeable,
                'PasswordExpires' => (bool)$users->PasswordExpires,
                'PasswordRequired' => (bool)$users->PasswordRequired,
                'SID' => (string)$users->SID,
                'SIDType' => (int)$users->SIDType,


            ];

        }

        return $usersList;

    }

}