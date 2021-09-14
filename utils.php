<?php

const POPULATION = 67407241;
$population = 67407241; // 67 407 241

$arrayReg = [
	"ARA" => ["name" => "Auvergne-Rhône-Alpes", "pop" => 8092598, "x" => 335, "y" => 365, "deps" => ["42", "03", "63", "15", "01", "73", "07", "26", "38", "43", "74", "69"]], //84
	"BFC" => ["name" => "Bourgogne-Franche-Comté", "pop" => 2786205, "x" => 240, "y" => 375, "deps" => ["21", "25", "58", "90", "71", "39", "89", "70"]], //27
	"BRE" => ["name" => "Bretagne", "pop" => 3371297, "x" => 190, "y" => 90, "deps" => ["35", "29", "22", "56"]],  //53
	"CVL" => ["name" => "Centre Val de Loire", "pop" => 2562431, "x" => 225, "y" => 260, "deps" => ["28", "45", "36", "18", "37", "41"]], //24
	"COR" => ["name" => "Corse", "pop" => 349273, "x" => 515, "y" => 500, "deps" => ["2A", "2B"]], 
	"GES" => ["name" => "Grand Est", "pop" => 5524817, "x" => 155, "y" => 400, "deps" => ["54", "08", "52", "57", "55", "68", "10", "88", "67", "51"]], //44
	"HDF" => ["name" => "Haut de France", "pop" => 5977462, "x" => 95, "y" => 300, "deps" => ["02", "80", "59", "62", "60"]], //32 
	"IDF" => ["name" => "Ile de France", "pop" => 12326429, "x" => 155, "y" => 290, "deps" => ["95", "93", "77", "91", "75", "92", "94", "78"]], //11
	"NMD" => ["name" => "Normandie", "pop" => 3306092, "x" => 140, "y" => 195, "deps" => ["14", "76", "27", "61", "50"]], //28
	"NAQ" => ["name" => "Nouvelle-Aquitaine", "pop" => 6039767, "x" => 340, "y" => 210, "deps" => ["17", "24", "19", "79", "86", "47", "40", "64", "33", "16", "23", "87"]], // 75
	"OCC" => ["name" => "Occitanie", "pop" => 5985751, "x" => 425, "y" => 275, "deps" => ["65", "81", "09", "11", "12", "48", "46", "32", "82", "31", "34", "66", "30"]],	//76
	"PLO" => ["name" => "Pays de la Loire", "pop" => 3838060, "x" => 225, "y" => 160, "deps" => ["85", "49", "72", "53", "44"]], //52
	"PAC" => ["name" => "Provence-Alpes-Côte d'Azur", "pop" => 5089661, "x" => 420, "y" => 420, "deps" => ["06", "04", "83", "05", "13", "84"]], //93
	"GDP" => ["name" => "Guadeloupe", "pop" => 375857, "x" => 555, "y" => 145, "deps" => ["971"]],
	"GUY" => ["name" => "Guyane", "pop" => 294071, "x" => 555, "y" => 380, "deps" => ["973"]],
	"LRU" => ["name" => "La Réunion", "pop" => 858450, "x" => 555, "y" => 70, "deps" => ["974"]],
	"MTQ" => ["name" => "Martinique", "pop" => 355094, "x" => 555, "y" => 225, "deps" => ["972"]],
	"MAY" => ["name" => "Mayotte", "pop" => 288926, "x" => 555, "y" => 310, "deps" => ["976"]]
];


//Classe pour le pourcentage de la pop vaccinée : 
//0 => 0-24 / 1 => 25-49 / 2 => 50 - 64 / 3 => 65-74 / 4 => 75 +
/*$populationAge[0] = 19954955; // 19 954 955
$populationAge[1] = 20551273; // 20 551 273
$populationAge[2] = 12939673; // 12 939 673
$populationAge[3] = 7556086;  // 7 556 086
$populationAge[4] = 6420254;  // 6 420 254*/

//0 => 0-17 / 1 => 18-29 / 2 => 30-49 / 3 => 50 - 65 / 4 => 65-74 / 5 => 75 +
$populationAge[0] = 14476227; // 14 476 227
$populationAge[1] = 9173828; // 9 173 828
$populationAge[2] = 16852420; // 16 852 420
$populationAge[3] = 12939855; // 12 939 855
$populationAge[4] = 7555343;  // 7 555 343
$populationAge[5] = 6409568;  // 6 409 568


function convertCodeRegToStrReg($code)
{
	switch($code){
		case "1": 
			return "GDP";
			break;
		case "2": 
			return "MTQ";
			break;
		case "3": 
			return "GUY";
			break;
		case "4": 
			return "LRU";
			break;
		case "6":
			return "MAY";
			break;
		case "11": 
			return "IDF";
			break;
		case "24": 
			return "CVL";
			break;
		case "27": 
			return "BFC";
			break;
		case "28": 
			return "NMD";
			break;
		case "32": 
			return "HDF";
			break;
		case "44": 
			return "GES";
			break;
		case "52": 
			return "PLO";
			break;
		case "53": 
			return "BRE";
			break;
		case "75": 
			return "NAQ";
			break;
		case "76": 
			return "OCC";
			break;
		case "84": 
			return "ARA";
			break;
		case "93": 
			return "PAC";
			break;
		case "94": 
			return "COR";
			break;
	}
}

