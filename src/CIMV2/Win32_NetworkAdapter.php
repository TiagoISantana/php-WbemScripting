<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_NetworkAdapter
 * @package CIMV2
 * The Win32_NetworkAdapter class represents a network adapter on a Win32 system.
 */
final class Win32_NetworkAdapter extends WMIConnector
{

    /**
     * @return array
     * Retrieve information network adapter of the machine
     */
    public function getAttributes(): array
    {

        foreach ($this->_wmi_connector->instancesof('Win32_NetworkAdapter') as $adapters) {

            if ($adapters->AdapterType != '') {

                $AdapterType[] = $adapters->AdapterType;
                $ProductName[] = $adapters->ProductName;
                $Speed[] = $adapters->Speed;
                $SystemName[] = $adapters->SystemName;

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
