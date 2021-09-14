<?php

include "../departements.php";

$total = 0;
$arrayCenter = [];
if (($handle = fopen(__DIR__ . "/place_vac.csv", "r")) !== FALSE) {
	$row = 0;
	while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
		if($row > 0) {
			foreach($departements as $key => $deps) {
				if($key > "51" && $key <= "61") {
					if(isset($data[6]) && substr($data[3], 0, -3) == $key) {
						$url = $data[6];
						//var_dump($url);
						parse_str(parse_url($url, PHP_URL_QUERY), $query);
						if(isset($query["pid"])) {
							$pId = str_replace("practice-", "", $query["pid"]);
						} else {
							$pId = null;
						}

						preg_match("/https:\/\/partners.doctolib.fr\/[\w*-]*\/[\w*-]*\//", $url, $match);
						if(isset($match[0])) {
							$result = preg_replace("/https:\/\/partners.doctolib.fr\/[\w*-]*\/[\w*-]*\//", "", $url);
							$result = preg_replace("/\?.*/", "", $result);
							
	
							$json = json_decode(file_get_contents("https://partners.doctolib.fr/booking/" . $result . ".json"), true);
	
							if(isset($json["data"]["visit_motives"][0]["id"])) {
								$arrayCenter[$data[0]] = false;
								$motiveId = $json["data"]["visit_motives"][0]["id"];
	
								foreach($json["data"]["agendas"] as $agenda) {
									if(!$agenda["booking_disabled"] && !$arrayCenter[$data[0]]) {
										if($agenda["practice_id"] == $pId) {
											foreach($agenda["visit_motive_ids"] as $visitMotiveId) {
												if($visitMotiveId == $motiveId) {
													$agendaId = $agenda["id"];
													$practiceId = $agenda["practice_id"];
	
													//Y-m-d
													$dateNow = new DateTime();
													$dateNow = $dateNow->format("Y-m-d");
	
													$urlBooking = "https://partners.doctolib.fr/availabilities.json?start_date=". $dateNow ."&visit_motive_ids=" . $motiveId . "&agenda_ids=" . $agendaId . "&practice_ids=" . $practiceId . "&destroy_temporary=true&limit=31";
													//var_dump($urlBooking);
													$totalCentre = json_decode(file_get_contents($urlBooking), true)['total'];
													if($totalCentre != 0) {
														$arrayCenter[$data[0]] = true;
														echo $totalCentre . " créneaux disponibles à (" . substr($data[3], 0, -3) . ") " . $json["data"]["profile"]["name_with_title"] . " agenda " . $agendaId . " qid : " . $data[0] . "<br>";
													}
													$total += $totalCentre;
												}
											}
										} else if($pId === null) {
											foreach($agenda["visit_motive_ids"] as $visitMotiveId) {
												if($visitMotiveId == $motiveId) {
													$agendaId = $agenda["id"];
													$practiceId = $agenda["practice_id"];
	
													//Y-m-d
													$dateNow = new DateTime();
													$dateNow = $dateNow->format("Y-m-d");
	
													$urlBooking = "https://partners.doctolib.fr/availabilities.json?start_date=". $dateNow ."&visit_motive_ids=" . $motiveId . "&agenda_ids=" . $agendaId . "&practice_ids=" . $practiceId . "&destroy_temporary=true&limit=31";
													//var_dump($urlBooking);
													$totalCentre = json_decode(file_get_contents($urlBooking), true)['total'];
													if($totalCentre != 0) {
														$arrayCenter[$data[0]] = true;
														echo $totalCentre . " créneaux disponibles à (" . substr($data[3], 0, -3) . ") " . $json["data"]["profile"]["name_with_title"] . " agenda " . $agendaId . " qid : " . $data[0] . "<br>";
													}
													$total += $totalCentre;
												}
											}
										}
									}
								}
							}
						} else {
							if(strlen($url) > 0) {
								$arrayCenter[$data[0]] = "idk";
							} else {
								$arrayCenter[$data[0]] = "nurl";
							}							
						}
					}
				}
			}
		}
		$row++;
	}
}

$handleFile = fopen(__DIR__ . "/center_with_rdv_51_75.csv", "w+");
fputcsv($handleFile, array("qid", "availibility"), ',', '"');
foreach($arrayCenter as $key => $result) {
	if($result === "idk" || $result === "nurl") {

	} else {
		$result = $result ? "true" : "false";
	}
    fputcsv($handleFile, array($key, $result), ',', '"');
}
fclose($handleFile);