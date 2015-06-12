<?php

require __DIR__.'/vendor/autoload.php';

$email = new Innit\CssInliner;

$email->setHtml(file_get_contents('example.html'));
$email->setCss(file_get_contents('example.css'));

echo $email->combine();
