<?php



function getLastDataFrance($arrayDeliveries, $flux) 
{
    $dateNow = new DateTime();
    foreach($arrayDeliveries as $date => $delivery) {
        foreach($delivery as $fluxKey => $amount) {
            if($fluxKey === $flux) {
                if(strpos($date, "-")) {
                    $dateLastDelivery = DateTime::createFromFormat('Y-m-d', $date);
                } else {
                    $dateLastDelivery = DateTime::createFromFormat('d/m/Y', $date);
                }
                //$dateLastDelivery = DateTime::createFromFormat('Y-m-d', $date);
                if($dateNow->getTimestamp() >= $dateLastDelivery->getTimestamp()) {
                    $lastDelivery = $delivery[$flux];
                }    
            }
        }
    }

    return $lastDelivery;
}


function getLastDataReg($arrayDeliveries, $reg)
{
    $dateNow = new DateTime();
    $lastDiffDay = 100;

    foreach($arrayDeliveries[$reg] as $date => $total) {
        if($date != 'total') {
            $dateLastDelivery = DateTime::createFromFormat('Y-m-d', $date);
            //$dateLastDelivery = DateTime::createFromFormat('d/m/Y', $date);
            if($dateNow->getTimestamp() >= $dateLastDelivery->getTimestamp()) {
                $diffDay = $dateLastDelivery->diff($dateNow)->days;
                if($diffDay < $lastDiffDay) {
                    $lastDiffDay = $diffDay;
                    $lastDelivery = 0;
                    foreach($total as $flux => $result) {
                        $lastDelivery += $result['dose'];
                    }
                }                
            } 
        }
    }
    return $lastDelivery;    
}


