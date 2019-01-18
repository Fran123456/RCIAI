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
$route['default_controller'] = 'login_Controller';
$route['dashboard'] = 'dashboard_Controller';
$route['profile'] = 'profile_Controller';
$route['profile-edit'] = 'profile_Controller/ViewProfileEdit';
$route['users'] = 'profile_Controller/users';
$route['password'] = 'profile_Controller/passwordShow';
$route['password-change'] = 'profile_Controller/UpdatePassword';
$route['profile-change'] = 'profile_Controller/UpdateProfile';
$route['news'] = 'news_Controller';
$route['news-add'] = 'news_Controller/sendMessage';
$route['notifications/(:any)'] = 'news_Controller/showNotification/$1';
$route['notifications'] = 'news_Controller/allNotificationsRead';
$route['password-recovery'] = 'login_Controller/showPasswordRecovery';
$route['password-recovery-sending-mail'] = 'login_Controller/email';
$route['password-update'] = 'login_Controller/tokenRecive';
$route['404_override'] = '';



$route['shopping'] = 'shopping_Controller';
$route['showUnidades'] = 'shopping_Controller/showUnidadesAjax';
$route['shopping-adding'] = 'shopping_Controller/BuyCaso1';
$route['shopping-success'] = 'shoppingAdd_Controller/add_';
$route['shopping-service'] = 'shoppingService_Controller';
$route['service-adding'] = 'shoppingService_Controller/add__';
$route['adduser']='profile_Controller/addUserAjax';
$route['edituser']='profile_Controller/editUserAjax';
$route['updateuser']='profile_Controller/updateUserAjax';
$route['deleteuser']='profile_Controller/deleteUserAjax';


//compra para un elemento sin aumento
$route['shopping-others'] = 'BUY_Controller/indexComplement';


//-----------------------------
$route['shopping-admin'] = 'shopping/index';
$route['showcompras'] = 'shopping/showComprasAjax';
$route['editcompra'] = 'shopping/editComprasAjax';


$route['bodega-add'] = 'AddBodega_Controller/add_PC';
//sin compra para administracion
$route['get-element'] = 'AddAdmin_Controller/add_PC';
$route['element-add'] = 'AddAdmin_Controller/validate_buy';



//compras nuevas y asignadas 18/10/2018 - RUTAS HECHAS POR FRANCISCO NAVAS
$route['add-buy'] = 'BUY_Controller';
$route['addbuy'] = 'BUY_Controller/addbuy';
$route['show-pc-buy/(:any)'] = 'BUY_Controller/show_pc/$1';
$route['add-element-buy'] = 'BUY_elements_Controller/add_PC';

$route['validate-buy'] = 'BUY_elements_Controller/validate_buy';
//compras nuevas y asignadas 18/10/2018 - RUTAS HECHAS POR FRANCISCO NAVAS

//ruta de compras pendiente 23/10/2018 - Ruta hecha por Enrique Quezada
$route['compras-pendientes'] = 'compra_pendiente/mostrarPendiente';
//ruta de compras pendiente 23/10/2018

$route['shopping-services'] = 'services_C/index';
$route['showservices'] = 'services_C/showServicesAjax';
$route['editservices'] = 'services_C/editServicesAjax';

$route['adduser']='profile_Controller/addUserAjax';
$route['edituser']='profile_Controller/editUserAjax';
$route['updateuser']='profile_Controller/updateUserAjax';
$route['deleteuser']='profile_Controller/deleteUserAjax';

$route['pagina/compra/(:any)'] = 'shopping/index/$1';
$route['pagina/compra'] = 'shopping/index';
$route['mostrar/(:any)']='shopping/mostrar/$1';

$route['pagina/servicio/(:any)'] = 'services_C/index/$1';
$route['pagina/servicio'] = 'services_C/index';
$route['mostrar/(:any)']='services_C/mostrar/$1';

#rutas para administrativo
$route['mantenimiento-administrativo'] = 'administrativo_Controller/index';


$route['software-administrativo'] = 'administrativo_Controller/mostrarEquipo';
$route['agregar-sw'] = 'administrativo_Controller/guardar';
$route['eliminar-sw'] = 'administrativo_Controller/deleteSoftware';
$route['editar-software'] = 'administrativo_Controller/editSoftware';
$route['eliminar_todoAdm'] = 'administrativo_Controller/deleteAll';
$route['actualizar-sw'] = 'administrativo_Controller/updateSoftware';

//rutas agregadas 18/10/2018 por Enrique
$route['sotfware/(:any)/(:any)']  = 'administrativo_Controller/mostrarSW/$1/$2';
$route['areas-administrativas'] = 'administrativo_Controller/mostrarAreas';
#$route['listado-elementos/(:any)'] = 'administrativo_Controller/mostrarAll/$1';
$route['listado-elementos/(:any)'] = 'administrativo_Controller/mostrarElementos/$1';
$route['listado/(:any)/(:any)'] = 'administrativo_Controller/mostrarAll/$1/$2';
$route['detalle/(:any)/(:any)'] = 'administrativo_Controller/detalle/$1/$2';
$route['administrativo/(:any)'] = 'administrativo_Controller/detalle';
//$route['detalle']


