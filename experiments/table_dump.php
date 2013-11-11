<?php

include('tests/xml_test.php');

$xml = new XML_Test();

$xml->load_xml('../data/acc-dog-registrations-2012.xml');

var_dump($xml->file);

?>

