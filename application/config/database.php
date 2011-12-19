<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/
$url = (!empty($_SERVER['HTTPS'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['SERVER_NAME'];
if ($url == "localhost" || $url == "scooba.steve")
	$active_group = 'local';
else
	$active_group = 'server';
$active_record = TRUE;

$db['local']['hostname'] = 'localhost';
$db['local']['username'] = 'root';
$db['local']['password'] = 'root';
$db['local']['database'] = 'scooba_ci_portfolio';
$db['local']['dbdriver'] = 'mysql';
$db['local']['dbprefix'] = '';
$db['local']['pconnect'] = TRUE;
$db['local']['db_debug'] = TRUE;
$db['local']['cache_on'] = FALSE;
$db['local']['cachedir'] = '';
$db['local']['char_set'] = 'utf8';
$db['local']['dbcollat'] = 'utf8_general_ci';
$db['local']['swap_pre'] = '';
$db['local']['autoinit'] = TRUE;
$db['local']['stricton'] = FALSE;

$db['server']['hostname'] = 'mysql.scoobasteve.org';
$db['server']['username'] = 'cronin4392';
$db['server']['password'] = 'ak7xyb';
$db['server']['database'] = 'scooba_ci_portfolio';
$db['server']['dbdriver'] = 'mysql';
$db['server']['dbprefix'] = '';
$db['server']['pconnect'] = TRUE;
$db['server']['db_debug'] = TRUE;
$db['server']['cache_on'] = FALSE;
$db['server']['cachedir'] = '';
$db['server']['char_set'] = 'utf8';
$db['server']['dbcollat'] = 'utf8_general_ci';
$db['server']['swap_pre'] = '';
$db['server']['autoinit'] = TRUE;
$db['server']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */