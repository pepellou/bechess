<?php

namespace App\Service;


use App\Service\Lichess\User;

class MemoryBufferStream {
    protected $buffer;
    public static $callback = null;

    function stream_open($path, $mode, $options, &$opened_path) {
        // Has to be declared, it seems...
        return true;
    }

    public function stream_write($data) {
        // Extract the lines ; on y tests, data was 8192 bytes long ; never more
        $lines = explode("\n", $data);

        // The buffer contains the end of the last line from previous time
        // => Is goes at the beginning of the first line we are getting this time
        $lines[0] = $this->buffer . $lines[0];

        // And the last line os only partial
        // => save it for next time, and remove it from the list this time
        $nb_lines = count($lines);
        $this->buffer = $lines[$nb_lines-1];
        unset($lines[$nb_lines-1]);

        // Here, do your work with the lines you have in the buffer
        if (self::$callback != null) {
            foreach($lines as $line) {
                self::$callback->__invoke($line);
            }
        }

        return strlen($data);
    }
}


class LichessService
{

    public function __construct()
    {
        stream_wrapper_register("lichess", "App\Service\MemoryBufferStream")
            or die("Failed to register protocol");
    }

    public function getProfile()
    {
        $ch = curl_init();
        $headers = array(
            /*
            'Accept: application/json',
            'Content-Type: application/json',
             */
            'Authorization: Bearer RwTXx8ko3ex9r9vU'
        );
        curl_setopt($ch, CURLOPT_URL, 'https://lichess.org/api/account');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        return new User(json_decode(curl_exec($ch)));
    }

    public function getUser($user)
    {
        $ch = curl_init();
        $headers = array(
            /*
            'Accept: application/json',
            'Content-Type: application/json',
             */
            'Authorization: Bearer RwTXx8ko3ex9r9vU'
        );
        curl_setopt($ch, CURLOPT_URL, 'https://lichess.org/api/user/' . $user);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        return new User(json_decode(curl_exec($ch)));
    }

    public function streamGames($user, $callback, $timeout = 60)
    {
        MemoryBufferStream::$callback = $callback;

        $fp = fopen("lichess://MyTestVariableInMemory", "r+");

        $ch = curl_init();
        $headers = array(
            /*
            'Accept: application/x-ndjson',
             */
            'Accept: application/x-chess-pgn',
            'Authorization: Bearer RwTXx8ko3ex9r9vU'
        );
        curl_setopt($ch, CURLOPT_URL, 'https://lichess.org/api/games/user/' . $user);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_FILE, $fp);

        curl_exec($ch);

        curl_close($ch);

        fclose($fp);

        MemoryBufferStream::$callback = null;
    }

}
