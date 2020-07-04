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
* Plugin administration pages are defined here.
*
* @package     local_privatefilemanager
* @category    admin
* @copyright   2018 Abhishek Karadbhuje <abhishek.karadbhuje@wisdmlabs.com>
* @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();
require_once(dirname(__FILE__).'/lib.php');

global $CFG, $COURSE, $DB, $PAGE;

$PAGE->requires->jquery();
$PAGE->requires->jquery_plugin('ui');
$PAGE->requires->jquery_plugin('ui-css');

$PAGE->requires->js(new moodle_url('/local/edwiserbridge/js/eb_settings.js'));
// $PAGE->requires->js_call_amd('local_edwiserbridge/eb_settings', 'init');



$ADMIN->add('modules', new admin_category('edwisersettings',
    new lang_string(
            'edwiserbridge',
            'local_edwiserbridge'
        )
    )
);

$ADMIN->add('edwisersettings', new admin_externalpage('edwiserbridge_conn_synch_settings',
        new lang_string(
            'nav_name',
            'local_edwiserbridge'
        ),
        // "$CFG->wwwroot/local/edwiserbridge/edwiserbridge.php?tab=connection",
        "$CFG->wwwroot/local/edwiserbridge/edwiserbridge.php?tab=settings",
        array(
            'moodle/user:update',
            'moodle/user:delete'
        )
    )
);


// In every plugin there is one if condition added please check it.
$settings = new admin_settingpage('edwiserbridge_settings', new lang_string('pluginname', 'local_edwiserbridge'));
$ADMIN->add('localplugins', $settings);


// $existing_services = eb_get_existing_services();

//$name, $visiblename, $description, $defaultsetting, $choices
$settings->add(new admin_setting_configselect(
    "local_edwiserbridge/ebexistingserviceselect",
    new lang_string('existing_serice_lbl', 'local_edwiserbridge'),
    get_string('existing_service_desc', 'local_edwiserbridge'),
    '',
    array()
));
