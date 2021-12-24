<?php require 'partials/header.view.php'; ?>
<div class="p-8 ContentHolder">
	<!-- if there are no members in the database this will appear -->
	<?php 
		$countUsers = count($Characters);
		if($countUsers <= 0):
	?>
		<div class="UserContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
			<div class="p-8">
                <h1 class="text-2xl font-bold">doesn't look like you have any Users registered!</h1>
			</div>
		</div>
	<?php endif ?>

	<?php foreach ($Characters as $Character): ?>
		<div class="UserContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
			<div class="p-8">
				<!-- character name and class displayed-->
				<div class="JobIcon">
					<?php 
						foreach ($CharacterClass as $cClass): 
							if($cClass->ownerID == $Character->ID):
								echo "<img src='../resources/images/JobIcons/",$cClass->ClassName,".png'> </img>";
							endif;
						endforeach;
					?>
				</div>
                <h1 class="text-2xl font-bold" style="text-align: center">
				<?=$Character->CharacterName, " :"?>
				</h1>	
				<!-- character current gear displayed-->
				<div class="GearContainer">
					<div>
						<p class="text-sm">current gear:</p>
						<h3>
						<?php 
							foreach ($currentGear as $cgear):
								$counter = 0;
								if ($cgear->ownerID == $Character->ID):
									$GearDetail = json_decode($cgear->gear);
									foreach ($GearDetail as $piece => $source):
										echo "<div class='ItemContainer'><img class='ItemIcon' src='../resources/images/ItemIcons/", $piece, ".png'></img> - <p>", $source, "</p></div>";
									endforeach;
								endif;
							endforeach;
						?>
						</h3>
					</div>
					<!-- character wanted gear displayed-->
					<div class="BiSText">
						<p class="text-sm">BiS gear:</p>
						<h3>
						<?php 
							foreach ($neededGear as $ngear):
								if ($ngear->ownerID == $Character->ID):
									$GearDetail = json_decode($ngear->gear);
									foreach ($GearDetail as $piece => $source):
										echo "<div class='BiSItemContainer'><p>", $source," - </p> <img class='ItemIcon' src='../resources/images/ItemIcons/", $piece, ".png'></img></div>";
									endforeach;
								endif;
							endforeach;
						?>
						</h3>
					</div>
				</div>
				<div style="display:flex; justify-content:center;">
					<form class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 border-blue-700 rounded"> Edit my Gear </form>
				</div>
			</div>	
		</div>
	<?php endforeach ?>
</div>
<?php require 'partials/footer.view.php'; ?> 