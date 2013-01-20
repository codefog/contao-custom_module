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
 * Extension version
 */
@define('CUSTOM_MODULE_VERSION', '1.1');
@define('CUSTOM_MODULE_BUILD', '0');


/**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD']['miscellaneous'], 1, array
(
	'custom_module' => 'CustomModule'
));
