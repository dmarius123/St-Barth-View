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

$route['default_controller'] = 'home';
$route['404_override'] = '';

// User
$route['user'] = 'user/signIn';
$route['user/redirect'] = 'user/signIn/redirect';
$route['user/validate/(:any)'] = 'user/signIn/validate';
$route['user/reset-password'] = 'user/signIn/resetPassword';
$route['user/new-password'] = 'user/signIn/newPassword';
$route['user/sign-up'] = 'user/signUp';
$route['user/sign-up/complete'] = 'user/signUp/complete';
$route['user/sign-out'] = 'user/signIn/signOut';
$route['user/profile/uploadify/(:any)'] = 'user/profile/uploadify';
$route['user/reward-points'] = 'user/rewardPoints';
$route['user/reward-points/content'] = 'user/rewardPoints/content';

// Offers
$route['offer/(:any)'] = 'offers/offer';

// Pages
$route['who-we-are'] = 'pages/whoWeAre';
$route['commitments'] = 'pages/commitments';
$route['contact-us'] = 'pages/contactUs';

$route['faq'] = 'pages/faq';
$route['useful-information'] = 'pages/usefulInformation';
$route['sitemap'] = 'pages/sitemap';

$route['terms'] = 'pages/terms';
$route['security'] = 'pages/security';

/* End of file routes.php */
/* Location: ./application/config/routes.php */