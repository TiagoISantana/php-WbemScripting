<?php

namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Process
 * @package WMI
 * The Win32_Process class represents a sequence of events on a Win32 system.
 * Any sequence consisting of the interaction of one or more processors or interpreters, some executable code, and a set of inputs, is a descendent (or member) of this class.
 */
final class Win32_Process extends WMIConnector
{

    /**
     * @return array
     * Retrieve information running process of the machine
     */
    public function getAttributes(): array
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
     *
     * The Create method creates a new process.
     * The method returns an integer value that can be interpretted as follows:
     * 0 - Successful completion.
     * 2 - The user does not have access to the requested information.
     * 3 - The user does not have sufficient privilge.
     * 8 - Unknown failure.
     * 9 - The path specified does not exist.
     * 21 - The specified parameter is invalid.
     * Other - For integer values other than those listed above, refer to Win32 error code documentation.
     */
    public function killProcess(int $pid): void
    {

        $pids = $this->_wmi_connector->ExecQuery("SELECT * FROM Win32_Process WHERE ProcessId = $pid ");

        foreach ($pids as $pd)
            $pd->Terminate();


    }

    /**
     * @param string $ProcessName
     * @return int
     */
    public function createNewProcess(string $ProcessName)
    {

        $process = $this->_wmi_connector->Get('Win32_Process');

        return $process->Create($ProcessName);

    }

}
