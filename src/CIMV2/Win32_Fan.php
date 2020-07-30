<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Fan
 * @package CIMV2
 * The Win32_Fan class represents the properties of a fan device in the computer system. For example, the CPU cooling fan.
 */
final class Win32_Fan extends WMIConnector
{

    /**
     * @return array
     * Retrieve information of the machine fan
     */
    public function getAttributes(): array
    {

        $devices = [];

        foreach ($this->_wmi_connector->instancesof('Win32_Fan') as $usb) {

            $devices[] = [
                'ActiveCooling'=>(bool)$usb->ActiveCooling,
                'DesiredSpeed'=>(int)$usb->DesiredSpeed,
                'DeviceID'=>(string)$usb->DeviceID,
                'VariableSpeed'=>(bool)$usb->VariableSpeed,
            ];
        }

        return $devices;

    }

    /**
     * @param $speed
     * @return int value must be in rpm
     * Set the target machine fan speed
     */
    public function SetSpeed(int $speed): int
    {
        $return = 0;
        foreach ($this->_wmi_connector->instancesof('Win32_Fan') as $fan) {
            $return = $fan->SetSpeed($speed);
        }

        return (int)$return;
    }




}