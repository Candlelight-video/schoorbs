<?php
/**
 * Dummy authentication scheme, that accepts any user.
 * Useful for using Schoorbs without authentication,
 * or in combination with a session scheme that already enforces
 * its own authentication. For example that in IIS.
 * 
 * To use this authentication scheme set the following
 * things in config.inc.php:
 * $auth["type"]    = "none";
 * $auth["session"] = your choice
 * 
 * Then, you may configure admin users:
 * $auth["admin"][] = "nt_username1";
 * $auth["admin"][] = "nt_username2";
 * 
 * @author jberanek
 * @package Schoorbs/Auth/None
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License
 */

/** 
 * Checks if the specified username/password pair are valid.
 *
 * For this authentication scheme always validates.
 * 
 * @param   string  $user   The user name
 * @param   string  $pass   The password
 * @return  int             non-zero - Always valid
 */
function authValidateUser($user, $pass)
{
    return 1;
}

/**
 * Determines the user's access level
 * 
 * @return int The user's access level  
 * @param $user string The user name
 * @param $lev1_admin array
 */
function authGetUserLevel($user, $lev1_admin)
{
    // User not logged in, user level '0'
    if(!isset($user))
	return 0;
	
    // Check if the user is can modify
    for($i = 0; isset($lev1_admin[$i]); $i++)
    {
	if(strcasecmp($user, $lev1_admin[$i]) == 0)
	    return 2;
    }
	
    // Everybody else is access level '1'
    return 1;
}

