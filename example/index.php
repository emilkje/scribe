<?php

require '../vendor/autoload.php';

$email = new Innit\CssInliner;

$email->with(new Innit\Middleware\Tidy);

$email->setHtml(file_get_contents('example.html'));
$email->setCss(file_get_contents('example.css'));


echo $email->combine();
