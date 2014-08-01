
#Email Tamplating

Scribe is package to help you create beatiful email templates. By compiling easy-to-maintain css and html to inline style tags, you can be sure all modern email clients will render your email as intended.

##Usage
	<?php

	require 'vendor/autoload.php';

	$scribe = new Innit\Scribe;

	$scribe->setHtml(file_get_contents('example.html'));
	$scribe->setCss(file_get_contents('bootstrap.css'));

	echo $scribe->combine();


##Credits

Based on tijsverkoyen/CssToInlineStyles, extended with CSSTidy to account for duplucate selectors and properties.