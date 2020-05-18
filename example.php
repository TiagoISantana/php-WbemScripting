<?php


require "vendor/autoload.php";


$obj = new CIMV2\Win32_PhysicalMemory(".");


var_dump($obj->getMachineMemory());
