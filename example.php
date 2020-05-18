<?php


require "vendor/autoload.php";


$obj = new CIMV2\Win32_PhysicalMemory(".");


print_r($obj->getMachineMemory());
