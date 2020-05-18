<?php

namespace Connector;

use Exception;
use COM;

/**
 * @autor Tiago Iamamoto Santana
 * Class WMIRemoteConnection
 * https://docs.microsoft.com/en-us/windows/win32/wmisdk
 * This class can connect into local/remote machine and retrieve/execute information and actions on the remote machine
 */
class WMIConnector {

    /**
     * @var COM
     * @official_documentation https://docs.microsoft.com/en-us/windows/win32/wmisdk/swbemlocator-connectserver
     * This is the COM extension loaded with WbemScripting.SWbemLocator.
     * This object connects to the namespace on the computer that is specified in the connections parameter.
     *
     */
    protected $_swbem_locator;

    /**
     * @var
     * @official_documentation https://docs.microsoft.com/en-us/windows/win32/wmisdk/swbemlocator-connectserver#examples
     * This is property invorke the only method available on instance "ConnectServer"
     */
    protected $_wmi_connector;

    /**
     * https://docs.microsoft.com/en-us/dotnet/api/system.management.managementscope?redirectedfrom=MSDN&view=netframework-4.8
     * This is the ROOT namespaces configuration you can explore using the software called "WMI Explorer 2.0"
     * https://www.bleepingcomputer.com/download/wmi-explorer/
     * CIMv2(Common Information Model Version 2)
     * Namespaces may contain more then sub namespaces.
     * Namespaces contains classes that can be called to retrieve machine data
     */
    public $_ROOT_CI = "root\cimv2";

    /**
     * This is the sub namespace available inside the "root\cimv2" which contains Win32_*
     */
    public $_ROOT_FO = "MS_409";

    /**
     * WMIRemoteConnection constructor.
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $ROOT_CI
     * @param string $ROOT_FO
     * @throws Exception
     */
    public function __construct(string $host, string $username = null, string $password = null, $ROOT_CI = "root\cimv2", $ROOT_FO = "ms_409")
    {

        //Check loaded extensions
        $loadedExtensions = get_loaded_extensions();

        //Check 'com_dotnet' extension is loaded
        if (!in_array('com_dotnet', $loadedExtensions))
            throw new Exception('COM Extension not loaded! Try enabling on your php.ini', 001);

        try {

            //Load WbemScripting.SWbemLocator class
            $this->_swbem_locator = new COM("WbemScripting.SWbemLocator");

            $this->_wmi_connector = $this->_swbem_locator->ConnectServer(
                $host,
                $ROOT_CI,
                $username,
                $password,
                $ROOT_FO
                //TODO:CONNECT ON DOMAIN MACHINES
            //"ntlmdomain: "
            );

            //Enable high level impersonation
            $this->_wmi_connector->Security_->ImpersonationLevel = 3;

        } catch (Exception $exception) {

            throw new Exception("Error on WMI connection: {$exception->getMessage()}", 002);

        }

    }

}