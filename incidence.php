<?php

$pop80 = 4157860;

if (($handle = fopen(__DIR__ . "/cron/hosp.csv", "r")) !== FALSE) {
	$row = 0;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $dateFromCSV = DateTime::createFromFormat('Y-m-d', $data[0]);
        if($dateFromCSV->getTimestamp() >= 1608422400) {
            $arrayHop[$data[0]][$data[1]] = $data[2];
        }            
    }
    fclose($handle);
}

if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/54dd5f8d-1e2e-4ccb-8fb8-eac68245befd", "r")) !== FALSE) {
	$row = 0;
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
		if($row > 0) {
            if($data[1] == 80) {
                $arrayVaccin80[$data[2]] = round(($data[5] / $pop80) * 100, 2);
            }
		}
        $row++;
    }
    fclose($handle);
}

if (($handle = fopen(__DIR__ . "/cron/incidence.csv", "r")) !== FALSE) {
	$row = 0;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $dateFromCSV = DateTime::createFromFormat('Y-m-d', $data[0]);
        if($dateFromCSV->getTimestamp() >= 1608422400) {
            $arrayIncidenceHebdo[$data[0]][$data[1]] = $data[2];
        }            
    }
    fclose($handle);
}