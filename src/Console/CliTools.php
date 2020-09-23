<?php

namespace Console;

/**
 * Class CliTools
 * This tool helps you create
 */
class CliTools
{

    /**
     * @var string[]
     * This is the text color.
     */
    public $foreground_colors = [
        'black' => '0;30',
        'dark_gray' => '1;30',
        'blue' => '0;34',
        'light_blue' => '1;3',
        'green' => '0;32',
        'light_green' => '1;32',
        'cyan' => '0;36',
        'light_cyan' => '1;36',
        'red' => '0;31',
        'light_red' => '1;31',
        'purple' => '0;35',
        'light_purple' => '1;35',
        'brown' => '0;33',
        'yellow' => '1;33',
        'light_gray' => '0;37',
        'white' => '1;37'
    ];

    /**
     * @var string[]
     * This is the background of the text color.
     */
    public $background_colors = [
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '4',
        'magenta' => '45',
        'cyan' => '46',
        'light_gray' => '47',
    ];

    /**
     * @var string
     * Identify what OS you are using to use the correct commands
     */
    private $_OS = 'linux';

    /**
     * CliTools constructor.
     * @param string $process_name
     */
    public function __construct(string $process_name = 'Debug Mode')
    {

        cli_set_process_title($process_name);

        if (strncasecmp(PHP_OS, 'win', 3) === 0)
            $this->_OS = 'windows';


    }

    /**
     * @param string $string
     * @param bool $replace
     * @param string|null $foreground_color
     * @param string|null $background_color
     */
    public function cliWriteLine(string $string, bool $replace = FALSE, string $foreground_color = null, string $background_color = null): void
    {
        if ($replace)
            $colored_string = "\r ";
        else
            $colored_string = "";

        // Check if given foreground color found
        if (isset($this->foreground_colors[$foreground_color])) {
            $colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
        }
        // Check if given background color found
        if (isset($this->background_colors[$background_color])) {
            $colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
        }

        // Add string and end coloring
        $colored_string .= $string . "\033[0m";

        echo $colored_string;
    }

    /**
     * @param int $qty
     */
    public function cliJumpLine($qty = 1): void
    {

        for ($i = 0; $i != $qty; $i++) {
            echo "\n";
        }

    }

    /**
     * @param $varToDump
     */
    public function cliCreateBreakPoint($varToDump): void
    {

        var_dump($varToDump);
        $this::cliWriteLine('Break point, press enter to continue...', 'red');
        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);
        fclose($handle);

    }

    /**
     * @param string $message
     * @return string
     */
    public function cliGetUserInput(string $message): string
    {

        $this->cliWriteLine($message, 'green');
        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);
        fclose($handle);

        return trim($line);

    }

    /**
     * @return int
     */
    public function cliGetCols(): int
    {

        preg_match('/CON.*:(\n[^|]+?){3}(?<cols>\d+)/', `mode`, $matches);
        $cols = $matches['cols'];

        return $cols;

    }

    /**
     *
     */
    public function cliClear(): void
    {

        if (strncasecmp(PHP_OS, 'win', 3) === 0)
            popen('cls', 'w');
        else
            exec('clear');

    }

    /**
     * @param int $Lines
     */
    public function cliNewBlock($Lines = 1): void
    {

        $CliWidth = $this->cliGetCols();
        $CliWidth = $CliWidth * $Lines;

        for ($x = 1; $x <= $CliWidth; $x++) {
            echo "\xE2\x96\x88";
        }

    }

    /**
     * @param $done
     * @param $total
     * @param int $size
     */
    public function cliSetProgress($done, $total, $size = 30): void
    {

        static $start_time;

        // if we go over our bound, just ignore it
        if ($done > $total) return;

        if (empty($start_time)) $start_time = time();
        $now = time();

        $perc = (double)($done / $total);

        $bar = floor($perc * $size);

        $status_bar = "\r[";
        $status_bar .= str_repeat("\xE2\x96\x88", $bar);
        if ($bar < $size) {
            $status_bar .= str_repeat(" ", $size - $bar);
        } else {
            $status_bar .= "\xE2\x96\x88";
        }

        $disp = number_format($perc * 100, 0);

        $status_bar .= "] $disp%  $done/$total";

        $rate = ($now - $start_time) / $done;
        $left = $total - $done;
        $eta = round($rate * $left, 2);

        $elapsed = $now - $start_time;

        $status_bar .= " remaining: " . number_format($eta) . " sec.  elapsed: " . number_format($elapsed) . " sec.";

        $this::cliWriteLine("$status_bar  ", 'blue');

        $my_file = __DIR__ . '\file.txt';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  ' . $my_file);

        fwrite($handle, $status_bar);

        flush();

        // when done, send a newline
        if ($done == $total) {
            echo "\n\r";
        }

    }

    /**
     * @param string $Phrase
     */
    public function cliWriteLineEffect(string $Phrase): void
    {

        $explodPhrase = str_split($Phrase, 1);

        foreach ($explodPhrase as $letter) {

            $this->cliWriteLine($letter);

            usleep(rand(90000, 100000));
        }

    }

    /**
     *
     */
    public function drawLogo(): void
    {

        $this->cliWriteLine('
  ______   __        ______        ________   ______    ______   __        ______
 /      \ |  \      |      \      |        \ /      \  /      \ |  \      /      \
|  $$$$$$\| $$       \$$$$$$       \$$$$$$$$|  $$$$$$\|  $$$$$$\| $$     |  $$$$$$\
| $$   \$$| $$        | $$           | $$   | $$  | $$| $$  | $$| $$     | $$___\$$
| $$      | $$        | $$           | $$   | $$  | $$| $$  | $$| $$      \$$    \
| $$   __ | $$        | $$           | $$   | $$  | $$| $$  | $$| $$      _\$$$$$$\
| $$__/  \| $$_____  _| $$_          | $$   | $$__/ $$| $$__/ $$| $$_____|  \__| $$
 \$$    $$| $$     \|   $$ \         | $$    \$$    $$ \$$    $$| $$     \\$$    $$
  \$$$$$$  \$$$$$$$$ \$$$$$$          \$$     \$$$$$$   \$$$$$$  \$$$$$$$$ \$$$$$$');


        $this->cliJumpLine(1);

    }

}

