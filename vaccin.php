<?php 

$vaccins = json_decode(file_get_contents("https://www.data.gouv.fr/fr/datasets/r/16cb2df5-e9c7-46ec-9dbf-c902f834dab1"), true);

$arrayVac = [];
$nbrRegion = 0;
$valueDay = 0;

$population = 67063000;


$arrayReg = [
	"ARA" => ["name" => "Auvergne-Rhône-Alpes", "pop" => 8032400],
	"BFC" => ["name" => "Bourgogne-Franche-Comté", "pop" => 2783000],
	"BRE" => ["name" => "Bretagne", "pop" => 3340400], 
	"CVL" => ["name" => "Centre Val de Loire", "pop" => 2559100],
	"COR" => ["name" => "Corse", "pop" => 344700],
	"GES" => ["name" => "Grand Est", "pop" => 5511700],
	"HDF" => ["name" => "Haut de France", "pop" => 5962700],
	"IDF" => ["name" => "Ile de France", "pop" => 12278200],
	"NMD" => ["name" => "Normandie", "pop" => 3303500],
	"NAQ" => ["name" => "Nouvelle-Aquitaine", "pop" => 6000000],
	"OCC" => ["name" => "Occitanie", "pop" => 5924900],	
	"PLO" => ["name" => "Pays de la Loire", "pop" => 3801800],
	"PAC" => ["name" => "Provence-Alpes-Côte d'Azur", "pop" => 5055700],
	"GDP" => ["name" => "Guadeloupe", "pop" => 376900],
	"GUY" => ["name" => "Guyane", "pop" => 290700],
	"LRU" => ["name" => "La Réunion", "pop" => 860000],
	"MTQ" => ["name" => "Martinique", "pop" => 358700],
	"MAY" => ["name" => "Mayotte", "pop" => 279500]
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
	
	for($i = 0; $i < 5; $i++) {
		$total += getIncreaseDay($arrayVac, $dateBegin->format("Y-m-d"), $dateEnd->format("Y-m-d"));
		$dateEnd->sub(new DateInterval('P1D'));
		$dateBegin->sub(new DateInterval('P1D'));
	}
	return $total / 5;
}

function getAverage7DaysReg($array, $now, $reg)
{
	$total = 0;
	$dateEnd = DateTime::createFromFormat('Y-m-d', $now); 
	$dateBegin = DateTime::createFromFormat('Y-m-d', $now); 
	$dateBegin->sub(new DateInterval('P1D'));
	
	for($i = 0; $i < 5; $i++) {
		$total += getIncrease($array, $reg, $dateBegin->format("Y-m-d"), $dateEnd->format("Y-m-d"));
		$dateEnd->sub(new DateInterval('P1D'));
		$dateBegin->sub(new DateInterval('P1D'));
	}
	return $total / 5;
}

