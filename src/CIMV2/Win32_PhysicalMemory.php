<?php


namespace CIMV2;

use Connector\WMIConnector;

final class Win32_PhysicalMemory extends WMIConnector
{

    /**
     * @return array
     * Retrieve information memory of the machine
     */
    public function getMachineMemory(): array
    {

        $memSpeed = 0;
        $capacity = 0;

        foreach ($this->_wmi_connector->instancesof('Win32_PhysicalMemory') as $mem) {

            $memSpeed = (int)$mem->Speed;
            $capacity += (int)$mem->Capacity;

            print_r($mem->Capacity);
        }

        return [
            'MemorySpeed' => $memSpeed,
            'MemoryCapacity' => $capacity,
        ];

    }

}