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
 * Add a palette to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['custom_module'] = '{title_legend},name,headline,type;{template_legend:hide},custom_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add a field to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['custom_template'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['custom_template'],
	'default'              => 'custom_default',
	'exclude'              => true,
	'inputType'            => 'select',
	'options_callback'     => array('tl_module_custom', 'getCustomTemplates'),
	'sql'                  => "varchar(64) NOT NULL default ''"
);


/**
 * Class tl_module_custom 
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_module_custom extends Backend
{

	/**
	 * Return all custom templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getCustomTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('custom_', $intPid);
	}
}
