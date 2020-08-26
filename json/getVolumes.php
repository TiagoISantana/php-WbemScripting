<?php

header('Content-Type: application/json');

require_once '../vendor/autoload.php';

$objVolume = new \CIMV2\Win32_LogicalDisk('.');

echo json_encode($objVolume->getAttributes());