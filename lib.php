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
 * Library functions for blade_test local plugin
 *
 * @package    local_blade_test
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Extend navigation for the site.
 *
 * @param global_navigation $navigation
 */
function local_blade_test_extend_navigation(global_navigation $navigation) {
    global $CFG;

    // Check if plugin is enabled
    if (get_config('local_blade_test', 'enabled')) {
        // Add link to plugin index page in the navigation menu
        $node = navigation_node::create(
            get_string('pluginname', 'local_blade_test'),
            new moodle_url('/local/blade_test/index.php'),
            navigation_node::TYPE_CUSTOM,
            null,
            'blade_test',
            new pix_icon('i/settings', '')
        );

        // Add the node to the "More" section of the navigation
        if ($navigation->get('root')) {
            $node->showinflatnavigation = true;
            $navigation->get('root')->add_node($node);
        }
    }
}

/**
 * Hook to extend the settings navigation.
 *
 * @param settings_navigation $settingsnav
 * @param context $context
 */
function local_blade_test_extend_settings_navigation(settings_navigation $settingsnav, context $context) {
    global $PAGE;

    // Only add settings link if user has the manage capability
    if (has_capability('local/blade_test:manage', $context)) {
        if ($settingnode = $settingsnav->find('siteadministration', navigation_node::TYPE_SITE_ADMIN)) {
            $pluginname = get_string('pluginname', 'local_blade_test');
            $url = new moodle_url('/local/blade_test/index.php');
            $node = navigation_node::create(
                $pluginname,
                $url,
                navigation_node::TYPE_SETTING,
                null,
                'blade_test',
                new pix_icon('i/settings', '')
            );

            if ($PAGE->url->compare($url, URL_MATCH_BASE)) {
                $node->make_active();
            }

            $settingnode->add_node($node);
        }
    }
}
