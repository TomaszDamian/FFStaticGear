<?php require 'partials/header.view.php'; ?>
	<div class="Blog">
		<?php 
			$last = count($blogs) - 1;
			$highestId = $blogs[$last]->id;
		?>
		<?php if ($postId > $highestId): ?>
			<div class="w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
				<div class="px-6 py-4">
					<div class="font-bold text-xl mb-2">
						woops I think this is a problem
					</div>
					<p class="text-grey-darker text-base">
						Sorry this post doesn't exist
					</p>
					<h6 class="ownerText">The creator</h6>
				</div>
			</div>
		<?php else: ?>
			<?php foreach ($blogs as $blog): ?>
				<?php if ($blog->id == $postId): ?>
					<div class="w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
						<form action="/SaveEditedPost" method="POST">
							<input type="text" style="display: none;" value="<?=$blog->id?>" name="id">
							<div class="px-6 py-4">
								<div class="font-bold text-xl mb-2">
									<input type="text" class="border" placeholder="Title" name="title" value="<?=$blog->title?>">
								</div>
								<p class="text-grey-darker text-base mb-2">
									<textarea class="border w-full h-32" placeholder="Body text" name="body"><?=$blog->body?></textarea>
								</p>
								<h6 class="ownerText">
									<input type="text" class="border" placeholder="Author" name="owner" value="<?=$blog->owner?>">
								</h6>
							</div>
							<button type="submit" class=" ml-4 mb-2 w-1/3 bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">Submit your edit!</button>
						</form>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
	</div>
<?php require 'partials/footer.view.php'; ?>