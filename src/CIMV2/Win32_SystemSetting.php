<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_SystemSetting
 * @package CIMV2
 * The Win32_SystemSetting class represents an association between a computer system and a general setting on that system.
 */
final class Win32_SystemSetting extends WMIConnector
{

    /**
     * @return array
     * Retrieve information OS of the machine
     */
    public function getAttributes(): array
    {

        $setting = [];

        foreach ($this->_wmi_connector->instancesof('Win32_SystemSetting') as $settings) {

            $setting[] = [
                'Element'=>$settings->Element,
                'Setting'=>$settings->Setting,
            ];
        }

        return (array)$setting;

    }

}