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
echo CommunityLicenseHelper::disabledHtml();
?>

<style>
    .container-main {
        padding-bottom: 0 !important;
    }
</style>

<script>
$( document ).ready(function() {
    Joomla.submitbutton = function( action ) {
        if ( action === 'apply' && !checkFiles() ) {
            window.alert('<?php echo JText::_("COM_COMMUNITY_THEME_IMAGE_ERROR"); ?>')
            return false;
        }
        submitform(action);
    }

    function checkFiles() {
        var isValid = true;
        $('#adminForm input[type=file]').each(function() {
            if ( this.value && !this.value.match(/\.(jpg|jpeg|png)$/i) ) {
                isValid = false;
                return false;
            }
        });
        return isValid;
    }

    $('#default-cover-group,#default-group-avatar').ace_file_input({
        no_file:'No File ...',
        btn_choose:'Choose',
        btn_change:'Change',
        droppable:false,
        onchange:true,
        thumbnail:false
    });

});
</script>

<form name="adminForm" id="adminForm" action="index.php?option=com_community" method="POST" enctype="multipart/form-data">
    <div class="widget-box">
        <div class="widget-header widget-header-flat">
            <h5><?php echo JText::_('COM_COMMUNITY_CONFIGURATION_TITLE_PAGE_SETTINGS') ?></h5>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <table cellspacing="5" cellpadding="5">
                    <tr>
                        <td class="key" width="150"><?php echo JText::_('COM_COMMUNITY_PREFERENCE_DEFAULT_TAB'); ?></td>
                        <td>
                            <select name="config[default_group_tab]">
                                <option value="0"><?php echo JText::_('COM_COMMUNITY_PREFERENCE_ACTIVITY_STREAM'); ?></option>
                                <option value="1" <?php echo (CFactory::getConfig()->get('default_group_tab')) ? 'selected' : ''?>><?php echo JText::_('COM_COMMUNITY_PREFERENCE_ACTIVITY_DESC'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="key" width="150"><?php echo JText::_('COM_COMMUNITY_CONFIGURATION_SHOW_TOTAL_MEMBERS'); ?></td>
                        <td>
                            <input type=text" name="config[group_sidebar_members_show_total]" value="<?php echo CFactory::getConfig()->get('group_sidebar_members_show_total', 12); ?>"/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="space-8"></div>
    <div class="row-fluid">
    <div class="span24">
        <div class="widget-box">
            <div class="widget-header widget-header-flat">
                <h5><?php echo JText::_('COM_COMMUNITY_THEMEPROFILE_DEFAULT_IMAGES');?></h5>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <table cellspacing="5" cellpadding="5">
                        <thead>
                        <tr>
                            <th>
                                <?php echo JText::_('COM_COMMUNITY_DEFAULT_COVER');?>
                            </th>
                            <th>
                                <?php echo JText::_('COM_COMMUNITY_DEFAULT_AVATAR');?>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <?php
                                $image = JURI::root() . 'components/com_community/assets/cover-group-default.png';
                                if(isset($this->settings['group']['default-cover-group']))
                                    $image = JUri::root().str_replace(JPATH_ROOT,'',COMMUNITY_PATH_ASSETS).'default-cover-group.'.$this->settings['group']['default-cover-group'];
                                ?><img src="<?=$image;?>?ts=<?php echo time();?>" alt="" class="preview-cover">
                            </td>
                            <td width="45%" valign="top">
                                <?php
                                $image = JURI::root() . 'components/com_community/assets/group.png';

                                if(isset($this->settings['group']['default-group-avatar'])) {
                                    $image = JUri::root() . str_replace(JPATH_ROOT, '', COMMUNITY_PATH_ASSETS) . 'default-group-avatar.' . $this->settings['group']['default-group-avatar'];
                                }
                                ?><img src="<?=$image;?>?ts=<?php echo time();?>" alt="" class="preview-avatar">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="space-6"></div>
                                <input type="file" name="default-cover-group" id="default-cover-group">
                                <input type="hidden" name="settings[default-cover-group]" value="<?php echo isset($this->settings['group']['default-cover-group']) ? $this->settings['group']['default-cover-group'] : "";?>" />
                            </td>
                            <td>
                                <div class="space-6"></div>
                                <input type="file" name="default-group-avatar" id="default-group-avatar">
                                <input type="hidden" name="settings[group-avatar]" value="<?php echo isset($this->settings['group']['default-group-avatar']) ? $this->settings['group']['default-group-avatar'] : "";?>" />
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-8"></div>
<input type="hidden" name="view" value="themegroups" />
<input type="hidden" name="task" value="apply" />
<input type="hidden" name="option" value="com_community" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>

<style type="text/css">

    .preview-cover {
        max-width: 100%;
        height: 150px;
    }

    .preview-avatar {
        max-width: 100%;
        height: 150px;
    }


</style>
