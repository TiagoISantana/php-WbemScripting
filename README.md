# PHP project using com_dotnet extension and  & WbemScripting

This project is a concept that php can be used to connect with Windows machines using WMI.

#### Requirements

- PHP > 7.1.*;
- com_dotnet extension active;
- Windows machines: Because it uses com_dotnet extension;
- Make sure to enable WMI service on the remote machine: [tutorial](https://docs.microsoft.com/en-us/windows/win32/wmisdk/connecting-to-wmi-remotely-starting-with-vista)

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

You need to enable WMI service on your target machine

Download the files and run composer

`composer install`

TODO:Composer registry

`composer install php-wbemscripting`

###### Running example.php

```php
<?php

//Load required Lib
require "vendor/autoload.php";

//Remote Machine
//$cimv2_ = new CIMV2\Win32_Process("hostname_or_ip",'domain\username','password');

//Use WMI locally
$cimv2_obj = new CIMV2\Win32_Process(".");

//List machine process
var_dump($cimv2_obj->getAttributes());
