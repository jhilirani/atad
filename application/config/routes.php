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

$route['default_controller'] = "index";
//$route['admin']="admin/index";
$route['about-us']="cms/about_atad";
$route['testimonial']="index/testimonial";
$route['our-vision']="cms/our_vision";
$route['privacy-policy']="cms/privacy_policy";
$route['terms-condition']="cms/terms_and_conditions";
$route['demo-schedules']="cms/demo_schedules";
$route['our-activity']="cms/our_activity";
$route['career-center']="cms/career_center";
$route['contact-us']="index/contact_us";
$route['contact-save']="index/contact_us_submit";
$route['press-release']="cms/press_release";
$route['photo']="index/photo";
$route['video']="index/video";
$route['team']="index/team";

$route['404_override'] = '';



/* End of file routes.php */
/* Location: ./application/config/routes.php */