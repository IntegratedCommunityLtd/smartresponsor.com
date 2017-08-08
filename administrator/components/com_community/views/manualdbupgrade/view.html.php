<?php
/**
* @copyright (C) 2013 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/
// Disallow direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.view' );

require_once( JPATH_ROOT . '/components/com_community/libraries/core.php' );
require_once( JPATH_ROOT . '/components/com_community/libraries/profile.php' );

/**
 * Configuration view for JomSocial
 */
class CommunityViewManualDbUpgrade extends JViewLegacy
{
	/**
	 * The default method that will display the output of this view which is called by
	 * Joomla
	 *
	 * @param	string template	Template file name
	 **/
	public function display( $tpl = null )
	{
		// Set the titlebar text
		JToolBarHelper::title( JText::_('COM_COMMUNITY_MANUAL_DB_UPGRADE'), 'Database Upgrade' );

		jimport( 'joomla.html.editor' );
		$config		= CFactory::getConfig();
		$editor		= $editor = new CEditor('jomsocial');

		$this->set( 'editor' , $editor );
		$this->set('config', CFactory::getConfig());

		//check for database
		$upgradeModel = $this->getModel( 'manualdbupgrade' );
		$stats = $upgradeModel->getEmojiInitialDBStats();

		$this->set('emojiDatabaseInfo',$stats);

		parent::display( $tpl );
	}

	public function setToolBar()
	{
		// Get the toolbar object instance
		$bar = JToolBar::getInstance('toolbar');
		$jinput = JFactory::getApplication()->input;
		// Set the titlebar text
		JToolBarHelper::title( JText::_('COM_COMMUNITY_MANUAL_DB_UPGRADE'));
	}
}
