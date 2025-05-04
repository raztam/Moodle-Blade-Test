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
 * Main page for blade_test local plugin
 *
 * @package    local_blade_test
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once(__DIR__ . '/vendor/autoload.php');

// Check user is logged in and has capability
require_login();
$context = context_system::instance();
require_capability('local/blade_test:view', $context);

// Set up the page
$title = get_string('pluginname', 'local_blade_test');
$url = new moodle_url('/local/blade_test/index.php');

$PAGE->set_context($context);
$PAGE->set_url($url);
$PAGE->set_heading($title);

// Initialize the Blade template service
$blade = new \local_blade_test\blade_service();

// Prepare data for the template
$templatedata = [
    'title' => get_string('pluginname', 'local_blade_test'),
    'showmessage' => true,
    'message' => 'Blade is working successfully in Moodle!',
    'items' => [
        'This is the first item',
        'This is the second item',
        'This is the third item',
    ],
];

// Start output
echo $OUTPUT->header();

// Use Blade to render the template
echo $blade->render('example', $templatedata);

// Finish the page
echo $OUTPUT->footer();
