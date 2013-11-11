<?php

/**
 * Simple Test case clas
 */
class XML_Test
{
    /**
     * XML Storage
     * @var xml/binary
     */
    public $file;

    public function load_xml($file)
    {
        $this->file = simplexml_load_file($file);
    }
}

?>