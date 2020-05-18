<?php

namespace CIMV2;


use Connector\WMIConnector;

/**
 * Class Win32_Process
 * @package WMI
 */
final class Win32_Process extends WMIConnector
{

    /**
     * @return array
     * Retrieve information running process of the machine
     */
    public function getMachineProcess(): array
    {

        $processList = [];

        foreach ($this->_wmi_connector->instancesof('Win32_Process') as $process) {

            if ($process->ExecutablePath != '') {
                $processList[] = [
                    'ExecutablePath' => $process->ExecutablePath,
                    'PID' => $process->ProcessId,
                    'Threads' => $process->ThreadCount,
                    'Command' => $process->CommandLine
                ];
            }

        }

        return $processList;

    }

    /**
     * @param int $pid
     */
    public function killProcess(int $pid): void
    {

        $pids = $this->_wmi_connector->ExecQuery("SELECT * FROM Win32_Process WHERE ProcessId = $pid ");

        foreach ($pids as $pd)
            $pd->Terminate();


    }

    /**
     * @param string $ProcessName
     * @return
     */
    public function createNewProcess(string $ProcessName)
    {

        $process = $this->_wmi_connector->Get('Win32_Process');

        return $process->Create($ProcessName);

    }



}
