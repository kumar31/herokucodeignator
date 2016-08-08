<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

define('DOCTOR_PROFILE_PIC', "https://sh.bairo.co/appointments/img/doc_images/");
$profilepicuploadurl = $_SERVER['DOCUMENT_ROOT']."/appointments/img/doc_images/";
define('DOCTOR_PROFILE_PATH',$profilepicuploadurl );

define('PT_PROFILE_PIC', "https://sh.bairo.co/appointments/img/pt_images/");
$profilepicuploadurl = $_SERVER['DOCUMENT_ROOT']."/appointments/img/pt_images/";
define('PT_PROFILE_PATH',$profilepicuploadurl );

define('SITE_LOGO', "https://sm.bairo.co/restaurant/site_img/bairo-logo.png");
define('PATIENT_ICON', "https://sm.bairo.co/restaurant/site_img/patient_icon.png");

$hosp_server_url = $_SERVER['DOCUMENT_ROOT']."/restaurant/img/";
define('HOTEL_IMG_PATH',$hosp_server_url );

define('HOTEL_IMG', "https://sm.bairo.co/restaurant/img/");


/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */