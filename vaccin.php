<?php 

$vaccins = json_decode(file_get_contents("https://www.data.gouv.fr/fr/datasets/r/16cb2df5-e9c7-46ec-9dbf-c902f834dab1"), true);

$arrayVac = [];
$nbrRegion = 0;
$valueDay = 0;

$arrayReg = [
	"GDP" => "Guadeloupe", 
	"MTQ" => "Martinique", 
	"GUY" => "Guyane", 
	"LRU" => "La Réunion", 
	"MAY" => "Mayotte", 
	"IDF" => "Ile de France", 
	"CVL" => "Centre Val de Loire", 
	"BFC" => "Bourgogne-Franche-Comté", 
	"NMD" => "Normandie", 
	"HDF" => "Haut de France", 
	"GES" => "Grand Est", 
	"PLO" => "Pays de la Loire", 
	"BRE" => "Bretagne", 
	"NAQ" => "Nouvelle-Aquitaine", 
	"OCC" => "Occitanie", 
	"ARA" => "Auvergne-Rhône-Alpes", 
	"PAC" => "Provence-Alpes-Côte d'Azur", 
	"COR" => "Corse"
];

$total = 0;
$totalVac = [];
$dateBegin = "2021-01-11";

foreach($vaccins as $key => $vaccin) {
	if($vaccin['date'] == date('Y-m-d')) {
		$total += $vaccin['totalVaccines'];
	}
	$nbrRegion++;
	switch($vaccin['nom']) {
		case 'Guadeloupe':
			$arrayVac['GDP'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Martinique':
			$arrayVac['MTQ'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Guyane':
			$arrayVac['GUY'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'La Réunion':
			$arrayVac['LRU'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Mayotte':
			$arrayVac['MAY'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Île-de-France':
			$arrayVac['IDF'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Centre-Val de Loire':
			$arrayVac['CVL'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Bourgogne-Franche-Comté':
			$arrayVac['BFC'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Normandie':
			$arrayVac['NMD'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Hauts-de-France':
			$arrayVac['HDF'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Grand Est':
			$arrayVac['GES'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Pays de la Loire':
			$arrayVac['PLO'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Bretagne':
			$arrayVac['BRE'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Nouvelle-Aquitaine':
			$arrayVac['NAQ'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Occitanie':
			$arrayVac['OCC'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Auvergne-Rhône-Alpes':
			$arrayVac['ARA'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case "Provence-Alpes-Côte d'Azur":
			$arrayVac['PAC'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;
		case 'Corse':
			$arrayVac['COR'][$vaccin['date']] = $vaccin['totalVaccines'];
			break;	
	}
	
	$totalVac[$vaccin['date']] = 0;
}

foreach($vaccins as $vaccin) {
	$totalVac[$vaccin['date']] += $vaccin['totalVaccines'];
}

//echo "Total : " . $total . '<br>';
var_dump($totalVac);

foreach($arrayReg as $key => $region) {
	echo "Augmentation en " . $region . " de " . getIncrease($arrayVac, $key, "2021-01-12", date("Y-m-d")) . " vaccinations sur la dernière journée.<br>";
}

function getIncrease($arrayVac, $id, $begin, $end) 
{
	return $arrayVac[$id][$end] - $arrayVac[$id][$begin];
}

var_dump($arrayVac);?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</head>
<body>
	<div class="chart-container" style="position: relative; height:40vh; width:80vw">
		<canvas id="myChart"></canvas>
	</div>
	
	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [
					<?php 
					foreach($totalVac as $date => $vac) {
						echo "'" . $date . "',"; 
						
					}?>
					],
				datasets: [
				<?php 
					foreach($arrayVac as $region => $vaccin) {
						echo "{
							label: '$region',
							borderColor: 'rgba(" . rand(0, 255) . "," . rand(0,255) . "," . rand(0,255) .",1)',
							fill: false,
							data: [";
							foreach($vaccin as $date => $vac) {
								echo $vac . ","; 
							}
						echo '],},';
					}
				?>
				]
				
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>