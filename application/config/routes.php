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
$route['default_controller'] = "home";
$route['404_override'] = ''; 
$route['tin-tuc'] = 'home/news'; 
$route['sp-(:any)'] = 'home/details/$1';
$route['sanpham'] = 'home/product';
$route['danh-muc-([a-zA-Z0-9_-]+)'] = 'home/categories/$1';
$route['danh-muc-(:any)'] = 'home/categories/$1';
$route['tim-kiem'] = 'home/search';
$route['tim-theo-gia/(:any)'] = "home/search_by_cost/$1";
$route['ban-chay'] = 'home/hotproduct';
$route['qua-tang'] = 'home/giftcard';
$route['gui-qua-thanh-cong/(:any)'] = 'home/successfull/$1';
$route['muc-tin-(:any)'] = "home/catenews/$1";
$route['tin-(:any)'] = "home/details_news/$1";
$route['dat-hang-(:any)'] = "home/buynow/$1"; 
//-------------Router for Admin 
$route['admincp/cateproduct'] = "categories";
$route['admincp/addcateproduct'] = "categories/create_new";

$route['admincp/emailconfig'] = "admin/mail";
$route['admincp/createuser'] = "admin/users/create_new";
$route['admincp/user'] = "admin/users";
$route['admincp/profile'] = "admin/users/profile";
//--------------------Media
$route['admincp/media'] = "admin/media";
$route['admincp/pictures'] = "admin/media/pictures";
$route['admincp/videos'] = "admin/media/video";
$route['admincp/videos/(:any)'] = "admin/media/video/$1";
$route['admincp/delete_media/(:any)'] = "admin/media/del_video/$1";
$route['admincp/media/delete_all'] = "admin/media/delete_all";

$route['admincp/media/delete/(:any)'] = "admin/media/del_catenews/$1"; 
$route['admincp/media/edit/(:any)'] = "admin/media/edit_catenews/$1"; 
$route['admincp/add_media'] = "admin/media/create_new";

//------------------Product
$route['admincp/product'] = "product";
$route['admincp/addproduct'] = "product/create_new";
$route['admincp/content'] = "news";
$route['admincp/addcontent'] = "news/create_new";
$route['admincp/adduser'] = "admin/users/create_new";
//--------------APP
$route['request-app'] = "admincp/requestapp";
$route['admincp/app'] = "admin/app";
$route['admincp/app/(:any)'] = "admin/app/index/$1";
$route['admincp/create_app'] = "admin/app/add_app";
$route['admincp/delete_app/(:any)'] = "admin/app/delete_app/$1";
$route['admincp/mobile'] = "admin/mobile/index";
 
//--------------CateAPP
$route['admincp/cateapp/(:any)'] = "admin/app/categories/$1";
$route['admincp/cateapp'] = "admin/app/categories";
$route['admincp/editcateapp/(:any)'] = "admin/app/details_cate/$1";
$route['admincp/delete_cateapp/(:any)'] = "admin/app/delete/$1";


//------------------HOME
$route['gioi-thieu'] = "home/aboutus";
$route['dang-ky'] = "admincp/register";
$route['dang-ky/(:any)'] = "admincp/register/$1";
$route['goi-gia'] = "home/cost";
$route['goi-dich-vu'] = "home/product";
$route['goi-dich-vu-(:any)'] = "home/details_services"; 
$route['lien-he'] = "home/contact";
$route['huong-dan'] = "home/blog"; 
$route['blog-(:any)'] = "home/details_blog/$1";
//$route['huong-dan'] = "home/support";
//$route['dang-ky/(:any)'] = "home/register/$1";
$route['dang-nhap'] = "admincp/login";
$route['dich-vu-san-pham'] = "product/app_video";

/* End of file routes.php */
/* Location: ./application/config/routes.php */