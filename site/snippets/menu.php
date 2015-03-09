<aside class="site-sidebar">


	<div class="flip-cube">

		<div class="flip-front">
			<h1 class="logo">
				<span class="main-title">Jan Drewniak</span>
				<span class="subtitle">art & code</span>
			</h1>

		<div class="sandwich">
			<i class="icon icon--arrow_down"></i>
		</div>

		</div>

		<nav class="site-nav flip-back" role="navigation">
			<ul>
				<?php
				// main menu items
				$items = $pages->visible()->sortBy('title', 'desc');
				// only show the menu if items are available
				if($items->count() > 0):
				?>

				<?php foreach($pages->visible() as $item): ?>
			    <li>
					<a class="<?php ecco($item->isOpen(), "active") ?>" href="<?php echo $item->url() ?>">
						<i class="icon icon--<?php echo strtolower( str_replace(' ', '-', $item->title() ) ) ?>"></i>
						<span><?php echo html($item->title()) ?></span>
					</a>
				</li>
			 	<?php endforeach ?>
				<?php endif ?>
				<li>
					<div class="sandwich">
						<i class="icon icon--arrow_up"></i>
					</div>
				</li>
			</ul>


		</nav>
	
	</div>

</aside>