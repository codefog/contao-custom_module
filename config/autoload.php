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
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'CustomModule' => 'system/modules/custom_module/CustomModule.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_custom'     => 'system/modules/custom_module/templates',
	'custom_default' => 'system/modules/custom_module/templates'
));
