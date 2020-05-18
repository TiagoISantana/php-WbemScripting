<?php


namespace CIMV2;

use Connector\WMIConnector;

final class Win32_NetworkAdapter extends WMIConnector
{

    /**
     * @return array
     * Retrieve information network adapter of the machine
     */
    public function getNetworkAdapter(): array
    {

        foreach ($this->_wmi_connector->instancesof('Win32_NetworkAdapter') as $os) {

            if ($os->AdapterType != '') {

                $AdapterType[] = $os->AdapterType;
                $ProductName[] = $os->ProductName;
                $Speed[] = $os->Speed;
                $SystemName[] = $os->SystemName;

            }

        }

        return [
            'AdapterType' => $AdapterType,
            'ProductName' => $ProductName,
            'Speed' => $Speed,
            'SystemName' => $SystemName
        ];

    }

}
