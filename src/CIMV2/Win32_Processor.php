<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_Processor
 * @package CIMV2
 * The Win32_Processor class represents a device that is capable of interpreting a sequence of machine instructions on a Win32 computer system. On a multiprocessor machine, there will exist one instance of this class for each processor.
 */
final class Win32_Processor extends WMIConnector
{

    /**
     * @return array
     * Retrieve information processor of the machine
     */
    public function getAttributes(): array
    {

        $cores = 0;
        $processors = 0;
        $maxClockSpeed = 0;

        foreach ($this->_wmi_connector->instancesof('Win32_Processor') as $processor) {

            $cores += $processor->NumberOfCores;
            $processors += $processor->NumberOfLogicalProcessors;
            $maxClockSpeed = $processor->MaxClockSpeed;

        }

        return [
            'CPUCores' => $cores,
            'CPUProcessors' => $processors,
            'CPUMaxClockSpeed' => $maxClockSpeed,
        ];

    }

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

}