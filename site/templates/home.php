<?php snippet('header') ?>

<div class="ł-hero">
	<canvas id="canvasOne" width="500" height="500">
		Your browser does not support HTML5 Canvas.
	</canvas>
	<script type="text/javascript">
		window.addEventListener('load', eventWindowLoaded, false);
		function eventWindowLoaded() {
		canvasApp();

		}

		function canvasSupport () {
			return true;
		}

		function canvasApp() {

			if (!canvasSupport()) {
				return;
				}

		function  drawScreen () {

			context.fillStyle = 'transparent';
			context.fillRect(0, 0, theCanvas.width, theCanvas.height);
			//Box

			update();
			testWalls();
			collide();
			render();

		}

		var cursorX;
		var cursorY;
		document.onmousemove = function(e){
			cursorX = e.pageX;
			cursorY = e.pageY;
		}

		function update() {
			for (var i = 0; i <balls.length; i++) {
				ball = balls[i];
				//Friction
				ball.velocityx = ball.velocityx - ( ball.velocityx*friction);
				ball.velocityy = ball.velocityy - ( ball.velocityy*friction);

				ball.nextx = (ball.x += ball.velocityx);
				ball.nexty = (ball.y += ball.velocityy);
			}

		}

		function testWalls() {
			var ball;
			var testBall;

			for (var i = 0; i <balls.length; i++) {
				ball = balls[i];

				if (ball.nextx+ball.radius > theCanvas.width) {
					ball.velocityx = ball.velocityx*-1;
					ball.nextx = theCanvas.width - ball.radius;

				} else if (ball.nextx-ball.radius < 0 ) {
					ball.velocityx = ball.velocityx*-1;
					ball.nextx = ball.radius;

				} else if (ball.nexty+ball.radius > theCanvas.height ) {
					ball.velocityy = ball.velocityy*-1;
					ball.nexty = theCanvas.height - ball.radius;

				} else if(ball.nexty-ball.radius < 0) {
					ball.velocityy = ball.velocityy*-1;
					ball.nexty = ball.radius;
				}

			}

		}

		function getRndColor() {
			var h = 30*Math.random()|20,
				s = 100,
				l = 80*Math.random()|40;
			return 'hsl(' + h + ',' + s + '%,' + l + '%)';
		}

		function render() {
			var ball;

			for (var i = 0; i <balls.length; i++) {
				ball = balls[i];
				ball.x = ball.nextx;
				ball.y = ball.nexty;

				var my_gradient=context.createRadialGradient(ball.x, ball.y, ball.radius, ball.x + 90, ball.y + 90, ball.radius + 90);
					my_gradient.addColorStop(0,ball.fillColor);
					my_gradient.addColorStop(1,"black");

				context.fillStyle = my_gradient;
				context.beginPath();
				context.arc(ball.x,ball.y,ball.radius,0,Math.PI*2,true);
				context.closePath();
				context.fill();
			}

		}

		function collide() {
			var ball;
			var testBall;
			for (var i = 0; i <balls.length; i++) {
				ball = balls[i];
				for (var j = i+1; j < balls.length; j++) {
						testBall = balls[j];
						if (hitTestCircle(ball,testBall) || hitTestPointer(ball)) {
							collideBalls(ball,testBall);
						}
					}
				}
			}

		function hitTestPointer(ball1){
			var retval = false;
			var dx = ball1.nextx - cursorX;
			var dy = ball1.nexty - cursorY;
			var distance = (dx * dx + dy * dy);
			if (distance <= (ball1.radius) * (ball1.radius)
				) {
					retval = true;
				}
				return retval;
			}


		function hitTestCircle(ball1,ball2) {
			var retval = false;
			var dx = ball1.nextx - ball2.nextx;
			var dy = ball1.nexty - ball2.nexty;
			var distance = (dx * dx + dy * dy);
			if (distance <= (ball1.radius + ball2.radius) * (ball1.radius + ball2.radius)
				) {
					retval = true;
				}
				return retval;
			}

		function collideBalls(ball1,ball2) {

			var dx = ball1.nextx - ball2.nextx;
			var dy = ball1.nexty - ball2.nexty;

			var collisionAngle = Math.atan2(dy, dx);

			var speed1 = Math.sqrt(ball1.velocityx * ball1.velocityx +
				ball1.velocityy * ball1.velocityy);
			var speed2 = Math.sqrt(ball2.velocityx * ball2.velocityx +
				ball2.velocityy * ball2.velocityy);

			var direction1 = Math.atan2(ball1.velocityy, ball1.velocityx);
			var direction2 = Math.atan2(ball2.velocityy, ball2.velocityx);

			var velocityx_1 = speed1 * Math.cos(direction1 - collisionAngle);
			var velocityy_1 = speed1 * Math.sin(direction1 - collisionAngle);
			var velocityx_2 = speed2 * Math.cos(direction2 - collisionAngle);
			var velocityy_2 = speed2 * Math.sin(direction2 - collisionAngle);

			var final_velocityx_1 = ((ball1.mass - ball2.mass) * velocityx_1 +
				(ball2.mass + ball2.mass) * velocityx_2)/(ball1.mass + ball2.mass);
			var final_velocityx_2 = ((ball1.mass + ball1.mass) * velocityx_1 +
				(ball2.mass - ball1.mass) * velocityx_2)/(ball1.mass + ball2.mass);

			var final_velocityy_1 = velocityy_1;
			var final_velocityy_2 = velocityy_2;

			ball1.velocityx = Math.cos(collisionAngle) * final_velocityx_1 +
				Math.cos(collisionAngle + Math.PI/2) * final_velocityy_1;
			ball1.velocityy = Math.sin(collisionAngle) * final_velocityx_1 +
				Math.sin(collisionAngle + Math.PI/2) * final_velocityy_1;
			ball2.velocityx = Math.cos(collisionAngle) * final_velocityx_2 +
				Math.cos(collisionAngle + Math.PI/2) * final_velocityy_2;
			ball2.velocityy = Math.sin(collisionAngle) * final_velocityx_2 +
				Math.sin(collisionAngle + Math.PI/2) * final_velocityy_2;

			ball1.nextx = (ball1.nextx += ball1.velocityx);
			ball1.nexty = (ball1.nexty += ball1.velocityy);
			ball2.nextx = (ball2.nextx += ball2.velocityx);
			ball2.nexty = (ball2.nexty += ball2.velocityy);
		}
		var numBalls = 25 ;
		var maxSize = 12;
		var minSize = 3;
		var maxSpeed = maxSize+5;
		var balls = new Array();
		var tempBall;
		var tempX;
		var tempY;
		var tempSpeed;
		var tempAngle;
		var tempRadius;
		var tempRadians;
		var tempvelocityx;
		var tempvelocityy;
		var friction = .02;

		theCanvas = document.getElementById("canvasOne");
		context = theCanvas.getContext("2d");

		theCanvas.width = window.innerWidth;
		theCanvas.height = window.innerHeight / 1.5;

		for (var i = 0; i < numBalls; i++) {
			tempRadius = Math.floor(Math.random()*maxSize)+minSize;
			var placeOK = false;
			while (!placeOK) {
				tempX = tempRadius*3 + (Math.floor(Math.random()*theCanvas.width)
					-tempRadius*3);
				tempY = tempRadius*3 + (Math.floor(Math.random()*theCanvas.height)
					-tempRadius*3);
				tempSpeed = maxSpeed-tempRadius;
				tempAngle = Math.floor(Math.random()*360);
				tempRadians = tempAngle * Math.PI/ 180;
				tempvelocityx = Math.cos(tempRadians) * tempSpeed;
				tempvelocityy = Math.sin(tempRadians) * tempSpeed;

				tempBall = {x:tempX,y:tempY,radius:tempRadius, speed:tempSpeed,
					angle:tempAngle, velocityx:tempvelocityx, velocityy:tempvelocityy,
					mass:tempRadius*8, nextx: tempX, nexty:tempY, fillColor: getRndColor()};
				placeOK = canStartHere(tempBall);
			}
			balls.push(tempBall);
		}

		function canStartHere(ball) {
			var retval = true;
			for (var i = 0; i <balls.length; i++) {
				if (hitTestCircle(ball, balls[i])) {
					retval = false;
				}
			}
			return retval;
		}
		function gameLoop() {
			window.setTimeout(gameLoop, 20);
			drawScreen()
		}
		gameLoop();

		}
		</script>
