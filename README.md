
#Email Tamplating

Scribe is package to help you create beatiful email templates. By compiling easy-to-maintain css and html to inline style tags, you can be sure all modern email clients will render your email as intended.

##Usage
	<?php

	require 'vendor/autoload.php';

	$email = new Innit\CssInliner;

	//If we want to compress the css output, we can use the included Tidy middleware
	$email->with(new Innit\Middleware\Tidy);

	$email->setHtml(file_get_contents('example.html'));
	$email->setCss(file_get_contents('example.css'));

	echo $email->combine();


##Middlewares
You can make your own middlewares to manipulate the html or css before it is combined:
	<?php

	class MyMiddleware implements Innit\Support\MiddlewareInterface {

		function run(Innit\Support\ApplicationInterface $app) {
			$css = $app->getCss();
			$html = $app->getHtml();

			/* DO SOMETHING WITH CONTENTS */

			$app->setCss($css);
			$app->setHtml($html);
		}

	}

	//Register our new middleware with the application
	$cssInlinerInstance->with(new MyMiddleware);

##Credits
Based on tijsverkoyen/CssToInlineStyles, extended with CSSTidy to account for duplucate selectors and properties.
