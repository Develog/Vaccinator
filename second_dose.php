<?php

function getIncreaseSecond($arraySecond, $begin, $end)
{
    return $arraySecond[$end] - $arraySecond[$begin];
}

function getAverageLast7DaySecond($arraySecond, $now)
{
    $total = 0;
	$dateEnd = DateTime::createFromFormat('Y-m-d', $now); 
	$dateBegin = DateTime::createFromFormat('Y-m-d', $now); 
	$dateBegin->sub(new DateInterval('P1D'));
	
	for($i = 0; $i < 7; $i++) {
		$total += getIncreaseSecond($arraySecond, $dateBegin->format('Y-m-d'), $dateEnd->format('Y-m-d'));
		$dateEnd->sub(new DateInterval('P1D'));
		$dateBegin->sub(new DateInterval('P1D'));
	}
	return round($total / 7);
}