<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_tags
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.tabstate');

$input = JFactory::getApplication()->input;

if (!JFactory::getUser()->authorise('core.manage', 'com_tags'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

JLoader::register('TagsHelperContent', __DIR__ . '/helpers/content.php');
JLoader::register('TagsHelperTags'   , __DIR__ . '/helpers/tags.php');

$task = $input->get('task');

$controller	= JControllerLegacy::getInstance('Tags');
$controller->execute($input->get('task'));
$controller->redirect();
