<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccinator - À propos</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link rel="icon" href="syringe.svg" type="image/svg+xml"/>

	<link rel="stylesheet" href="style.css">

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
</head>
<body>
	<div class="header">
		<div class="title">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M201.5 174.8l55.7 55.8c3.1 3.1 3.1 8.2 0 11.3l-11.3 11.3c-3.1 3.1-8.2 3.1-11.3 0l-55.7-55.8-45.3 45.3 55.8 55.8c3.1 3.1 3.1 8.2 0 11.3l-11.3 11.3c-3.1 3.1-8.2 3.1-11.3 0L111 265.2l-26.4 26.4c-17.3 17.3-25.6 41.1-23 65.4l7.1 63.6L2.3 487c-3.1 3.1-3.1 8.2 0 11.3l11.3 11.3c3.1 3.1 8.2 3.1 11.3 0l66.3-66.3 63.6 7.1c23.9 2.6 47.9-5.4 65.4-23l181.9-181.9-135.7-135.7-64.9 65zm308.2-93.3L430.5 2.3c-3.1-3.1-8.2-3.1-11.3 0l-11.3 11.3c-3.1 3.1-3.1 8.2 0 11.3l28.3 28.3-45.3 45.3-56.6-56.6-17-17c-3.1-3.1-8.2-3.1-11.3 0l-33.9 33.9c-3.1 3.1-3.1 8.2 0 11.3l17 17L424.8 223l17 17c3.1 3.1 8.2 3.1 11.3 0l33.9-34c3.1-3.1 3.1-8.2 0-11.3l-73.5-73.5 45.3-45.3 28.3 28.3c3.1 3.1 8.2 3.1 11.3 0l11.3-11.3c3.1-3.2 3.1-8.2 0-11.4z"/></svg>
			<h1>Vaccinator</h1>
			<svg style="-webkit-transform: scaleX(-1);transform: scaleX(-1);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M201.5 174.8l55.7 55.8c3.1 3.1 3.1 8.2 0 11.3l-11.3 11.3c-3.1 3.1-8.2 3.1-11.3 0l-55.7-55.8-45.3 45.3 55.8 55.8c3.1 3.1 3.1 8.2 0 11.3l-11.3 11.3c-3.1 3.1-8.2 3.1-11.3 0L111 265.2l-26.4 26.4c-17.3 17.3-25.6 41.1-23 65.4l7.1 63.6L2.3 487c-3.1 3.1-3.1 8.2 0 11.3l11.3 11.3c3.1 3.1 8.2 3.1 11.3 0l66.3-66.3 63.6 7.1c23.9 2.6 47.9-5.4 65.4-23l181.9-181.9-135.7-135.7-64.9 65zm308.2-93.3L430.5 2.3c-3.1-3.1-8.2-3.1-11.3 0l-11.3 11.3c-3.1 3.1-3.1 8.2 0 11.3l28.3 28.3-45.3 45.3-56.6-56.6-17-17c-3.1-3.1-8.2-3.1-11.3 0l-33.9 33.9c-3.1 3.1-3.1 8.2 0 11.3l17 17L424.8 223l17 17c3.1 3.1 8.2 3.1 11.3 0l33.9-34c3.1-3.1 3.1-8.2 0-11.3l-73.5-73.5 45.3-45.3 28.3 28.3c3.1 3.1 8.2 3.1 11.3 0l11.3-11.3c3.1-3.2 3.1-8.2 0-11.4z"/></svg>
		</div>
		<div class="menu">
			<a href="/">Accueil</a><a href="/vaccination">La vaccination</a><a href="about">À propos</a>
		</div>
	</div>

	<h2>Où se faire vacciner ?</h2>
	<h4>Certains centres peuvent manquer sur la carte</h4>
	<div id="map" class="map-place"></div>

		

		<!-- Fichiers Javascript -->
		<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
		<script type='text/javascript' src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js'></script>
		
		<script>
			// On initialise la latitude et la longitude de Paris (centre de la carte)
			var lat = 48.852969;
			var lon = 2.349903;
			var markers = [];
			var macarte = null;
			var markerClusters; // Servira à stocker les groupes de marqueurs
			// Nous initialisons une liste de marqueurs
			<?php 
			if (($handle = fopen("https://www.data.gouv.fr/fr/datasets/r/5cb21a85-b0b0-4a65-a249-806a040ec372", "r")) !== FALSE) {
				echo 'var villes = {';
				$row = 0;
				while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
					if($row > 0) {
						$num = count($data);
						$dataVac = explode(';', $data[0]);
						if(isset($dataVac[9]) && isset($dataVac[10])) {
							$name = str_replace('"', "'", $dataVac[1]);
							echo '"' . utf8_encode($name) . '": { "lat": ' . $dataVac[9] . ', "lon": ' . $dataVac[10] . ' },';
						} 
					}
					$row++;
				}
				echo '};';
				fclose($handle);
			}
			?>
			function initMap() {
				macarte = L.map('map').setView([46.54, 2.43], 5);
				markerClusters = L.markerClusterGroup(); // Nous initialisons les groupes de marqueurs
				// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
				L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
					// Il est toujours bien de laisser le lien vers la source des données
					attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
					minZoom: 1,
					maxZoom: 20
				}).addTo(macarte);
				// Nous parcourons la liste des villes
				for (ville in villes) {
				// Nous définissons l'icône à utiliser pour le marqueur, sa taille affichée (iconSize), sa position (iconAnchor) et le décalage de son ancrage (popupAnchor)
					
					var marker = L.marker([villes[ville].lat, villes[ville].lon]); // pas de addTo(macarte), l'affichage sera géré par la bibliothèque des clusters
					marker.bindPopup(ville);
					markerClusters.addLayer(marker); // Nous ajoutons le marqueur aux groupes
				}
			
				macarte.addLayer(markerClusters);
			}
			window.onload = function(){
			// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
				initMap(); 
			};
		</script>
	
	<h2>Quelques vidéos pour vous éclairer sur le sujet de la vaccination contre la COVID-19</h2>
	<div class="grid-video">
		 <iframe src="https://www.youtube.com/embed/v_TGhhUfwgI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		 <iframe src="https://www.youtube.com/embed/bjFtFMilb34" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		 <iframe src="https://www.youtube.com/embed/JRka__9cfaQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
</body>