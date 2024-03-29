<?php

namespace WMI;


use Connector\WMIConnector;

/**
 * Class Win32_Process
 * Set current brightness setting
 * @package WMI
 */
class WmiMonitorBrightnessMethods extends WMIConnector
{

    /**
     * WmiMonitorBrightnessMethods constructor.
     * @param string $host
     * @param string|null $username
     * @param string|null $password
     * @throws \Exception
     */
    public function __construct(string $host, string $username = null, string $password = null)
    {

        parent::__construct($host, $username, $password, $ROOT_CI = "root\wmi", $ROOT_FO = "ms_409");

    }

    /**
     * This method can set monitor brightness, but for some reason float|int does not work, instead the method only accepts bool
     * FALSE = 0% | TRUE = 100%
     * @param bool $brightness
     */
    public function WmiSetBrightness(bool $brightness): void
    {

        $WmiMonitorBrightnessMethods = $this->_wmi_connector->InstancesOf("WmiMonitorBrightnessMethods");

        foreach ($WmiMonitorBrightnessMethods as $method)
            $method->WmiSetBrightness(TRUE, $brightness);

    }

}
