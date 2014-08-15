<?php

require '../vendor/autoload.php';

$scribe = new Innit\Scribe;

$scribe->setHtml(file_get_contents('example.html'));
$scribe->setCss(file_get_contents('example.css'));

echo $scribe->combine();
