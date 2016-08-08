<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['rooms/clear_patient/(:num)'] = "rooms/clear_patient/";  
$route['rooms/assign_patient/(:num)'] = "rooms/assign_patient/";  
$route['patients/upload_case_history/(:num)'] = "patients/upload_case_history/";  
$route['patients/delete_history/(:num)'] = "patients/delete_history/";  
$route['patients/upload_case_history/(:num)'] = "patients/upload_case_history/";  
$route['patients/patient_appointments/(:num)'] = "patients/patient_appointments/";  
$route['patients/change_appointment_status/(:num)/(:num)/(:any)'] = "patients/change_appointment_status/";  

$route['hospital_users/users_report/(:any)'] = "hospital_users/users_report/"; 
$route['hospital_users/users_changestatus/(:any)/(:any)/(:any)'] = "hospital_users/users_changestatus/"; 
$route['generate_report/(:any)'] = "generate_report"; 
$route['payment_report/(:any)'] = "payment_report"; 

$route['payments/update_paid/(:any)'] = "payments/update_paid/"; 



$route['reports/(:any)/(:any)'] = "reports";


/* End of file routes.php */
/* Location: ./application/config/routes.php */