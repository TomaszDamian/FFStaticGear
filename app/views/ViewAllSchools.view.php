<?php require 'partials/header.view.php'; ?>
<style>
	<?php
		$countBlogs = count($schools);
		if($countBlogs > 4){
			echo "body{height:auto !important;}";
		}
	?>
</style>
<div class="p-8">
	<?php foreach ($schools as $school): ?>
		<div class="schoolContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
			<div class="p-8">
                <h1 class="text-2xl font-bold"><?=$school->schoolName?></h3>
                <?php 
                    $JSONDetail = json_decode($school->details);
                    foreach ($JSONDetail as $name => $detail):
                ?>
                <p> <b> <?=$name?></b>: <?=$detail?> </p>
                <?php endforeach ?>
			</div>	
		</div>
	<?php endforeach ?>
</div>
<?php require 'partials/footer.view.php'; ?> 