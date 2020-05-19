<?php
ini_set('max_execution_time',0);
require "vendor/autoload.php";
ini_set('max_execution_time',0);
$obj = new CIMV2\Win32_SoftwareElement(".");
ini_set('max_execution_time',0);
print_r($obj->getSoftware());



