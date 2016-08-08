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

$route['default_controller'] = "login";
$route['404_override'] = '';

$route['client_dashboard/(:num)'] = "client_dashboard"; 
$route['talent_dashboard/(:num)'] = "talent_dashboard"; 
$route['talent_invited_view/(:num)'] = "talent_invited_view"; 
$route['myevents_client/(:num)'] = "myevents_client"; 
$route['myevents_client_closed/(:num)'] = "myevents_client_closed"; 
$route['client_proposals_pending/(:num)'] = "client_proposals_pending"; 
$route['client_proposals_hired/(:num)'] = "client_proposals_hired"; 
$route['event_detail/(:num)'] = "event_detail"; 
$route['edit_event/(:num)'] = "edit_event"; 
$route['event_detail_talent/(:num)'] = "event_detail_talent"; 
$route['pending_events_talent/(:num)'] = "pending_events_talent"; 
$route['event_detail_talent_invited/(:num)'] = "event_detail_talent_invited"; 
$route['event_detail_talent_pending/(:num)'] = "event_detail_talent_pending"; 
$route['event_detail_talent_confirmed/(:num)'] = "event_detail_talent_confirmed"; 
$route['client_proposals_applied/(:num)'] = "client_proposals_applied"; 
$route['talent_detail/(:any)'] = "talent_detail"; 
$route['talent_fill_timesheet/(:num)'] = "talent_fill_timesheet"; 
$route['client_verify_timesheet/(:num)'] = "client_verify_timesheet"; 
$route['client_timesheet_check/(:num)'] = "client_timesheet_check"; 
$route['project_details/(:num)'] = "project_details"; 
$route['event_detail/(:any)'] = "event_detail"; 
$route['manage_events/(:num)'] = "manage_events"; 
$route['management/(:num)'] = "management"; 
$route['event_detail_talent_closed/(:num)'] = "event_detail_talent_closed"; 
$route['client_update_payment_details/(:num)'] = "client_update_payment_details"; 
$route['talent_update_payment_details/(:num)'] = "talent_update_payment_details"; 
$route['invite_talent_search/(:num)'] = "invite_talent_search"; 
$route['admin_dashboard/(:num)'] = "admin_dashboard"; 
$route['event_type/(:num)'] = "event_type"; 
$route['agent_dashboard/(:num)'] = "agent_dashboard"; 
$route['agent_profile/(:num)'] = "agent_profile"; 
$route['agent_talents/(:num)'] = "agent_talents"; 
$route['admin_settings/(:num)'] = "admin_settings"; 
$route['contractor_pay/(:num)'] = "contractor_pay"; 




/* End of file routes.php */
/* Location: ./application/config/routes.php */