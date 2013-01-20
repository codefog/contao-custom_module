<?php

/**
 * custom_module extension for Contao Open Source CMS
 * 
 * Copyright (C) 2012 Codefog
 * 
 * @package custom_module
 * @link    http://codefog.pl
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */


/**
 * Class CustomModule 
 *
 * Front end module "custom module".
 */
class CustomModule extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_custom';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### CUSTOM MODULE ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile() 
	{
		$objTemplate = new FrontendTemplate($this->custom_template);
		$this->Template->output = $objTemplate->parse();
	}
}
