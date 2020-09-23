<?php
ini_set('max_execution_time',0);

require "vendor/autoload.php";

$cfg = [
    'hostname' => 'localhost',
    'user' => '',
    'pass' => '',
    'info' => []
];

try{


    $cli = new Console\CliTools('WMI - Remote Access');
    $cli->cliClear();
    $cli->drawLogo();
    $cli->cliJumpLine(1);
    $cli->cliWriteLine('Remotely execute command os machines', FALSE, 'blue');
    $cli->cliJumpLine(2);
    $cli->cliNewBlock(2);
    $cli->cliJumpLine(2);

    $hostname = $cli->cliGetUserInput('Enter the remote machine hostname:');


    if (empty($hostname)){
        $cli->cliWriteLine('Connecting to localhost instead');
    } else{

        $cfg['hostname'] = $hostname;
        $cli->cliJumpLine(2);

        $cfg['user'] = $cli->cliGetUserInput('Domain\\Username:');
        $cli->cliJumpLine(1);
        $cfg['pass'] = $cli->cliGetUserInput('Password:');

        $cli->cliWriteLine('Password: ********',true);
        $cli->cliJumpLine(1);

    }

    $cli->cliJumpLine(1);
    $cli->cliWriteLine('Connecting to WMI services...', FALSE, 'cyan');

    $cli->cliJumpLine(1);
    $wmi = new \CIMV2\Win32_Process($cfg['hostname']);

    $cli->cliWriteLine('Connected!', FALSE, 'cyan');
    $cli->cliJumpLine(2);

    while (TRUE){

        $command = $cli->cliGetUserInput('Type the command to execute on the remote machine ():');
        $cli->cliJumpLine();

        $rc = $wmi->createNewProcess($command);

        if($rc == 0 )
            $cli->cliWriteLine('Command Executed successfully', FALSE, 'green');
        else
            $cli->cliWriteLine('Failed to execute command, return code is '.$rc, FALSE, 'red');

        $cli->cliJumpLine();

    }


}catch (Exception $exception){

    $cli->cliWriteLine($exception->getMessage(),FALSE,'white','red');

}




