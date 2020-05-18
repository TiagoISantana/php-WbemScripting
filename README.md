# PHP project using com_dotnet extension and  & WbemScripting

This project is a concept that php can be used to connect with windows machines using WMIC

#### Requirements

- PHP > 7.1.*;
- com_dotnet extension active;
- Windows machines: Because it uses com_dotnet extension;
- Make sure to enable WMI service on the remote machine: [tutorial](https://docs.microsoft.com/en-us/windows/win32/wmisdk/connecting-to-wmi-remotely-starting-with-vista)

#### Getting Started

###### Disclaimer

This library is in its initial stage and is without stability, I do not guarantee that it will work correctly on all machines.

###### What can you do with this?

- Connect to local & remote machines
- Get machine specs
- Create/End windows process
- Format Disk
- Even control screen brightness
- Much more coming soon...

###### Installation

Download the files and run composer

`composer install`

TODO:Composer registry

`composer install php-wbemscripting`

###### Running example.php

```php
<?php

//Load required files
require "vendor/autoload.php";

//Connect to localhost and load host memory specs
$obj = new CIMV2\Win32_PhysicalMemory(".");

//Returns information from physical server memory
print_r($obj->getMachineMemory());