<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrativo_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('dashboard_Model');
		$this->load->model('administrativo_Model','adm');
		require 'application/plus/noty.php';

	}

	public function index(){
		/*$registro['registro'] = $this->showRegistro();#traemos los registros de inventario_adm para mostrarlos en la vista en una tabla
		$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);*/

		//vamos a mostrar el nav para administrativo
		//modificado por Enrique el 18/10/2018
		//$this->load->view('Dashboard/administrativo/nav_administrativo');
		$this->mostrarAreas();
	}



///////////////////////////////////////////////////////////////////////////////////////
	#controladore de Enrique
	// fecha 18/10/2018
	//función que nos servira para mostrar todos los elementos de un area especifica o en general
	public function mostrarAll($op,$tipo){
		//hacemos un switch para ver que mensaje mandar segun la opcion enviada y que vista poder cargar
		//asi como mandar el registro obtenido del modelo
		switch ($op) {

			case 'bodega_informatica':
				$unidad = 1;
				$registro['mensaje'] = "Listado de equipos en Bodega de informática";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}


				break;
			case 'academica':
				$unidad = 2;
				$registro['mensaje'] = "Listado de equipos en Academica";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'gerencia_general':
				$unidad = 3;
				$registro['mensaje'] = "Listado de equipos en Gerencia general";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'contabilidad':
				$unidad = 5;
				$registro['mensaje'] = "Listado de equipos en Contabilidad";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'RRHH':
				$unidad = 6;
				$registro['mensaje'] = "Listado de equipos en RRHH";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'planificacion':
				$unidad = 7;
				$registro['mensaje'] = "Listado de equipos en Planificación";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'biblioteca':
				$unidad = 8;
				$registro['mensaje'] = "Listado de equipos en Biblioteca";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'ICTUSAM':
				$unidad = 9;
				$registro['mensaje'] = "Listado de equipos en ICTUSAM";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'medicina':
				$unidad = 10;
				$registro['mensaje'] = "Listado de equipos en Medicina";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'proyeccion_social':
				$unidad = 11;
				$registro['mensaje'] = "Listado de equipos en Proyección social";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'extension_cultural':
				$unidad = 12;
				$registro['mensaje'] = "Listado de equipos en Extensión cultural";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'colecturia':
				$unidad = 13;
				$registro['mensaje'] = "Listado de equipos en Colecturia";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'secretaria_general':
				$unidad = 14;
				$registro['mensaje'] = "Listado de equipos en Secretaria General";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'egresados_graduados':
				$unidad = 15;
				$registro['mensaje'] = "Listado de equipos en Egresados y graduados";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'ultrasonografia':
				$unidad = 16;
				$registro['mensaje'] = "Listado de equipos en Ultrasonografia";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'rectoria_vicerrectoria':
				$unidad = 17;
				$registro['mensaje'] = "Listado de equipos en Rectoria y Vicerrectoria";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'decanato_jurisprudencia':
				$unidad = 18;
				$registro['mensaje'] = "Listado de equipos en Decanato de jurisprudencia";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'odontologia':
				$unidad = 19;
				$registro['mensaje'] = "Listado de equipos en Odontologia";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'veterinaria':
				$unidad = 20;
				$registro['mensaje'] = "Listado de equipos en Veterinaria";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'quimica_farmacia':
				$unidad = 21;
				$registro['mensaje'] = "Listado de equipos en Quimica y farmacia";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'gestion_educativa':
				$unidad = 22;
				$registro['mensaje'] = "Listado de equipos en Gestión educativa";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'control_calidad':
				$unidad = 23;
				$registro['mensaje'] = "Listado de equipos en Control de calidad";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'ciencias_empresariales':
				$unidad = 24;
				$registro['mensaje'] = "Listado de equipos en Ciencias empresariales";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'informatica':
				$unidad = 25;
				$registro['mensaje'] = "Listado de equipos en Informática";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'relaciones_publicas':
				$unidad = 26;
				$registro['mensaje'] = "Listado de equipos en Relaciones públicas";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'fiscalia':
				$unidad = 28;
				$registro['mensaje'] = "Listado de equipos en Fiscalia";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'URNI':
				$unidad = 29;
				$registro['mensaje'] = "Listado de equipos en URNI";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'enfermeria':
				$unidad = 30;
				$registro['mensaje'] = "Listado de equipos en Enfermeria";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'CEFADE':
				$unidad = 31;
				$registro['mensaje'] = "Listado de equipos en CEFADE";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'OFAL':
				$unidad = 32;
				$registro['mensaje'] = "Listado de equipos en OFAL";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'almacen_bodega':
				$unidad = 33;
				$registro['mensaje'] = "Listado de equipos en Almacen y bodega";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'celula_quimica':
				$unidad = 34;
				$registro['mensaje'] = "Listado de equipos en Celula de quimica";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'USAID':
				$unidad = 35;
				$registro['mensaje'] = "Listado de equipos en Proyecto USAID";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'otros_proyectos':
				$unidad = 36;
				$registro['mensaje'] = "Listado de equipos en Otros proyectos";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
			case 'general':
				$unidad = 37;
				$registro['mensaje'] = "Listado General de los equipos";
				$registro['registro'] = $this->adm->showregistro($unidad,$tipo);
				if($tipo == 'DD' || $tipo == 'UP' || $tipo == 'AP' || $tipo == 'WE' || $tipo == 'IM'){
					$this->load->view('Dashboard/administrativo/inventario_adm_DDE',$registro);
				}else{
					$this->load->view('Dashboard/administrativo/inventario_adm_mantenimiento',$registro);
				}

				break;
		}//fin del switch

		//$registro['registro'] = $this->adm->showregistro($unidad,$tipo);#traemos los registros de inventario_adm para mostrarlos en la vista en una tabla
	}//fin de mostrarAll

	#función que sirve para hacer la conversión del nombre de la unidad
	public function nomUnidad($unidad){
		switch ($unidad) {
			case 'academica':
				return 'Academica';
				break;
			case 'gerencia_general':
				return 'Gerencia General';
				break;
			case 'contabilidad':
				return 'Contabilidad';
				break;
			case 'RRHH':
				return 'RRHH';
				break;
			case 'planificacion':
				return 'Planificacion';
				break;
			case 'biblioteca':
				return 'Biblioteca';
				break;
			case 'ICTUSAM':
				return 'ICTUSAM';
				break;
			case 'medicina':
				return 'Medicina';
				break;
			case 'proyeccion_social':
				return 'Proyeccion Social';
				break;
			case 'extension_cultural':
				return 'Extensión Cultural';
				break;
			case 'colecturia':
				return 'Colecturia';
				break;
			case 'secretaria_general':
				return 'Secretaria General';
				break;
			case 'egresados_graduados':
				return 'Egresados y Graduados';
				break;
			case 'ciencias_empresariales':
				return 'Ciencias Empresariales';
				break;
			case 'rectoria_vicerrectoria':
				return 'Rectoria y Vicerrectoria';
				break;
			case 'decanato_jurisprudencia':
				return 'Decanato de Jurisprudencia';
				break;
			case 'odontologia':
				return 'Odontologia';
				break;
			case 'veterinaria':
				return 'Veterinaria';
				break;
			case 'quimica_farmacia':
				return 'Química y Farmacia';
				break;
			case 'gestion_educativa':
				return 'Gestión Educativa';
				break;
			case 'control_calidad':
				return 'Control de calidad';
				break;
			case 'ultrasonografia':
				return 'Ultrasonografia';
				break;
			case 'informatica':
				return 'Informática';
				break;
			case 'relaciones_publicas':
				return 'Relaciones Públicas';
				break;
			case 'fiscalia':
				return 'Fiscalia';
				break;
			case 'bodega_informatica':
				return 'bodega de informatica';
				break;
			case 'URNI':
				return 'URNI';
				break;
			case 'enfermeria':
				return 'Enfermeria';
				break;
			case 'CEFADE':
				return 'CEFADE';
				break;
			case 'OFAL':
				return 'OFAL';
				break;
			case 'almacen_bodega':
				return 'Almacen y Bodega';
				break;
			case 'celula_quimica':
				return 'Celula de Quimica';
				break;
			case 'USAID':
				return 'Proyecto USAID';
				break;
			case 'otros_proyectos':
				return 'Otros proyectos';
				break;
			case 'general':
				return 'Listado General administrativo';
				break;
		}

	}//fin de nomUnidad




	#esta función sirve para poder mostrar la vista con los elementos PC,laptop,DDE de una unidad o area administrativa
	public function mostrarElementos($unidad){
		$datos['msj'] = $this->nomUnidad($unidad);
		$datos['unidad'] = $unidad;
		$this->load->view('Dashboard/administrativo/elementos_areas',$datos);
	}

	// fecha 18/10/2018
	//esta función nos mostrara la vista con el listado de las areas administrativas
	public function mostrarAreas(){
		$this->load->view('Dashboard/administrativo/areas_adm');
	}

	#función que va redirigir la vista de sw a detalle por medio del id
	public function direccion($id){
		$unidad = $this->adm->getUnidad($id);
		$this->detalle($id,$unidad);
	}

	#función para obtener los datos de un registro especifico y mostrarlos en su respectiva vista de detalle
	public function detalle($id,$unidad){
		#identificamos si es una PC,LAPTOP,SERVIDOR,DISCO DURO EXTRAIBLE
		$cad=substr($id,0,2);#hacemos un sub string con las dos primeras letras del identificador de inventario_adm
		$data['unidad']=$unidad;
		/*vamos a realizar un switch dependiendo si es PC,LAPTOP,SERVIDOR,DISCO DURO EXTRAIBLE, se haran las consultas
		y cargas a las vista respectiva*/
		switch ($cad) {
				#para una laptop
				case 'LA':
					$data['detalle'] = $this->consultarRegistro($id);
					$data['software'] = $this->adm->getSoftware($id);
					$data['equipo'] = $cad;
					$this->load->view('Dashboard/administrativo/detalle_lap',$data);
					break;
				#para una PC y Servidor
				case 'PC':

				case 'SV':
					$data['equipo'] = $cad;
					$data['detalle'] = $this->consultarRegistro($id);
					$data['software'] = $this->adm->getSoftware($id);
					$periferico_AD = $this->adm->getperifericos_ad($id);
					$data['perifericosAD'] = $periferico_AD;
					$this->load->view('Dashboard/administrativo/detalle_adm',$data);
					break;
				#para discos duros externos, UPS, Access Point, Webcam, impresoras
				case 'DD':
				case 'UP':
				case 'AP':
				case 'WE':
				case 'IM':
					$data['equipo'] = $cad;
					$data['msj'] = $this->TipoPeriferico($cad);
					$resultado = $this->adm->getDetallePeriferico($id);
					if($resultado){
					//vamos a obtener las unidades
						foreach ($resultado as $u) {
							$origen = $this->adm->getOrigen_destino($u->origen);
							$u->origen = $origen;
							$destino = $this->adm->getOrigen_destino($u->destino);
							$u->destino = $destino;
						}
					}

					$data['detalle'] = $resultado;
					$this->load->view('Dashboard/administrativo/detalle_periferico',$data);
					break;

				default:

					break;
			}#fin del switch

	}//fin de detalle

	#esta función mandara un msj dependiento el tipo de elemento de periferico a mostrar
	public function TipoPeriferico($tipo){
		#se evalua si es una impresora,ups, access point, web cam o DDE
		switch ($tipo) {
			case 'DD':
				$msj = "Disco Duro Externo";
				break;
			case 'UP':
				$msj = "UPS";
				break;
			case 'AP':
				$msj = "Access Point";
				break;
			case 'WE':
				$msj = "Web Cam";
				break;
			case 'IM':
				$msj = "Impresora";
				break;
		}
		return $msj;
	}

	#esta funcion nos permite obtener los registros
	public function consultarRegistro($id){
		$resultado = $this->adm->getRegistro($id);

		if($resultado){
			//vamos a obtener las unidades
			foreach ($resultado as $u) {
				$origen = $this->adm->getOrigen_destino($u->origen);
				$u->origen = $origen;
				$destino = $this->adm->getOrigen_destino($u->destino);
				$u->destino = $destino;
			}
			return $resultado;
		}else{
			return false;
		}
	}//fin de consultarRegistro($id)


	#metodo para poder visualizar el software instalado en la pc
	public function mostrarEquipo(){
		#metodo en el modelo que me traera los
		$result= $this->adm->getEquipos();
		$dato['registro'] = $result;
		//var_dump($result);
		$this->load->view('Dashboard/administrativo/adm_sw',$dato);
	}#fin de mostrarSW

	//función que muestra el sw de cada equipo de un área
	public function mostrarSW($id,$destino){
		#vamos a verificar que tipo de elemento es
		$cad=substr($id,0,2);
		$data['unidad'] =$cad;
		$data['destino'] = $destino;
		$data['software'] = $this->adm->getSoftware($id);
		$this->session->set_flashdata('url',$id);
		$this->load->view('Dashboard/administrativo/software',$data);

	}# fin de mostrarSW

	public function SW($id){
		$data['software'] = $this->adm->getSoftware($id);
		$this->session->set_flashdata('url',$id);
		$this->load->view('Dashboard/administrativo/softwareGeneral',$data);
	}# fin de mostrarSW


	//función para eliminar el software
	public function deleteSoftware(){
		//vamos a llamar la función del modelo que nos eliminara el software seleccionado
		$id=$this->input->post('valor');
		$pc=$this->adm->equipo_id($id);
		$area = $this->input->post('area');

		$result = $this->adm->deleteSoftware($id);

         //$result=true;
		if($result){

			$this->session->set_flashdata('Exitos','El elemento ha sido eliminado ');
			redirect(base_url().'sotfware/'.$pc[0]['pc_id'].'/'.$area);
			//return true;
			//$this->editarLab($lab);
		}else{
			//return false;
			$this->session->set_flashdata('Errors','El elemento no ha podido ser eliminado ');
			redirect(base_url().'sotfware/'.$pc[0]['pc_id'].'/'.$area);
		}
	}//fin de deleteSoftware

	//función para poder editar el software
	public function editSoftware(){
		$id = $this->input->post('id');
		//$id = filter_input(INPUT_POST,'id');var_dump($id);
		$data = $this->adm->edit($id);

		echo json_encode($data);
	}//fin de la función editSoftware

	//función para poder eliminar todos los registros del software de una PC
	public function deleteAll(){
		//capturamos el id que es el identificador de esa pc
		$id = $this->input->post('id');
		$area = $this->input->post('area');
		//llamamos a la función en el modelo que nos eliminara todo el software
		$result = $this->adm->deleteAll($id);

		if($result){

			$this->session->set_flashdata('Exitos','El elemento ha sido eliminado ');
			redirect(base_url().'sotfware/'.$id.'/'.$area);
			//redirect(base_url().'administrativo_Controller/mostrarSW/'.$id);
			//return true;
			//$this->editarLab($lab);
		}else{
			//return false;
			$this->session->set_flashdata('Errors','El elemento no ha podido ser eliminado ');
			redirect(base_url().'sotfware/'.$id.'/'.$area);
		}
	}

	//función para poder guardar software
	public function guardar(){

		$id= $this->session->flashdata('url');

		$descripcion = $this->input->post('descripcion');
		$version = $this->input->post('version');
		$area = $this->input->post('area');

		//vamos a agregar esos elementos a el software
		$valores = array(
			'pc_id' => $id,
			'nombre' => $descripcion,
			'version' => $version

		);

		//hacemos la consulta
		$result = $this->adm->guardar($valores);

		if($result){
			$this->session->set_flashdata('agregado','El elemento ha sido agregado ');
			redirect(base_url().'sotfware/'.$id.'/'.$area);
			//redirect(base_url().'administrativo_Controller/mostrarSW/'.$id.'/'.$area);
		}else{
			$this->session->set_flashdata('error2','El elemento no ha podido ser agregado ');
			redirect(base_url().'sotfware/'.$id.'/'.$area);
			//redirect(base_url().'administrativo_Controller/mostrarSW/'.$id.'/'.$area);
		}
	}//fin de guardar


	//esta función se encargara de actualizar los datos de los software
	public function updateSoftware(){
		$data = array('nombre' => $this->input->post('descripcionE'),
					  'version' => $this->input->post('versionE'), );
		$id = $this->input->post('id');
		$area = $this->input->post('areaE');
		$pc=$this->adm->equipo_id($id);

		//llamamos a la funcion en el modelo para actualizar
		$result = $this->adm->updateSoftware($data,$id);
		if($result){

			$this->session->set_flashdata('actualizado','El elemento ha sido actualizado ');
			redirect(base_url().'sotfware/'.$pc[0]['pc_id'].'/'.$area);
			//redirect(base_url().'administrativo_Controller/mostrarSW/'.$id);

		}else{
			//return false;
			$this->session->set_flashdata('Error_update','El elemento no ha podido ser actualizado ');
			redirect(base_url().'sotfware/'.$pc[0]['pc_id'].'/'.$area);
			//redirect(base_url().'administrativo_Controller/mostrarSW/'.$id);
		}
	}//fin de updateSoftware

	//función el cual traera en detalle de los elementos de cierta area administrativa.








///////////////////////////////////////////////////////////////////////////////////////

}
