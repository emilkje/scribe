
#Email Tamplating

Scribe is package to help you create beatiful email templates. By compiling easy-to-maintain css and html to inline style tags, you can be sure all modern email clients will render your email as intended.

##Usage
	<?php

	require 'vendor/autoload.php';

	$email = new Innit\CssInliner;

	$email->setHtml(file_get_contents('example.html'));
	$email->setCss(file_get_contents('example.css'));

	echo $email->combine();


##Credits

Based on tijsverkoyen/CssToInlineStyles, extended with CSSTidy to account for duplucate selectors and properties.