#Rutas para laboratorios
$route['add-PC-laboratorios'] = 'laboratorios_Controller';
$route['laboratorio-PC-add'] = 'laboratorios_Controller/resource_PC';
$route['laboratorio-PC-Success'] = 'laboratoriosAdd_Controller/add__';
$route['add-buy-lab'] = 'laboratoriosBUY_Controller';
$route['addbuy-labo'] = 'laboratoriosBUY_Controller/addbuy';
//$route['show-pc-buy/(:any)'] = 'laboratoriosBUY_Controller/show_pc/$1';

$route['add-PC-laboratorios-buy'] = 'BUY_laboratorios_Controller/add_PC';
$route['laboratorio-PC-add-buy'] = 'BUY_laboratorios_Controller/resource_PC';
$route['laboratorio-PC-Success-buy'] = 'BUY_laboratoriosAdd_Controller/add__';

//$route['validate-buy'] = 'BUY_laboratorios_Controller/validate_buy';




#bodega
$route['inventario-bodega'] = 'bodega_Controller/index';
$route['add-bodega'] = 'bodega_Controller/show_add_bodega';
$route['add-periferico'] = 'bodega_Controller/add_periferito_to_Bodega';
$route['validar-periferico/(:any)'] = 'bodega_Controller/validar_elemento';
$route['validar-pc/(:any)'] = 'bodega_Controller/asignar_pc_View';
$route['validar-DDE/(:any)'] = 'bodega_Controller/asignar_dde_View';
$route['validar-laptop/(:any)'] = 'bodega_Controller/asignar_laptop_View';
$route['validar-otro/(:any)'] = 'bodega_Controller/asignar_otro_View';

$route['asignar-otro/(:any)'] = 'bodega_Controller/asignar_otro_pc_View';


$route['validar-cpu/(:any)'] = 'Sustitucion_Controller/vista_cpu_sustituir';
$route['validar-cpu-lab/(:any)'] = 'Sustitucion_Controller/vista_cpu_sustituir_lab';


$route['get_pcs'] = 'bodega_Controller/showCodePC';
//$route['asignar-periferico/(:any)'] = 'bodega_Controller/asignar_elemento';



$route['move'] = 'bodega_Controller/catch_asignacion';
$route['move-pc'] = 'bodega_Controller/catch_asignacion_pc';
$route['move-DDE'] = 'bodega_Controller/catch_asignacion_dde';
$route['move-laptop'] = 'bodega_Controller/catch_asignacion_laptop';
$route['move-otro'] = 'bodega_Controller/catch_asignacion_otro';

$route['computadoras-disponibles'] = 'bodega_Controller/pc_disponible';

$route['cpu-disponibles'] = 'bodega_Controller/cpu_disponibles';


#Rutas para bodega
$route['elementos-disponibles'] = 'bodega_Controller/mostrar_disponible/$1';

$route['laptops-disponibles'] = 'bodega_Controller/laptop_disponible';
$route['DDE-disponibles'] = 'bodega_Controller/dde_disponible';
$route['otros-disponibles'] = 'bodega_Controller/otros_disponible';

$route['cambiarpass'] = 'profile_Controller/cambiar_pass';

#rutas para los laboratorios
//muestra los equipos en los lab
$route['equipos/(:any)'] = 'lab_lista_Controller/index/$1';
$route['agregar'] = 'lab_lista_Controller/guardar';
$route['eliminar'] = 'lab_lista_Controller/deleteSoftware';
$route['editar-software'] = 'lab_lista_Controller/editSoftware';
$route['actualizar-software'] = 'lab_lista_Controller/updateSoftware';
$route['eliminar_todo'] = 'lab_lista_Controller/deleteAll';

$route['detalle-lab/(:any)'] = 'lab_lista_Controller/detalle/$1';
$route['redireccionar'] = 'lab_lista_Controller/redireccionar/$1';

$route['prestamos'] = 'lab_lista_Controller/prestamos';

$route['translate_uri_dashes'] = FALSE;

////////////////////////////////////////////////////////////////////////////////////////////
#Rutas para Movimientos
$route['movimientos'] = 'Movimientos_controller/index';
$route['listado-asignaciones'] = 'Movimientos_controller/asignaciones';
$route['detalle-asignacion/(:any)'] = 'Movimientos_controller/detalleAsignacion/$1';
$route['listado-prestamos'] = 'Movimientos_controller/prestamos';
$route['listado-sustituciones'] = 'Movimientos_controller/sustituciones';
$route['detalle-sustitucion/(:any)'] = 'Movimientos_controller/detalleSustitucion/$1';
$route['detalle-prestamo/(:any)'] = 'Movimientos_controller/detallePrestamo/$1';

//prestamos
$route['prestamo'] = 'Movimientos_controller/hacer_prestamos';
$route['verificar'] = 'Movimientos_controller/verificar_codigo';



//SUSTITUCION RUTAS
$route['remove-periferico/(:any)'] = 'Sustitucion_Controller/vista_sustituir_periferico/$1';
$route['Sustituir-periferico'] = 'Sustitucion_Controller/perifericos_disponible';

