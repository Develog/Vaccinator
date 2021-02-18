<?php



function getLastDataFrance($arrayDeliveries, $flux) 
{
    $dateNow = new DateTime();

    foreach($arrayDeliveries as $fluxKey => $delivery) {
        foreach($delivery as $date => $amount) {
            if($fluxKey === $flux) {
                $dateLastDelivery = DateTime::createFromFormat('Y-m-d', $date);
                if($dateNow->getTimestamp() >= $dateLastDelivery->getTimestamp()) {
                    $lastDelivery = $delivery[$dateLastDelivery->format('Y-m-d')];
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


