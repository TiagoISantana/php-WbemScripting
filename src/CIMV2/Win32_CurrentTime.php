<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_CurrentTime
 * @package CIMV2
 */
final class Win32_CurrentTime extends WMIConnector
{

    /**
     * @return array
     * Retrieve information processor of the machine
     */
    public function getAttributes(): array
    {

        $data = [];
        $datetime = $this->_wmi_connector->instancesof("Win32_CurrentTime");

        foreach ($datetime as $info) {

            $data[] = [
              'Day'=>$info->Day,
              'DayOfWeek'=>$info->DayOfWeek,
              'Hour'=>$info->Hour,
              'Milliseconds'=>$info->Milliseconds,
              'Minute'=>$info->Minute,
              'Month'=>$info->Month,
              'Quarter'=>$info->Quarter,
              'Second'=>$info->Second,
              'WeekInMonth'=>$info->Day
            ];


        }

        return $data;

    }


}