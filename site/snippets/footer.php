	<div class="ł-footer" id="about">
		<footer class="site-footer">
			<h1>About Jan</h1>
			<p>
				<?= $pages->find('home')->footer()->text() ?>
			</p>
			<p>
				Find me on the web or email me at
				<a href="javascript:window.location.href=atob('bWFpbHRvOm1lQGo0bi5jbw==')">
					<script>document.write(atob('bWVAajRuLmNv'))</script>
				</a>

			</p>
			<p>
				<a class="icon--twitter--black" href="https://twitter.com/j4n_co">twitter</a>
				<a class="icon--github--black" href="https://github.com/j4n-co">github</a>
				<a class="icon--stackoverflow--black" href="https://stackoverflow.com/users/446806/jan-drewniak?tab=profile">stackoverflow</a>
				<a class="icon--linkedin--black" href="https://www.linkedin.com/in/jandrewniak/">linkedin</a>
			</p>
			<small role="contentinfo">
				<?= $site->info()->kirbytextRaw() ?>
			</small>
		</footer>
	</div>

	<?= js('@auto') ?>
</body>
</html>