$route['Sustituir-periferico-code'] = 'Sustitucion_Controller/perifericos_disponible_code';
$route['remove-periferico-code/(:any)'] = 'Sustitucion_Controller/vista_sustituir_periferico_code/$1';
$route['remove-periferico-code-unidad/(:any)'] = 'Sustitucion_Controller/vista_sustituir_periferico_code_unidad/$1';


$route['sustituir-laptop/(:any)'] = 'Sustitucion_Controller/vista_laptop_sustituir/$1';


$route['remove-periferico-lab/(:any)'] = 'Sustitucion_Controller/vista_sustituir_periferico_lab/$1';
$route['Sustituir-periferico'] = 'Sustitucion_Controller/perifericos_disponible';


//HARDWARE
$route['adaptadores-red'] = 'Hardware_Controller/adaptadores_all';
$route['adaptadores-red/edit-red/(:any)'] = 'Hardware_Controller/adaptadores_edit/$1';


$route['adaptadores-video'] = 'Hardware_Controller/video_all';
$route['adaptadores-video/edit-video/(:any)'] = 'Hardware_Controller/video_edit/$1';


$route['almacenamiento'] = 'Hardware_Controller/almacenamiento_all';
$route['almacenamiento/edit-almacenamiento/(:any)'] = 'Hardware_Controller/almacenamiento_edit/$1';


$route['sistema'] = 'Hardware_Controller/sistema_all';
$route['sistema/edit-sistema/(:any)'] = 'Hardware_Controller/sistema_edit/$1';

$route['componentes'] = 'Hardware_Controller/componentes_all';
$route['componentes/edit-componentes/(:any)'] = 'Hardware_Controller/componentes_edit/$1';

//FORMULARIO DE MOVIMIENTOS..
$route['formulario-movimientos'] = 'form_Controller/index';

//Consultas
$route['detalle-equipo'] = 'Consultas_Controller/vista_detalle_equipo';
$route['get_detalle'] = 'Consultas_Controller/get_detalle';
$route['get_perifericos'] = 'Consultas_Controller/get_perifericos';
$route['adm_software'] = 'Consultas_Controller/adm_software';
$route['lab_software'] = 'Consultas_Controller/lab_software';

$route['detalle-unidad'] = 'Consultas_Controller/vista_detalle_unidad';
$route['get_detalle_unidad'] = 'Consultas_Controller/get_detalle_unidad';

$route['detalle-compras'] = 'Consultas_Controller/vista_detalle_compra';


//devoluciones :v

$route['Devoluciones-list'] = 'Devoluciones_Controller/index';
$route['retornar/(:any)'] = 'Devoluciones_Controller/regreso/$1';
$route['asignar-prestamo/(:any)'] = 'Devoluciones_Controller/no_regreso/$1';
$route['asignar-prestamo/(:any)'] = 'Devoluciones_Controller/no_regreso/$1';



//REPORTERIA FINAL MODULO :')
$route['reporteria'] = 'dashboard_Controller/panel_report';
$route['error-404-reporteria'] = 'Reporte8_controller/error_message__';
$route['error-404-reporteria-11'] = 'Reporte11_controller/error_message__';



//No es de lo que nos pidieron 
//pero hay que hacerlo :( 
//Sub-rama de eliminar elementos con 
//estado Desechado. Desechado
$route['Eliminar-bodega'] = 'Desecho_Controller/index';
$route['EliminarElemento/(:any)'] = 'Desecho_Controller/EliminarElemento/$1';


//faltaba aun :c ya en las ultimas
//AUDIOVISUALES --> remendado 
$route['Audiovisuales-teclados'] = 'AudioVisualesController/teclados';
$route['Audiovisuales-teclados-agregar'] = 'AudioVisualesController/teclados_add';
$route['Audiovisuales-teclados-eliminar/(:any)'] = 'AudioVisualesController/teclado_delete/$1';
$route['Audiovisuales-teclados-edit/(:any)'] = 'AudioVisualesController/teclado_edit/$1';



$route['Audiovisuales-mouses'] = 'AudioVisualesController/mouses';
$route['Audiovisuales-mouses-agregar'] = 'AudioVisualesController/mouses_add';
$route['Audiovisuales-mouses-eliminar/(:any)'] = 'AudioVisualesController/mouse_delete/$1';
$route['Audiovisuales-mouses-edit/(:any)'] = 'AudioVisualesController/mouse_edit/$1';


//ultimas rutas del proyecto wii (∪ ◡ ∪)
$route['Audiovisuales-cpus'] = 'AudioVisualesController/cpus';
$route['Audiovisuales-cpus-agregar'] = 'AudioVisualesController/cpus_add';
$route['Audiovisuales-cpus-eliminar/(:any)'] = 'AudioVisualesController/cpu_delete/$1';
$route['Audiovisuales-cpus-edit/(:any)'] = 'AudioVisualesController/cpu_edit/$1';
$route['Audiovisuales-cpus-show/(:any)'] = 'AudioVisualesController/cpu_show/$1';

