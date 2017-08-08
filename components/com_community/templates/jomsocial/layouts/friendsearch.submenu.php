<?php
/**
* @copyright (C) 2013 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/
defined('_JEXEC') or die();
$jinput = JFactory::getApplication()->input;
?>

<ul class="cSubmenu-Search cResetList">
	<li>
		<form class="cForm" name="jsform-search" method="get" action="<?php echo $url; ?>">
			<input type="text" class="input text" name="q" value="" />
			<label class="label-checkbox">
				<input type="checkbox" name="avatar" style="margin-right: 5px;" value="1" class="checkbox">
				<?php echo JText::_('COM_COMMUNITY_EVENTS_AVATAR_ONLY'); ?>
			</label>
			<input type="submit" value="<?php echo JText::_('COM_COMMUNITY_SEARCH'); ?>" class="btn btn-small">

			<?php echo JHTML::_( 'form.token' ) ?>
			<input type="hidden" value="com_community" name="option" />
			<input type="hidden" value="friends" name="view" />
			<input type="hidden" value="friendsearch" name="task" />
			<input type="hidden" value="<?php echo $jinput->request->get( 'userid', '' ); ?>" name="userid" />
			<input type="hidden" value="<?php echo CRoute::getItemId();?>" name="Itemid" />
		</form>
	</li>
</ul>