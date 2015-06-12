<?php

namespace Innit;

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class CssInliner implements Support\ApplicationInterface {

	private $inliner;
	private $css;
	private $html;
	private $middlewares = array();

	function __construct()
	{
		$this->inliner = new CssToInlineStyles();
	}

	function setHtml($html) {
		$this->html = $html;
		return $this;
	}

	function setCss($css) {
		
		$this->css = $css;
		return $this;
	}

	function getHtml() {
		return $this->html;
	}

	function getCss() {
		return $this->css;
	}

	function combine() {
		foreach($this->middlewares as $middleware) {
			$middleware->run($this);
		}

		$this->inliner->setCss($this->getCss());
		$this->inliner->setHtml($this->getHtml());
		return $this->inliner->convert();
	}

	public function with(Support\MiddlewareInterface $middleware) {
		array_push($this->middlewares, $middleware);
	}
}
