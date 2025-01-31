<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Csvimport
{
    private $delimiter;
    private $newline;
    private $enclosure;

    public function __construct()
    {
        $this->delimiter = ',';
        $this->newline = "\n";
        $this->enclosure = '"';
    }

    public function get_array($filepath)
    {
        if (!file_exists($filepath) || !is_readable($filepath)) {
            return FALSE;
        }

        $header = NULL;
        $data = array();
        if (($handle = fopen($filepath, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $this->delimiter, $this->enclosure)) !== FALSE) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
        return $data;
    }
}
