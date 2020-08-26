<?php

header('Content-Type: application/json');

require_once '../vendor/autoload.php';

$objVolume = new \CIMV2\Win32_Battery('.');

echo json_encode($objVolume->getProperties());