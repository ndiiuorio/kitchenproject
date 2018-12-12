<?php require_once '../../core/includes.php';

$p =  new Recipe;

$p->delete();

header("Location: /views/recipes/index.php");
exit();
