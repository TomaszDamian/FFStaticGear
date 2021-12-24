<?php require 'partials/header.view.php'; ?>
	<div class="Blog">
		<?php foreach ($blogs as $blog): ?>
			<div class="MarT-10">
				<h3 class="TitleText">
						<?= $blog->title?>
				</h3>
				<div class="bodyDiv">
					<p>
						<?=$blog->body?>
					</p>
				</div>
				<h6 class="ownerText">
					<?=$blog->owner?>
				</h6>
			</div>
		<?php endforeach ?>
	</div>
<?php require 'partials/footer.view.php'; ?>