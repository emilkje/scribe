<?php

namespace Innit\Middleware;

use Innit\Support\MiddlewareInterface;
use Innit\Support\ApplicationInterface;

require __DIR__.'/../csstidy/class.csstidy.php';


class Tidy implements MiddlewareInterface {

	function __construct() {
		$this->tidy = new \csstidy();
		$this->tidy->set_cfg('remove_last_;', true);
		$this->tidy->set_cfg('merge_selectors', 1);
		$this->tidy->set_cfg('discard_invalid_properties', false);
		$this->tidy->set_cfg('css_level', 'CSS3.0');
	}

	function run(ApplicationInterface $app = null){
		$this->tidy->parse($app->getCss());
		$app->setCss($this->tidy->print->plain());
	}
}