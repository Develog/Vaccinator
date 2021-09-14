<?php

try {
	$fileOpenable = false;
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/08c18e08-6780-452d-9b8c-ae244ad529b3", "r")) !== FALSE) {
		$row = 0;
		$dateBegin = DateTime::createFromFormat('Y-m-d', "2020-12-21");
		//$arrayData[0] = "age"; $arrayData[2] = "hosp"; $arrayData[3] = "reg";
		//fputcsv($file, $arrayData);
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				if(DateTime::createFromFormat('Y-m-d', $data[2])->getTimestamp() >= $dateBegin->getTimestamp()) {
					if(!isset($arrayData[$data[2]][$data[1]])) {
						$arrayData[$data[2]][$data[1]] = $data[3];
					} else {
						$arrayData[$data[2]][$data[1]] += $data[3];
					}
					$fileOpenable = true;
				}
			}
			$row++;
		}
	}

	if($fileOpenable) {
		$file = fopen(__DIR__ . "/hosp.csv", "w+");
	}
	foreach($arrayData as $date => $data) {
		foreach($data as $age => $value) {
			$array[0] = $date;
			$array[1] = $age;
			$array[2] = $value;
			fputcsv($file, $array);
			unset($array);
		}    
	}
} catch(Exception $e) {
	
}


try {
	$fileOpenable = false;
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/57d44bd6-c9fd-424f-9a72-7834454f9e3c", "r")) !== FALSE) {
		$row = 0;
		$dateBegin = DateTime::createFromFormat('Y-m-d', "2020-12-21");
		//$arrayData[0] = "age"; $arrayData[2] = "hosp"; $arrayData[3] = "reg";
		//fputcsv($file, $arrayData);
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				if(DateTime::createFromFormat('Y-m-d', $data[1])->getTimestamp() >= $dateBegin->getTimestamp()) {
					$arrayIncidence[$data[1]][intval($data[7])] = ($data[4] * 100000) / $data[8];
				}
				$fileOpenable = true;
			}
			$row++;
		}
	}

	krsort($arrayIncidence);

	foreach($arrayIncidence as $date => $incidence) {
		//var_dump($date);
		$dateIncidence = DateTime::createFromFormat('Y-m-d', $date);
		$incidence = 0;
		$incidence80 = 0;
		$incidence90 = 0;
		if($dateIncidence->format('Y-m-d') >= "2020-12-27") {
			for($i = 0; $i < 7; $i++) {
				$incidence += $arrayIncidence[$dateIncidence->format('Y-m-d')][0];
				$incidence80 += $arrayIncidence[$dateIncidence->format('Y-m-d')][89];
				$incidence90 += $arrayIncidence[$dateIncidence->format('Y-m-d')][90];
				$dateIncidence->sub(new \DateInterval('P1D'));
			}
			$arrayIncidenceHebdo[$date][0] = round($incidence, 2);
			$arrayIncidenceHebdo[$date][80] = round($incidence80, 2);
			$arrayIncidenceHebdo[$date][90] = round($incidence90, 2);
		}    
	}
	ksort($arrayIncidenceHebdo);

	if($fileOpenable) {
		$file = fopen(__DIR__ . "/incidence.csv", "w+");
	}

	foreach($arrayIncidenceHebdo as $date => $data) {
		foreach($data as $age => $value) {
			$array[0] = $date;
			$array[1] = $age;
			$array[2] = $value;
			fputcsv($file, $array);
			unset($array);
		}    
	}
} catch(Exception $e) {
	
}