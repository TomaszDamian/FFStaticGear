<?php require 'partials/header.view.php'; ?>
	<div class="p-8">
		
		<form action="/users" method="POST">
			<input class="border" type="text" name="name">	
		</form>
		
		<h1>Users:</h1>
		<ul>
			<!--<?php foreach ($users as $user): ?>
				<li> <?= $user->name?></li>
			<?php endforeach ?>-->
		</ul>
	</div>
<?php require 'partials/footer.view.php'; ?>