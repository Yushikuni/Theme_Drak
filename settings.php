<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   theme_drak
 * @copyright 2021 Květa
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
if ($ADMIN->fulltree) 
{
    $settings = new theme_boost_admin_settingspage_tabs('themesettingdrak', get_string('configtitle', 'theme_drak'));
    $page = new admin_settingpage('theme_drak_general', get_string('generalsettings', 'theme_drak'));

    // Preset.
    $name = 'theme_drak/loginbackgroundimage';
    $title = get_string('loginbackgroundimage', 'theme_drak');
    $description = get_string('loginbackgroundimage_desc', 'theme_drak');
    //$default = 'default.scss';
    //This create a new settings
    $settings = new admin_setting_configstoredfile($name,$title,$description,'loginbackgroundimage');
    //this fce will copy the image into the data_root location it can be sarved from
    $settings->set_updatedcallback('theme_drak_update_settings_images');
    //for effect we need to add in front page
    $page->add($settings);
    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_drak', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    /*// These are the built in presets.
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configthemepreset($name, $title, $description, $default, $choices, 'drak');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files setting.
    $name = 'theme_drak/presetfiles';
    $title = get_string('presetfiles','theme_drak');
    $description = get_string('presetfiles_desc', 'theme_drak');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

    // Background image setting.
    $name = 'theme_drak/backgroundimage';
    $title = get_string('backgroundimage', 'theme_drak');
    $description = get_string('backgroundimage_desc', 'theme_drak');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $body-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_drak/brandcolor';
    $title = get_string('brandcolor', 'theme_drak');
    $description = get_string('brandcolor_desc', 'theme_drak');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Must add the page after definiting all the settings!
    $settings->add($page);

    // Advanced settings.
    $page = new admin_settingpage('theme_drak_advanced', get_string('advancedsettings', 'theme_drak'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_drak/scsspre',
        get_string('rawscsspre', 'theme_drak'), get_string('rawscsspre_desc', 'theme_drak'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_drak/scss', get_string('rawscss', 'theme_drak'),
        get_string('rawscss_desc', 'theme_drak'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
    // Login page background setting.                                                                                               
    // We use variables for readability.                                                                                            
    $name = 'theme_drak/loginbackgroundimage';                                                                                     
    $title = get_string('loginbackgroundimage', 'theme_drak');                                                                     
    $description = get_string('loginbackgroundimage_desc', 'theme_drak');                                                          
    // This creates the new setting.                                                                                                
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackgroundimage');                             
    // This means that theme caches will automatically be cleared when this setting is changed.                                     
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    // We always have to add the setting to a page for it to have any effect.                                                       
    $page->add($setting);*/
}
