<?php

namespace Innit;

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;
require __DIR__.'/csstidy/class.csstidy.php';

class Scribe {

	private $inliner;
	private $tidy;

	function __construct()
	{
		$this->inliner = new CssToInlineStyles();
		$this->tidy = new \csstidy();
		$this->tidy->set_cfg('remove_last_;', true);
		$this->tidy->set_cfg('merge_selectors', 1);
		$this->tidy->set_cfg('discard_invalid_properties', false);
		$this->tidy->set_cfg('css_level', 'CSS3.0');
	}

	function setHtml($html) {
		$this->inliner->setHtml($html);
		return $this;
	}

	function setCss($css) {
		
		$this->tidy->parse($css);
		$this->inliner->setCss($this->tidy->print->plain());
	}

	function combine() {
		return $this->inliner->convert();
	}
}