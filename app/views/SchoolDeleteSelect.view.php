<?php require 'partials/header.view.php'; ?>
<style>
	/*idk why but the background breaks for whatever reason this fixes it*/
	body{
		height:auto !important;
	}
</style>
<div class="p-8">
	<?php foreach ($schools as $school): ?>
		<div class="schoolContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
			<div class="p-8">
				<form action="/DeleteSchool" method="POST">
					<input name="id" style="display:none;" value="<?=$school->schoolID?>">
					<h1 class="text-2xl font-bold"><?=$school->schoolName?></h3>
					<?php 
						$JSONDetail = json_decode($school->details);
						foreach ($JSONDetail as $name => $detail):
					?>
					<p> <b> <?=$name?></b>: <?=$detail?> </p>
					<?php endforeach ?>
					<div class="alignRight">
						<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Delete</button>
					</div>
				</form>
			</div>	
		</div>
	<?php endforeach ?>
</div>
<?php require 'partials/footer.view.php'; ?> 