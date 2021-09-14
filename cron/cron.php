<?php

///Vaccin Résidents Total
//https://www.data.gouv.fr/fr/datasets/r/5359f2c3-f353-407a-a264-d0edcaaa8a66
try {
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/5359f2c3-f353-407a-a264-d0edcaaa8a66", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_res_total.csv", "w+");
		fputcsv($handleFile, array("date", "percent_first", "percent_second"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				$value = array($data[1], $data[2], $data[3]);
			}
			$row++;
		}
		
		fputcsv($handleFile, $value, ',', '"');
		
		fclose($handleFile);
		fclose($handle);
	}
} catch(Exception $e) {}


//Vaccin Pro Santé Total
//https://www.data.gouv.fr/fr/datasets/r/70c438ee-413d-4f99-8d4d-5ab1cd4475c5
try {
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/70c438ee-413d-4f99-8d4d-5ab1cd4475c5", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_pro_sante_total.csv", "w+");
		fputcsv($handleFile, array("date", "percent_first", "percent_second"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				$value = array($data[1], $data[2], $data[3]);
			}
			$row++;
		}
		
		fputcsv($handleFile, $value, ',', '"');
		
		fclose($handleFile);
		fclose($handle);
	}
} catch(Exception $e) {}


///Vaccin Age Total
//https://www.data.gouv.fr/fr/datasets/r/dc103057-d933-4e4b-bdbf-36d312af9ca9
try {
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/dc103057-d933-4e4b-bdbf-36d312af9ca9", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_age_total.csv", "w+");
		fputcsv($handleFile, array("date", "age", "first_dose","second_dose","percent_first","percent_second"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				fputcsv($handleFile, array($data[2], $data[1], $data[3], $data[4], $data[6], $data[7]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch(Exception $e) {}


///Vaccin Region Sexe Total
//https://www.data.gouv.fr/fr/datasets/r/d302c60b-cb7d-48cd-91f0-a3baee4bcf05
try {
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/d302c60b-cb7d-48cd-91f0-a3baee4bcf05", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_reg_sex_total.csv", "w+");
		fputcsv($handleFile, array("date", "reg", "sex", "first_dose","second_dose","percent_first","percent_second"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				fputcsv($handleFile, array($data[2], $data[0], $data[1], $data[3], $data[4], $data[5], $data[6]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch (Exception $e) {}


//Vacin Region Age Total 
//https://www.data.gouv.fr/fr/datasets/r/2dadbaa7-02ae-43df-92bb-53a82e790cb2
try {
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/2dadbaa7-02ae-43df-92bb-53a82e790cb2", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_reg_age_total.csv", "w+");
		fputcsv($handleFile, array("date", "reg", "age", "first_dose","second_dose","percent_first","percent_second"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				fputcsv($handleFile, array($data[2], $data[0], $data[1], $data[3], $data[4], $data[6], $data[7]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch (Exception $e) {}


///Vaccin Total
//https://www.data.gouv.fr/fr/datasets/r/131c6b39-51b5-40a7-beaa-0eafc4b88466
try {
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/131c6b39-51b5-40a7-beaa-0eafc4b88466", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_total.csv", "w+");
		fputcsv($handleFile, array("date", "first_dose", "second_dose"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				fputcsv($handleFile, array($data[1], $data[2], $data[3]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch(Exception $e) {}



///Vaccin Type Total
//https://www.data.gouv.fr/fr/datasets/r/b8d4eb4c-d0ae-4af6-bb23-0e39f70262bd
try {
	if(($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/b8d4eb4c-d0ae-4af6-bb23-0e39f70262bd", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_type_total.csv", "w+");
		fputcsv($handleFile, array("type", "date", "first_dose", "second_dose"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				fputcsv($handleFile, array($data[1], $data[2], $data[3], $data[4]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch(Exception $e) {}



///Vaccin jour region 
//https://www.data.gouv.fr/fr/datasets/r/735b0df8-51b4-4dd2-8a2d-8e46d77d60d8
try {
	if(($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/735b0df8-51b4-4dd2-8a2d-8e46d77d60d8", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_reg_day.csv", "w+");
		fputcsv($handleFile, array("reg", "date", "first_dose", "second_dose", "first_percent", "second_percent"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				fputcsv($handleFile, array($data[0], $data[1], $data[2], $data[3], $data[6], $data[7]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch(Exception $e) {}



///Livraisons vaccins toutes dates
//https://www.data.gouv.fr/fr/datasets/r/9c60af86-b974-4dba-bf34-f52686c7ada9
try {
	if(($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/9c60af86-b974-4dba-bf34-f52686c7ada9", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/deliveries_all_time.csv", "w+");
		fputcsv($handleFile, array("date_end_week", "type", "flask", "dose"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row > 0) {
				if($data[0] !== "NA") {
					fputcsv($handleFile, array($data[0], $data[1], $data[2], $data[3]), ',', '"');
				}
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch(Exception $e) {}


///Livraisons vaccins réalisées
//https://www.data.gouv.fr/fr/datasets/r/c04da7da-be58-450e-bf3e-5993ce7796d9
try {
	if(($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/c04da7da-be58-450e-bf3e-5993ce7796d9", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/deliveries_perform.csv", "w+");
		fputcsv($handleFile, array("date_end_week", "type", "flask", "dose"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row > 0) {
				fputcsv($handleFile, array($data[0], $data[1], $data[2], $data[3]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch(Exception $e) {}



///Livraisons région réalisées
//https://www.data.gouv.fr/fr/datasets/r/1e8890a0-89c0-474f-88a1-d79414911059
try {
	if(($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/1e8890a0-89c0-474f-88a1-d79414911059", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/deliveries_reg_perform.csv", "w+");
		fputcsv($handleFile, array("reg", "date_end_week", "type", "flask", "dose"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row > 0) {
				fputcsv($handleFile, array($data[0], $data[2], $data[3], $data[4], $data[5]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch(Exception $e) {}



//Vaccin Departement Total 
//https://www.data.gouv.fr/fr/datasets/r/7969c06d-848e-40cf-9c3c-21b5bd5a874b
try {
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/7969c06d-848e-40cf-9c3c-21b5bd5a874b", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_dep_total.csv", "w+");
		fputcsv($handleFile, array("dep", "date", "first_dose","second_dose","percent_first","percent_second"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				fputcsv($handleFile, array($data[0], $data[1], $data[2], $data[3], $data[5], $data[6]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch (Exception $e) {}



///Vaccin jour
//https://www.data.gouv.fr/fr/datasets/r/efe23314-67c4-45d3-89a2-3faef82fae90
try {
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/efe23314-67c4-45d3-89a2-3faef82fae90", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/vaccin_day.csv", "w+");
		fputcsv($handleFile, array("date", "first_dose","second_dose","sum_first","sum_second", "percent_first", "percent_second"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				//fputcsv($handleFile, array($data[1], $data[2], $data[3], $data[4], $data[6], $data[5], $data[7]), ',', '"');
				fputcsv($handleFile, array($data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]), ',', '"');
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch (Exception $e) {}


///Lieu centre vaccination
//https://www.data.gouv.fr/fr/datasets/r/5cb21a85-b0b0-4a65-a249-806a040ec372
try {
	if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/5cb21a85-b0b0-4a65-a249-806a040ec372", "r")) !== FALSE) {
		$row = 0;
		$handleFile = fopen(__DIR__ . "/place_vac.csv", "w+");
		fputcsv($handleFile, array("qid", "name","address","zip","lat", "long", "url"), ',', '"');
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row > 0) {
				if(isset($data[6]) && isset($data[8]) && isset($data[10]) && isset($data[11]) && isset($data[34])) {
					$data[5] = isset($data[5]) ? $data[5] : "";
					fputcsv($handleFile, array($data[0], $data[1], $data[5] . " " . $data[6], $data[8], $data[10], $data[11], $data[34]), ',', '"');
				}				
			}
			$row++;
		}
		fclose($handleFile);
		fclose($handle);
	}
} catch (Exception $e) {}




//Hospitalisation
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

//Incidence
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