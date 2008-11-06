<?php
/**
 * This page will either add or modify a booking
 * 
 * @author jberanek, Uwe L. Korn <uwelk@xhochy.org>
 * @package Schoorbs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License
 */

/// Includes ///

/** The Configuration file */
require_once 'config.inc.php';
/** The general 'things' when viewing Schoorbs on the web */
require_once 'schoorbs-includes/global.web.php';

/// Var Init ///

/** id **/
if(isset($_REQUEST['id'])) {
	$nId = intval($_REQUEST['id']);
} else {
	SchoorbsTPL::error(Lang::_('No entry id for editing was provided!'));
}

/// Main ///

// Only allow loged-in users to create a new entry.
if (!getAuthorised(1)) {
	showAccessDenied();
}

// Get the booking
$oEntry = Entry::getById($nId);

// Get all booking types 
$aTypes = array();
for ($c = 'A'; $c <= 'Z'; $c++) {
	if (isset($typel[$c]) && (!empty($typel[$c]))) {
		$aTypes[] = array('c' => $c, 'text' => $typel[$c]);
	}
}

SchoorbsTPL::populateVar('types', $aTypes);
SchoorbsTPL::populateVar('entry', $oEntry);
SchoorbsTPL::renderPage('edit-entry');