</div>

<main role="main" class="content-container--home ł-main--home">

	<?= snippet( 'site-logo' ) ?>


	<div class="ł-content-sections">

		<section class="ł-content-section">
			<input type="checkbox" id="about-me-activator" class="expanding-button-activator">
			<div class="expanding-button about-me">
				<div class="expanding-button__text">
					<?= $page->text()->markdown() ?>
				</div>
				<label for="about-me-activator" class="expanding-button__label">
					more about me
				</label>
			</div>
		</section>

		<section class="ł-content-section">
			<h2 class="section-title">selected work</h2>
			<div class="ł-flex-thumbs">

				<?php foreach ($recentProjects as $project): ?>
					<?= snippet('project-thumb', ['project' => $project] ) ?>
				<?php endforeach ?>

			</div>
		</section>

		<section class="ł-content-section">
			<h2 class="section-title">experiments</h2>

			<div class="ł-flex-thumbs">
				<?php foreach ($recentExperiments as $experiment): ?>
					<?= snippet('experiment-thumb', ['experiment' => $experiment] ) ?>
				<?php endforeach ?>
				<a class="button experiment-item" href="/lab">more experiments</a>
			</div>
		</section>

		<section class="ł-content-section">
		<h2 class="section-title">thoughts</h2>
			<div class="ł-flex-thumbs">
				<?php foreach ($recentPosts as $post): ?>
					<?= snippet('post-summary-card',['post' => $post] ) ?>
				<?php endforeach ?>
				<a class="button" href="/blog">more posts</a>
			</div>
		</section>

	</div>

</main>

<?php snippet('footer') ?>