function getNumberDayToFinish($region, $average, $vaccins, $now, $percent = 100)
{
	if($vaccins[$now] !== 0) {
		$quantityPop = $region['pop'] * ($percent / 100);
		$finish = DateTime::createFromFormat('Y-m-d', $now);
		$value = round(($quantityPop - $vaccins[$now]) / $average);
		$finish->add(new DateInterval('P' . $value . 'D'));
		setlocale (LC_TIME, 'fr_FR.utf8','fra');
		return utf8_encode(strftime("%d %B %Y", $finish->getTimestamp()));
	} else {
		return "jamais";
	}	
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

	<script>
		function createChart(regionId, data)
		{
			data = JSON.parse(data);
			var ctx = document.getElementById('chart_' + regionId).getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: [
						<?php 
						$dateNow = DateTime::createFromFormat('Y-m-d', $dayLastData);
						$dateNow->sub(new DateInterval('P5D'));
						for($i = 0; $i < 7; $i++) {
							echo "'" . $dateNow->format("d-m-Y") . "',"; 
							$dateNow->add(new DateInterval('P1D'));
						}?>
						],
					datasets: [{
						label: regionId,
						backgroundColor: 'rgba(150, 150, 90,1)',
						borderColor: 'rgba(50, 200, 80,1)',
						fill: false,
						data: data
					}]
				},
				options: {
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
								}
						}]
					}
				}
			});	
		}
	</script>

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
		
		h2 {
			text-align: center;
			font-size: 30px;
		}

		h3 {
			margin-top: 0;
		}
		
		.container {
			display: flex;
			justify-content: space-between;
			margin: 50px 5%;
		}
		
		.card {
			box-shadow: 0 0 10px 5px grey;
			flex: 0 1 45%;
			padding: 10px;
			border-radius: 15px;
			text-align: center;
			font-size: 20px;
		}

		.grid-container {
			display: grid;
			grid-row-gap: 40px;
			grid-template-columns: 45% 45%;
			align-content: space-between;
  			justify-content: space-around;
		}

		.grid-card {
			padding: 10px 25px;
			border-radius: 15px;
			text-align: center;
			font-size: 20px;
			box-shadow: 0 0 10px 5px grey;
		}

		.grid-card p {
			margin: 2px 0;
		}

		.btn-reg {
			min-width: 100px;
			height: 40px;
			background-color: lightgrey;
			padding: 5px;
			margin: 5px;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="header">
		<h1>Vaccinator</h1>
	</div>

	<h2>France</h2>
	<div class="grid-container">
		<div class="grid-card">
			<p>Nombre total de personnes vaccinées : <b><?php echo $totalVac[$dayLastData];?></b></p>
		</div>
		
		<div class="grid-card">
			<p>Pourcentage de la population vacciné : <b><?php echo round(($totalVac[$dayLastData] / $population) * 100, 3); ?></b> %</p>
		</div>

		<div class="grid-card">
			<p>Nouvelles personnes vaccinées le <?php setlocale (LC_TIME, 'fr_FR.utf8','fra');  echo strftime("%d %B %Y", DateTime::createFromFormat('Y-m-d', $dayLastData)->getTimestamp());?> : <b><?php echo getIncreaseDay($arrayVac, $dayLastDataOneLess, $dayLastData); ?></b></p>
		</div>
		
		<div class="grid-card">
			<p>Moyenne sur 5 jours : <b><?php echo getAverage7Days($arrayVac, $dayLastData); ?></b></p>
		</div>
	</div>
	<h2>Régions</h2>

	<div>
		<?php 
			foreach($arrayReg as $key => $region) {
				echo '<a class="btn-reg" href="#' . $key . '">' . $region['name'] . '</a>' ;
			}
		?>
	</div>

	<div class="grid-container">
		<?php 
		$dataChart = "";
		foreach($arrayReg as $keyReg => $region) {
			echo '<div class="grid-card" id="'. $keyReg .'">';
				echo '<h3>'. $region['name'] . '</h3>';
				foreach($arrayVac as $key => $vaccin) {
					$dataChart = '[' . implode(',', $vaccin) . ']';
					if($key === $keyReg) {
						echo '<p>'. strrev(wordwrap(strrev($vaccin[$dayLastData]), 3, ' ', true)) .' personnes vaccinnées<p>';
						echo '<p>'. round(($vaccin[$dayLastData] / $region['pop']) * 100, 3) .' % de la population<p>';
						echo "<p>Augmentation de " . getIncrease($arrayVac, $key, $dayLastDataOneLess, $dayLastData) . " vaccinations sur la dernière journée</p>";
						echo "<p>Moyenne sur 5 jours : <b>" . getAverage7DaysReg($arrayVac, $dayLastData, $key) . "</b>";
						echo "<p>Date à laquelle les 60 % de la population seront vaccinées (potentielle immunité collective) en conservant la moyenne sur 7 jours : <b>" 
							. getNumberDayToFinish($region, getAverage7DaysReg($arrayVac, $dayLastData, $key), $vaccin, $dayLastData, 60) . "</b>";
						echo "<p>Date à laquelle toute la population sera vaccinée en conservant la moyenne sur 7 jours : <b>" 
							. getNumberDayToFinish($region, getAverage7DaysReg($arrayVac, $dayLastData, $key), $vaccin, $dayLastData) . "</b>";
						echo '<div class="chart-reg-container" style="position: relative; width:100%">';
							echo '<canvas id="chart_' . $key . '"></canvas>';
							echo '<script>createChart("'. $key . '", "'. $dataChart .'")</script>';
						echo '</div>';
					}
				}
			echo '</div>';
		}?>
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
					$dateNow->sub(new DateInterval('P3D'));
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