function getStringDate($now)
{
	$dateBegin = DateTime::createFromFormat('Y-m-d', '2020-12-27');
	$dateNow = DateTime::createFromFormat('Y-m-d', $now);
	$diff = $dateNow->diff($dateBegin)->days;
	$strDate = "[";
	for($i = 0; $i <= $diff; $i++) {
		$strDate .= "'" . $dateBegin->format('d-m-Y') . "',";
		$dateBegin->add(new DateInterval('P1D'));
	}
	$strDate = substr($strDate, 0, -1);
	$strDate .= "]";
	return $strDate;	
}

function getIncrease($arrayVac, $id, $begin, $end) 
{
	if(isset($arrayVac[$id][$end]) && isset($arrayVac[$id][$begin])) {
		return $arrayVac[$id][$end] - $arrayVac[$id][$begin];
	} else {
		return 0;
	}
}

function getIncreaseReg($arrayVac, $id, $begin, $end, $idDose) 
{
	if($idDose == "first") {
		if(isset($arrayVac[$id][$end]['first']) && isset($arrayVac[$id][$begin]['first'])) {
			return $arrayVac[$id][$end]['first'] - $arrayVac[$id][$begin]['first'];
		} else {
			return 0;
		}
	} else {
		if(isset($arrayVac[$id][$end]['second']) && isset($arrayVac[$id][$begin]['second'])) {
			return $arrayVac[$id][$end]['second'] - $arrayVac[$id][$begin]['second'];
		} else {
			return 0;
		}
	}
	
}

function getIncreaseDay($arrayVac, $begin, $end)
{
	$value = 0;
	foreach($arrayVac as $key => $vac) {
		$value += getIncrease($arrayVac, $key, $begin, $end);
	}
	return $value;
}

function getAverage7Days($arrayVac, $now) 
{
	$total = 0;
	$dateEnd = DateTime::createFromFormat('Y-m-d', $now); 
	$dateBegin = DateTime::createFromFormat('Y-m-d', $now); 
	$dateBegin->sub(new DateInterval('P1D'));
	
	for($i = 0; $i < 7; $i++) {
		$total += $arrayVac[$dateEnd->format("Y-m-d")];
		$dateEnd->sub(new DateInterval('P1D'));
		$dateBegin->sub(new DateInterval('P1D'));
	}
	return round($total / 7);
}


function getAverage7DaysReg($array, $now, $reg, $idDose)
{
	$total = 0;
	$dateEnd = DateTime::createFromFormat('Y-m-d', $now); 
	$dateBegin = DateTime::createFromFormat('Y-m-d', $now); 
	$dateBegin->sub(new DateInterval('P1D'));
	
	for($i = 0; $i < 7; $i++) {
		$total += getIncreaseReg($array, $reg, $dateBegin->format("Y-m-d"), $dateEnd->format("Y-m-d"), $idDose);
		$dateEnd->sub(new DateInterval('P1D'));
		$dateBegin->sub(new DateInterval('P1D'));
	}
	return round($total / 7);
}

function getNumberDayToFinish($region, $average, $vaccins, $now, $percent = 100)
{
	if($vaccins[$now] !== 0) {
		$quantityPop = $region['pop'] * ($percent / 100);
		$finish = DateTime::createFromFormat('Y-m-d', $now);
		$value = abs(round(($quantityPop - $vaccins[$now]) / $average));
		if($value >= 5100) {
			return "après 2035";
		} else {
			$finish->add(new DateInterval('P' . $value . 'D'));
			setlocale (LC_TIME, 'fr_FR.utf8','fra');
			return (strftime("%d %B %Y", $finish->getTimestamp()));
		}
	} else {
		return "jamais";
	}	
}


function getNumberDayToFinishFrance($average, $totalVac, $now, $percent = 100)
{
	$quantityPop = POPULATION * ($percent / 100);
	$finish = DateTime::createFromFormat('Y-m-d', $now);
	$value = round(($quantityPop - $totalVac) / $average);
	$finish->add(new DateInterval('P' . $value . 'D'));
	setlocale (LC_TIME, 'fr_FR.utf8','fra');
	return (strftime("%d %B %Y", $finish->getTimestamp()));
}


function getColorRegion($arrayRegPerc, $reg)
{	
	$min = 100;
	$max = 0;
	foreach($arrayRegPerc as $key => $region) {
		if($region > $max) {
			$max = $region;
		}
		if($region < $min) {
			$min = $region;
		}
	}

	$diff = $max - $min;
	$step = $diff / 20;
	$numberReg = $arrayRegPerc[$reg] - $min;
	$res = $numberReg / $step;
	$green = 175 - (5 * $res);


	return 'rgb(0, '. $green . ', 0)';
}

function getColorDose($arrayPerc, $reg)
{
	$res = $arrayPerc[$reg] / 5;
	$green = 200 - (10 * $res);
	$red = 0 + (10 * $res);
	if($red <= 255) {
		return 'rgb('. $red . ', ' . $green . ', 0)';
	} else {
		return 'rgb(255, ' . $green . ', 0)';
	}	
}


function getPercentDoseUsed($arrayVac, $deliveriesReg, $reg, $dayLastData, $dayLastDataDelivery)
{
	$dateLastData = DateTime::createFromFormat("Y-m-d", $dayLastData);
	while(!isset($arrayVac[$reg][$dateLastData->format('Y-m-d')])) {
		$dateLastData->sub(new DateInterval('P1D'));
	}
	$dateLastData = $dateLastData->format("Y-m-d");
	return round((($arrayVac[$reg][$dateLastData]['first'] + $arrayVac[$reg][$dateLastData]['second']) / getLastDataReg($deliveriesReg, $reg)) * 100, 2);
}

function formatNumber($number)
{
	return strrev(wordwrap(strrev($number), 3, ' ', true));
}