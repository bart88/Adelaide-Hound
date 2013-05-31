<?php
    $data = simplexml_load_file('../data/acc-dog-registrations-2012.xml');
    //$record = $data->table1[0]->Detail_Collection[0]->Detail['Breed'];
    $records = $data->table1[0]->Detail_Collection[0];
    //echo $data->table1[0]->Detail_Collection[0]->Detail['Breed'];
    $totaldogs = count($records);
    echo "Total records: $totaldogs";

    // Count dog breeds
    $breeds = array();
    $gender = array();
    $class = array();

    //echo "<ul>";
    foreach($records as $record)
    {
        //echo "<li>".var_dump($record['Breed'])."</li>";
        //echo "<li>".$record["Breed"]."</li>";
       // var_dump($record->Detail['Breed']);
        //print_r($record->Detail);

       /*
 echo $record["Breed"];
        echo $record["Gender"];
*/

        $breeds[] = (string)$record["Breed"];
        $gender[] = (string)$record["Gender"];
        $class[] = (string)$record["Class"];
        $names[] = (string)$record["AnimalName"];

    }
    //print_r($breeds);
    echo "Breed counts: <br />";
    print_r(array_count_values($breeds));
    echo "<br>-------<br>";

    echo "Gender counts: <br />";
    $gender_count = array_count_values($gender);
    print_r($gender_count);
/*
    $totalmale = count($gender['MALE']) + count($gender['DESEXED MALE']);
    echo "<br>Total Male: ".$totalmale." (".$totalmale/$totaldogs*100.") (Desexed: ".;
*/
    $desexed = $gender_count['DESEXED MALE'] + $gender_count['DESEXED FEMALE'];
    echo "<b>Desexed: ".round($desexed / $totaldogs * 100, 0) . "%</b>";

    echo "<br>-------<br>";


    echo "Class counts: <br />";
    $class_count = array_count_values($class);
    print_r($class_count);

    $microchipped = $class_count['FULL DESEX MICRO OBED'] + $class_count['FULL DESEX MICRO'] + $class_count['PENSION DESEX MICRO OBED'] + $class_count['PENSION DESEX MICRO'] + $class_count['FULL MICRO'] + $class_count['FULL MICRO OBED'] + $class_count['PENSION MICRO'];
    echo "<b>Microchipped: ".round($microchipped / $totaldogs * 100, 0) . "%</b>";

    echo "<br>-------<br>";

    echo "Name counts: <br />";
    print_r(array_count_values($names));
    echo "<br>-------<br>";



    //echo "</ul>";
    echo "<br>----<br>";
   // print_r($records);
    //print_r($data);
?>