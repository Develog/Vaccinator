<div class="middle">
            <div class="container-card blue s-235">
                <h2>Livraison de doses au <?php setlocale (LC_TIME, 'fr_FR.utf8','fra');  echo strftime("%d %B %Y", $dateLastDelivery->getTimestamp());?> : <b><?php echo formatNumber($totalFranceDeliveries);?></b></h2>
				<div class="text-block">
					<p>Pfizer : <b><?php echo formatNumber(getLastDataFrance($deliveries, "Pfizer")); ?></b></p>
					<p>Moderna : <b><?php echo formatNumber(getLastDataFrance($deliveries, "Moderna")); ?></b></p>
					<p>AstraZeneca : <b><?php echo formatNumber(getLastDataFrance($deliveries, "AstraZeneca")); ?></b></p>
					<p>Pourcentage des doses utilisées : <b><?php echo round((($vaccinFirst + $vaccinSecond) / $totalFranceDeliveries) * 100, 3);?> </b> %</p>
				</div>
            </div>
        </div>