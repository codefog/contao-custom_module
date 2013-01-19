<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Kamil Kuzminski 2011 
 * @author     Kamil Kuzminski <http://qzminski.com> 
 * @package    CustomModule
 * @license    LGPL 
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
	'options_callback'     => array('tl_module_custom', 'getCustomTemplates')
);


/**
 * Class CustomModule 
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Kamil Kuzminski 2011 
 * @author     Kamil Kuzminski <http://qzminski.com> 
 * @package    CustomModule
 */
class tl_module_custom extends Backend
{

	/**
	 * Return all custom templates as array
	 * @param object
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

?>