  <footer>
    <?php echo kirbytext($site->copyright()) ?>
  </footer>

<?= $page->custom_js() ?>

</body>
<!-- google analytics --> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19507403-4', 'j4n.co');
  ga('send', 'pageview');

</script>

</html>