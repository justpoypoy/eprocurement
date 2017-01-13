<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Dashboard';

$route['halaman-utama'] = 'Dashboard';

$route['data-barang'] = 'Barang';
$route[''] = '';
$route[''] = '';
$route['request-barang'] = 'Barang/requestBarang';
$route['tambah-request-barang'] = 'Barang/tambahRequestBarang';
$route['data-pembelian/?(:num)?'] = 'Barang/pembelianRequest/$1';
$route['tambah-beli-barang/?(:num)?/?(:num)?'] = 'Barang/pembelianRequest/$1/$2';




$route['register-supplier'] = 'Login/register';
$route['form-register'] = 'Login/act_register';


$route['tambah-barang'] = 'Barang/addBarang';
$route['data-request-barang'] = 'Barang/dataRequest';
$route['send-request/?(:any)?'] = 'Barang/sendRequest/$1';
$route['detail-request/?(:num)?'] = 'Barang/detailRequest/$1';
$route['approve-request/?(:num)?'] = 'Barang/approveRequest/$1';
$route['reject-request/?(:num)?'] = 'Barang/rejectRequest/$1';
$route['data-beli-barang/?(:any)?'] = 'Barang/dataBeli/$1';
$route['data-laporan'] = 'Barang/dataLaporan';
$route['cetak-laporan/?(:any)?'] = 'Barang/cetakLaporan/$1';



$route['form-request'] = 'Barang/dataForSupplier';
$route['form-input-harga/?(:any)?'] = 'Barang/inputHargaSupplier/$1';
$route['kirim-harga'] = 'Barang/inputHargaSupplier';
$route['approve-beli'] = 'Barang/approveBeli';



$route['sign-out'] = 'Login/logout';
$route['sign-in'] = 'Login/form';
$route['menu-login'] = 'Login';

$route['hapus-supplier/?(:num)?'] = 'Supplier/deleteSupplier/$1';
$route['rubah-supplier/?(:num)?'] = 'Supplier/editSupplier/$1';
$route['tambah-supplier'] = 'Supplier/addSupplier';
$route['data-supplier'] = 'Supplier';

$route['hapus-gudang/?(:num)?'] = 'Gudang/deleteGudang/$1';
$route['rubah-gudang/?(:num)?'] = 'Gudang/editGudang/$1';
$route['tambah-gudang'] = 'Gudang/addGudang';
$route['data-gudang'] = 'Gudang';

$route['cek-username'] = 'User/cekUsername';
$route['tambah-user'] = 'User/addUser';
$route['hapus-user/?(:any)?'] = 'User/deleteUser/$1';
$route['rubah-user/?(:any)?'] = 'User/editUser/$1';
$route['data-user'] = 'User';

$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
