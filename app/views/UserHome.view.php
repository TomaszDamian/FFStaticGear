<?php require 'partials/header.view.php'; ?>
<div class="p-8">
	<!-- if there are no members in the database this will appear -->
	<?php 
		$countUsers = count($Characters);
		if($countUsers <= 0):
	?>
		<div class="schoolContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
			<div class="p-8">
                <h1 class="text-2xl font-bold">doesn't look like you have any Users registered!</h1>
			</div>
		</div>
	<?php endif ?>

	<?php foreach ($Characters as $Character): ?>
		<div class="schoolContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
			<div class="p-8">
                <h1 class="text-2xl font-bold">
					<!-- character name and class displayed-->
					<?=$Character->CharacterName, " :"?>
					<?php 
						foreach ($CharacterClass as $cClass): 
							if($cClass->ownerID == $Character->ID):
								echo $cClass->ClassName, ", ";
							endif;
						endforeach;
					?>
					</h1>
					<!-- character current gear displayed-->
					<h3>
					<?php 
						foreach ($currentGear as $cgear):
							if ($cgear->ownerID == $Character->ID):
								$GearDetail = json_decode($cgear->gear);
								foreach ($GearDetail as $piece => $source):
									echo "<p>", "<b>", $piece, "</b> - ",$source,"</p>";
								endforeach;
							endif;
						endforeach;
					?>
					</h3>
			</div>	
		</div>
	<?php endforeach ?>
</div>
<?php require 'partials/footer.view.php'; ?> 