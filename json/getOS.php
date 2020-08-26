<?php

header('Content-Type: application/json');

require_once '../vendor/autoload.php';

$objVolume = new \CIMV2\Win32_OperatingSystem('.');

echo json_encode($objVolume->getMachineOS());