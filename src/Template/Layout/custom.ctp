<!DOCTYPE html>
<html lang="ja">
<head>
	<title><?= h($this->fetch('title')) ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<?php 
echo $this->Html->css('sample.css');
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>

</head>
<body>
<div id="header">
	<?= _($header) ?>
</div>

<?= $this->fetch('content') ?>

<div id="footer">
	<?=  _($footer) ?>
</div>
</body>
</html>