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
 * Lib file.
 *
 * @package   theme_drak
 * @copyright 2021 Květa
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
function theme_drak_get_main_scss_content($theme) 
{                                                                                
    global $CFG;                                                                                                                    
 
    $scss = '';                                                                                                                     
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;                                                 
    $fs = get_file_storage();                                                                                                       
    //setting name was updated comes as a tring like 's_theme...'
    //we split in o '_' char.
    $parts = explode('_',$settingname);
    $settingname = end($parts);

    //admin srttings are stoled in system context
    $syscontex = contex_system::instace();
        //this s the omonent name the stting is stred in
    $component = 'theme_drak';

    //this value of admin setting hich is th filename of uploaded file
    $filename = get_config($component,$settingname);
    $extension = substr($filename, strrpos($filename,'.')+1);

    //this is the full path in moodle internal file system
    $fullpath = "/{$syscontex->id}/{$component}/{$settingname}/0{$filname}";
    //get instace of the moodle file storage
    $fs = get_file_storade();
    //this os an efficient way to get a file if we know the exact path
    if($file = $fs->get_file_by_hash(sha1($fullpath)))
    {
         // We got the stored file - copy it to dataroot.                                                                            
        // This location matches the searched for location in theme_config::resolve_image_location.                                 
        $pathname = $CFG->dataroot . '/pix_plugins/theme/photo/' . $settingname . '.' . $extension;                                 
 
        // This pattern matches any previous files with maybe different file extensions.                                            
        $pathpattern = $CFG->dataroot . '/pix_plugins/theme/photo/' . $settingname . '.*';                                          
 
        // Make sure this dir exists.                                                                                               
        @mkdir($CFG->dataroot . '/pix_plugins/theme/photo/', $CFG->directorypermissions, true);                                      
 
        // Delete any existing files for this setting.                                                                              
        foreach (glob($pathpattern) as $filename) {                                                                                 
            @unlink($filename);                                                                                                     
        }                                                                                                                           
 
        // Copy the current file to this location.                                                                                  
        $file->copy_content_to($pathname);                                                                                          
    }                                                                                                                               
    $context = context_system::instance();                                                                                          
    if ($filename == 'default.scss') 
    {                                                                                              
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.                      
        $scss .= file_get_contents($CFG->dirroot . '/theme/drak/scss/preset/default.scss');                                        
    } 
    else if ($filename == 'plain.scss') 
    {                                                                                         
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.                      
        $scss .= file_get_contents($CFG->dirroot . '/theme/drak/scss/preset/plain.scss');                                          
 
    } 
    else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_drak', 'preset', 0, '/', $filename))) 
    {              
        // This preset file was fetched from the file area for theme_drak and not theme_boost (see the line above).                
        $scss .= $presetfile->get_content();                                                                                        
    } 
    else 
    {                                                                                                                        
        // Safety fallback - maybe new installs etc.                                                                                
        $scss .= file_get_contents($CFG->dirroot . '/theme/drak/scss/preset/default.scss');                                        
    }                                                                                                                                       
 
    // Pre CSS - this is loaded AFTER any prescss from the setting but before the main scss.                                        
    $pre = file_get_contents($CFG->dirroot . '/theme/drak/scss/pre.scss');                                                         
    // Post CSS - this is loaded AFTER the main scss but before the extra scss from the setting.                                    
    $post = file_get_contents($CFG->dirroot . '/theme/drak/scss/post.scss');                                                       
    // Reset theme caches.                                                                                                          
    theme_reset_all_caches();  
    
    // Combine them together.                                                                                                       
    return $pre . "\n" . $scss . "\n" . $post;  
                                                                                                                                                                                                                       
}