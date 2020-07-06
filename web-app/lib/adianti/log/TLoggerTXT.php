<?php
namespace Adianti\Log;

use Adianti\Log\TLogger;

/**
 * Register LOG in TXT files
 *
 * @version    5.0
 * @package    log
 * @author     <André Luiz Ferreira>
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TLoggerTXT extends TLogger
{
    /**
     * Writes an message in the LOG file
     * @param  $message Message to be written
     */
    public function write($message)
    {
        $level = 'Debug';
        $parts = explode(':', $message);
        if (count($parts) == 2)
        {
            $level   = $parts[0];
            $message = $parts[1];
        }
        
        $time = date("Y-m-d H:i:s");
        // define the LOG content
        $text = "$level: $time - $message\n";
        // add the message to the end of file
        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}
