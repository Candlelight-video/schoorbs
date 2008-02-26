<?php
/**
 * This file tests the getroomid REST-function
 * 
 * @author Uwe L. Korn <uwelk@xhochy.org>
 * @package Schoorbs-Test
 * @subpackage REST
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License
 */

## Defines ##

/**
 * Define that we are running Schoorbs without a GUI
 * 
 * @ignore
 */
define('SCHOORBS_NOGUI', true);

/**
 * Define that no HTTP headers should be sent when outputting a REST-result
 *
 * @ignore
 */
define('REST_NO_HEADERS', true);

## Main Schoorbs Code Includes ##

require_once dirname(__FILE__).'/../../schoorbs-includes/rest.functions.php';

## PHPUnit Includes ##
 
require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/Extensions/OutputTestCase.php';

## Test ##

/**
 * Testsuite for the getroomid REST-function
 * 
 * @package Schoorbs-Test
 * @subpackage REST
 * @author Uwe L. Korn <uwelk@xhochy.org>
 */ 
class REST_GetroomidTest extends PHPUnit_Extensions_OutputTestCase
{
	/**
	 * Setup the database tables
	 *
	 * @author Uwe L. Korn <uwelk@xhochy.org>
	 */
	protected function setUp()
	{
		DatabaseHelper::removeTestTables();
		DatabaseHelper::createTestTables();
		DatabaseHelper::flavourTblGlobals();
		$this->nArea = DatabaseHelper::addArea('test1');
		$this->sRoom = 'Test1';
		$this->sNonRoom = 'Test0';
		$this->nRoom = DatabaseHelper::addRoom($this->nArea, $this->sRoom, '', 2);
		
		// Start up the REST Output system
		InitRESTSmarty();
	}

	/**
	 * Test with an existing room
	 * 
	 * @author Uwe L. Korn <uwelk@xhochy.org>
	 */	
    public function testRoomExist()
    {
		unset($_GET['name']);
		unset($_POST['name']);
		unset($_REQUEST['name']);
		
		$_REQUEST['name'] = $this->sRoom;
		
		$this->expectOutputRegex('/<room_id>'.$this->nRoom.'<\/room_id>/');
		
		callRESTFunction('getRoomID');
    }
    
    /**
	 * Test with an non-existing room
	 * 
	 * @author Uwe L. Korn <uwelk@xhochy.org>
	 */	
    public function testRoomNonExist()
    {
		unset($_GET['name']);
		unset($_POST['name']);
		unset($_REQUEST['name']);
		
		$_REQUEST['name'] = $this->sNonRoom;
		
		$this->expectOutputRegex('/(<rsp)[\s]+(stat="fail">)/');
		$this->setExpectedException('Exception');
		
		callRESTFunction('getRoomID');
    }
}
