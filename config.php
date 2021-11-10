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
 * conf file.
 *
 * @package   theme_drak
 * @copyright 2021 Květa
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$THEME->name = "drak";
$THEME->sheets = ["style"];
$THEME->editor_sheets = [];
$THEME->parents = ["boost"];
$THEME->enable_dock = false;
$THEME->yuicsmodules = array();
$THEME->renderfactory = "theme_overriden_renderer_factory";
$THEME->requiredblocks = "";
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$THEME->hidefromselector = false;
$THEME->scss = function($theme)
{
    return theme_drak_get_main_scss_content($theme);
};