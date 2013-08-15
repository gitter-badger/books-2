<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo(CSS.'bootstrap.css'); ?>">
<script type="text/javascript" src="<?php echo(JQ.'jquery-2.0.3.js'); ?>"></script>
<script type="text/javascript" src="<?php echo(JS.'bootstrap.js'); ?>"></script>

<title><?php echo $title ?></title>

</head>
<body>
<ul class="nav nav-pills" >
  <li <?php echo ($active == "books") ? "class='active'" : ""?> >
     <a href="<?php echo URL; ?>">Книги</a>
  </li>
  <li <?php echo ($active == "authors") ? "class='active'" : ""?> >
  	<a href="<?php echo URL."index.php/authors/";?>">Авторы</a>
  </li>
</ul>
	<h1><?php echo "<center>".$title."</center>" ?></h1>