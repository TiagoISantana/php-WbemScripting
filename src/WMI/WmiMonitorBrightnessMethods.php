<?php

namespace WMI;


use Connector\WMIConnector;

/**
 * Class Win32_Process
 * @package WMI
 */
class WmiMonitorBrightnessMethods extends WMIConnector
{

    public function __construct(string $host, string $username = null, string $password = null)
    {

        parent::__construct($host, $username, $password, $ROOT_CI = "root\wmi", $ROOT_FO = "ms_409");

    }

    public function WmiSetBrightness(bool $brightness): void
    {

        $WmiMonitorBrightnessMethods = $this->_wmi_connector->InstancesOf("WmiMonitorBrightnessMethods");

        foreach ($WmiMonitorBrightnessMethods as $method)
            $method->WmiSetBrightness(TRUE, $brightness);

    }

}
