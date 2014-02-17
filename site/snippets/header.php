<? $desciption = ($page->description() ? $page->description() : $site->description()); ?>
<? $title = ($page->title() ? $page->title().' - '.$site->title() : $site->title()); ?>
<? $keywords = ($page->keywords() ? $page->keywords().' '.$site->keywords() : $site->keywords()); ?>
<head>
  <title><?= $title ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
  <meta content='<?= html($site->author()) ?>' name='author'>
  <meta content='INDEX, FOLLOW' name='robots'>
  <meta content='<?= $keywords ?>' name='keywords'>
  <meta content='<?= $desciption ?>' name='description'>
  <meta content='width = device-width, initial-scale = 1, user-scalable = yes' name='viewport'>
  <meta content='B936EB2BEE226ABAD7EC6968E75B5014' name='msvalidate.01'>
  <link href='/images/favicon.png' rel='icon' type='image/png'>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:300,300italic,700' rel='stylesheet' type='text/css'>
  <!-- %link{:href=>'http://fonts.googleapis.com/css?family=Asap:400,700,400italic', :rel=>'stylesheet', :type=>'text/css'} -->
  <?php echo css('assets/styles/site.css') ?>
  <?php echo js('assets/javascripts/jquery.min.js') ?>
  <?php echo js('assets/javascripts/script.js') ?>
</head>
  
<body>
