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
 * drak.
 *
 * @package    theme_drak
 * @copyright  2021 Květa
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();  

$plugin->version = "2021061000";
$plugin->rquires = "2021052700";
$plugin->component = "theme_drak";
$plugin->dependencies = ['theme_drak' => '2021052700'];
$plugin->maturity = MATURITY_ALPHA;//MATURITY_STABLE ->stabilní verze, _RC->release candidát, _BETA->je beta, _ALFA->hodně bugů a práce na 25%