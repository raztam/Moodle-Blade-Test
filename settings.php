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
 * Settings for blade_test local plugin
 *
 * @package    local_blade_test
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    // Create the new settings page
    $settings = new admin_settingpage('local_blade_test', get_string('settings', 'local_blade_test'));

    // Create the settings
    $name = 'local_blade_test/enabled';
    $title = get_string('setting_enable', 'local_blade_test');
    $description = get_string('setting_enable_desc', 'local_blade_test');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $settings->add($setting);

    // Add the settings page to the admin settings category
    $ADMIN->add('localplugins', $settings);
}
