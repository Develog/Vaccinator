<?php 

$vaccins = json_decode(file_get_contents("https://www.data.gouv.fr/fr/datasets/r/16cb2df5-e9c7-46ec-9dbf-c902f834dab1"), true);

$arrayVac = [];
$nbrRegion = 0;
$valueDay = 0;

$population = 67848156;

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
$newVacByDay = [];
$dayLastData = end($vaccins)['date'];
$dateLast = DateTime::createFromFormat('Y-m-d', $dayLastData);
$dayLastDataOneLess = $dateLast->sub(new DateInterval('P1D'))->format('Y-m-d');


$totalVac["2021-01-07"] = 45695;
$totalVac["2021-01-08"] = 80000;
$totalVac["2021-01-09"] = 93000;
$totalVac["2021-01-10"] = 0;

foreach($vaccins as $key => $vaccin) {
	if(!isset($newVacByDay[$vaccin['date']])) {
		$newVacByDay[$vaccin['date']] = 0;
	}
	$newVacByDay[$vaccin['date']] += $vaccin['totalVaccines']; 
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

function getIncrease($arrayVac, $id, $begin, $end) 
{
	return $arrayVac[$id][$end] - $arrayVac[$id][$begin];
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
	
	for($i = 0; $i < 2; $i++) {
		$total += getIncreaseDay($arrayVac, $dateBegin->format("Y-m-d"), $dateEnd->format("Y-m-d"));
		$dateEnd->sub(new DateInterval('P1D'));
		$dateBegin->sub(new DateInterval('P1D'));
	}
	return $total / 2;
}

//var_dump($newVacByDay);
//var_dump($arrayVac);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<style>
		body {
			margin: 0;
			font-family: 'Roboto';
		}
	
		.header {
			background-color: #e5e5e5;
			width: 100vw;
			height: 50px;
			text-align: center;
		}
		
		h1 {
			margin: 0;
			font-size: 36px;
		}
		
		.container {
			display: flex;
			justify-content: space-between;
			margin: 25px;
		}
		
		.card {
			box-shadow: 0 0 10px 5px grey;
			flex: 0 1 45%;
			padding: 10px;
			border-radius: 15px;
			text-align: center;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="header">
		<h1>Vaccinator</h1>
	</div>
	
	<div>
		<?php
			//var_dump($totalVac);

			foreach($arrayReg as $key => $region) {
				echo "Augmentation en " . $region . " de " . getIncrease($arrayVac, $key, $dayLastDataOneLess, $dayLastData) . " vaccinations sur la dernière journée.<br>";
			}

		?>
	</div>
	
	<div class="container">
		<div class="card">
			<p>Nombre total de personnes vaccinées : <b><?php echo $totalVac[$dayLastData];?></b></p>
		</div>
		
		<div class="card">
			<p>Pourcentage de la population vacciné : <b><?php echo round(($totalVac[$dayLastData] / $population) * 100, 3); ?></b> %</p>
		</div>
	</div>
	
	<div class="container">
		<div class="card">
			<p>Nouvelles personnes vaccinées le <?php setlocale (LC_TIME, 'fr_FR.utf8','fra');  echo strftime("%d %B %Y", DateTime::createFromFormat('Y-m-d', $dayLastData)->getTimestamp());?> : <b><?php echo getIncreaseDay($arrayVac, $dayLastDataOneLess, $dayLastData); ?></b></p>
		</div>
		
		<div class="card">
			<p>Moyenne sur 2 jours : <b><?php echo getAverage7Days($arrayVac, $dayLastData); ?></b></p>
		</div>
	</div>
	
	<div class="chart-container" style="position: relative; height:40vh; width:100vw">
		<canvas id="myChart"></canvas>
	</div>
	
	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [
					<?php 
					$dateNow = DateTime::createFromFormat('Y-m-d', $dayLastData);
					$dateNow->sub(new DateInterval('P2D'));
					for($i = 0; $i < 7; $i++) {
						echo "'" . $dateNow->format("d-m-Y") . "',"; 
						$dateNow->add(new DateInterval('P1D'));
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