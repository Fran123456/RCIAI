<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Movimientos_controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('dashboard_Model');
		$this->load->model('Movimientos_model','mov');
		require 'application/plus/noty.php';

	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function index()
	{
		$this->load->view('Dashboard/movimientos/movimientoGeneral');
	}

/**********************************************************************************************************************
********************************  ASIGNACION **************************************************************************
***********************************************************************************************************************/
	
	//muestra un listado de las asignaciones
	public function asignaciones()
	{
		#getAsignacion() nos traera la consulta con los datos para mostrar en una tabla
		$datos['detalle'] = $this->mov->getAsignacion();
		$this->load->view('Dashboard/movimientos/asignaciones',$datos);
	}


	//funcion que muestra el detalle de los movimientos de asignacion
	//recibe el id_cambio 
	public function detalleAsignacion($id)
	{
		#getDetalleAsig($id) nos trae los campos necesarios 
		#donde $id es id_cambio
		$resultado = $this->mov->getDetalleAsig($id);
		if($resultado){
		//vamos a obtener las unidades
			foreach ($resultado as $u) {
				$origen = $this->mov->getOrigen_destino($u->origen_nuevoEquipo_id);
				$u->origen_nuevoEquipo_id = $origen;
				$destino = $this->mov->getOrigen_destino($u->destino_nuevoEquipo_id);
				$u->destino_nuevoEquipo_id = $destino;
			}
		}
		$datos['detalle'] = $resultado;
		//print_r($datos['detalle']);

		#mandamos los datos a la vista que tendra el detalle
		$this->load->view('Dashboard/movimientos/detalleAsignacion',$datos);
	}


/**********************************************************************************************************************
********************************  SUSTITUCIÓN **************************************************************************
***********************************************************************************************************************/

	//función que muestra el listado de los movimientos de sustitución
	public function sustituciones()
	{
		#getSustitucion() nos traera la consulta con los datos a mostrar en la tabla
		$datos['detalle'] = $this->mov->getSustitucion();
		$this->load->view('Dashboard/movimientos/sustituciones',$datos);
	}

	

	//función para obtener el detalle de la Sustitucion
	public function detalleSustitucion($id)
	{
		#getDetalleAsig($id) nos trae los campos necesarios 
		#donde $id es id_cambio
		$resultado = $this->mov->getDetalleSus($id);
		if($resultado){
		//vamos a obtener las unidades
			foreach ($resultado as $u) {
				//equipo nuevo
				$origen = $this->mov->getOrigen_destino($u->origen_nuevoEquipo_id);
				$u->origen_nuevoEquipo_id = $origen;
				$destino = $this->mov->getOrigen_destino($u->destino_nuevoEquipo_id);
				$u->destino_nuevoEquipo_id = $destino;

				//equipo viejo
				$origenViejo = $this->mov->getOrigen_destino($u->unidad_pertenece_id);
				$u->unidad_pertenece_id = $origenViejo;
				$destinoViejo = $this->mov->getOrigen_destino($u->unidad_traslado_id);
				$u->unidad_traslado_id = $destinoViejo;
			}
		}
		$datos['detalle'] = $resultado;
		//print_r($datos['detalle']);

		#mandamos los datos a la vista que tendra el detalle
		$this->load->view('Dashboard/movimientos/detalleSustitucion',$datos);
	}



	/**********************************************************************************************************************
********************************    PRESTAMOS     *************************************************************************
***********************************************************************************************************************/
//función para listar los elementos prestados
	public function prestamos()
	{
		#getSustitucion() nos traera la consulta con los datos a mostrar en la tabla
		$datos['detalle'] = $this->mov->getPrestamos();
		$this->load->view('Dashboard/movimientos/prestamo',$datos);
	}

	//función para obtener el detalle del prestamo
	public function detallePrestamo($id)
	{
		#getDetallePres($id) nos trae los campos necesarios 
		#donde $id es id_cambio
		$resultado = $this->mov->getDetallePres($id);
		if($resultado){
		//vamos a obtener las unidades
			foreach ($resultado as $u) {
				//equipo nuevo
				$origen = $this->mov->getOrigen_destino($u->origen_nuevoEquipo_id);
				$u->origen_nuevoEquipo_id = $origen;
				$destino = $this->mov->getOrigen_destino($u->destino_nuevoEquipo_id);
				$u->destino_nuevoEquipo_id = $destino;

				//equipo viejo
				$origenViejo = $this->mov->getOrigen_destino($u->unidad_pertenece_id);
				$u->unidad_pertenece_id = $origenViejo;
				$destinoViejo = $this->mov->getOrigen_destino($u->unidad_traslado_id);
				$u->unidad_traslado_id = $destinoViejo;
			}
		}
		$datos['detalle'] = $resultado;
		//print_r($datos['detalle']);

		#mandamos los datos a la vista que tendra el detalle
		$this->load->view('Dashboard/movimientos/detallePrestamo',$datos);
	}


	public function _token()
     {
        $variable = "";
        $parte1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $parte2 = rand(100000, 999999). "-" . rand(1000, 9999);
        $parte3 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        $variable = 'token--'. $parte1 . $parte2 . $parte3 ;
        return $variable;
     }


//función para efectuar el prestamos de equipo de laboratorio
	public function hacer_prestamos()
	{
		$fecha_retiro = $this->input->post('fecha_retiro');
		$fecha_prestamo = $this->input->post('fecha_prestamo');
		$encargado = $this->input->post('encargado');
		$tecnico = $this->input->post('tecnico');
		$tipo_prestamo = $this->input->post('tipo_prestamo');//tipo de prestamo si es una pc completa (1) o un periferico (2) 
		$codigo = $this->input->post('codigo'); // codigo del equipo que recibe el prestamo
		$desc_prestamo = $this->input->post('desc_prestamo');//descripción del porque se hace el prestamo
		$laboratorios = $this->input->post('laboratorios'); // laboratorio de donde se sacara el equipo para hacer el prestamo
		$equipo = $this->input->post('equipo'); //equipo del laboratorio que hara el prestamo
		$perifericos = $this->input->post('perifericos');//tipo de periferico, estara activo si el tipo prestamo es periferico
		$caract_equipo_f = $this->input->post('caract_equipo_f'); //descripción del equipo que queda en función
		$caract_equipo_prestamo = $this->input->post('caract_equipo_prestamo'); //caracteristica del equipo que recibe el prestamo ( el equipo del codigo ingresado)
		$prestamo = $this->input->post('prestamo'); //que clase de prestamo se hara, si es un prestamo con devolución o sustitución (el valor es devolucion,sustitucion)
		$estado = $this->input->post('estado'); //el estado del equipo que se enviara a bodega

		$token = $this->_token();
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//camposa usar internamente
		$origen_nuevoEquipo_id = 37; //origen del equipo a prestar, siempre es laboratorio
		$tipoHardSoft = 'HARDWARE-EXTERNO'; // dato constante
		$tipo_movimiento = 'Prestamo';

		//vamos a traer el origen del equipo que recibe el prestamo
		$cad=substr($codigo,0,2);
		if($cad == 'LA')//si es un equipo de laboratorio, asignamos laboratorio
		{
			$unidad_pertenece_id = 37;
			$destino_nuevoEquipo_id = 37;
		}
		else
		{
			//si es de inventario administrativo, vamos a realizar la busqueda en el inventario administrativo
			$destino = $this->mov->origen_Codigo($codigo);

			$unidad_pertenece_id = $destino->destino;
			$destino_nuevoEquipo_id = $destino->destino;

		}

		switch ([$prestamo, $tipo_prestamo]) {
			case ['devolucion',1]:
				//no se recibira nada a cambio por parte del equipo que recibe el prestamo
				$cambio = "Prestamo de la PC $equipo al equipo $codigo";
				
				break;
			
			case ['devolucion',2]:
				//no se recibira nada a cambio por parte del equipo que recibe el prestamo
				$cambio = "Prestamo de $perifericos del equipo $equipo a el equipo $codigo";
				
				//obtenemos el serial del periferico que se esta prestando
				$serial = $this->mov->serial_periferico($equipo,$perifericos);
				$serial_nuevo = $serial->serial;

				//mandamos los campos que se van a insertar en la tabla movimiento
				$datos = array('token' => $token,
							   'fecha_retiro' => $fecha_retiro,
							   'fecha_cambio' => $fecha_prestamo,
							   'codigo_id' => $codigo,
							   'unidad_pertenece_id' => $unidad_pertenece_id,
							   'unidad_traslado_id' => 38,
							   'cambio' => $cambio,
							   'descripcion_cambio' => $desc_prestamo,
							   'origen_nuevoEquipo_id' => $origen_nuevoEquipo_id,
							   'destino_nuevoEquipo_id' => $destino_nuevoEquipo_id,
							   'descripcion_equipoRetirado' => 'ninguna',
							   'descripcion_equipoNuevo' => $caract_equipo_f,
							   'encargado' => $encargado,
							   'tecnico' => $tecnico,
							   'tipoHardSoft' => $tipoHardSoft,
							   'tipo_movimiento' => $tipo_movimiento,
							   'serial_nuevo' => $serial_nuevo,
							   'laboratorio' => $laboratorios );

				$respuesta1 = $this->mov->crear_prestamo($datos);

				if($respuesta1)
				{
					//si es verdadero generamos la siguiente consulta
					//actualizaremos los campos en la tabla inventario bodega
					$respuesta2 = $this->mov->actualizar_bodega($codigo, $perifericos, $equipo, $unidad_pertenece_id, $origen_nuevoEquipo_id, $fecha_prestamo);

					if($respuesta2)
					{
						//si todo fue bien
						$this->session->set_flashdata('exito','movimiento realizado');
						redirect(base_url().'prestamos');

					}

				}
				break;

			case ['sustitucion',1]:
				//se recibira el elemento por parte de el equipo que recibe el prestamo
				$cambio = "Prestamo de la PC $equipo al equipo $codigo";
				
				break;
			case ['sustitucion',2]:
				//se recibira el elemento por parte de el equipo que recibe el prestamo
				$cambio = "Prestamo de $perifericos del equipo $equipo a el equipo $codigo";

				//obtenemos el serial del periferico que se esta prestando
				$serial = $this->mov->serial_periferico($equipo,$perifericos);
				$serial_nuevo = $serial->serial;

				//serial del equipo que es sustiuido y regresa a bodega
				$serial2 = $this->mov->serial_equipo_sustituido($codigo,$perifericos);
				$serial_sustituido = $serial2->serial;

				$descripcionEquipo = $this->mov->descripcionEquipoRetirado($serial_sustituido);
				//print_r($descripcionEquipo);
				$descripcion_equipoRetirado = 'serial: '.$descripcionEquipo->serial.' '.'marca: '.$descripcionEquipo->marca.' '.'tipo: '.$descripcionEquipo->tipo;
				//echo "<br>";
				//print_r($descripcion_equipoRetirado);
				//mandamos los campos que se van a insertar en la tabla movimiento
				$datos = array('token' => $token,
							   'fecha_retiro' => $fecha_retiro,
							   'fecha_cambio' => $fecha_prestamo,
							   'codigo_id' => $codigo,
							   'unidad_pertenece_id' => $unidad_pertenece_id,
							   'unidad_traslado_id' => 1,
							   'cambio' => $cambio,
							   'descripcion_cambio' => $desc_prestamo,
							   'origen_nuevoEquipo_id' => $origen_nuevoEquipo_id,
							   'destino_nuevoEquipo_id' => $destino_nuevoEquipo_id,
							   'descripcion_equipoRetirado' => $descripcion_equipoRetirado,
							   'descripcion_equipoNuevo' => $caract_equipo_f,
							   'encargado' => $encargado,
							   'tecnico' => $tecnico,
							   'tipoHardSoft' => $tipoHardSoft,
							   'tipo_movimiento' => $tipo_movimiento,
							   'serial_nuevo' => $serial_nuevo,
							   'laboratorio' => $laboratorios );

				$respuesta1 = $this->mov->crear_prestamo($datos);

				if($respuesta1)
				{
					//si es verdadero generamos la siguiente consulta
					//actualizaremos los campos en la tabla inventario bodega para el equipo que es prestado
					$respuesta2 = $this->mov->actualizar_bodega($codigo, $perifericos, $equipo, $unidad_pertenece_id, $origen_nuevoEquipo_id, $fecha_prestamo);
					//actualizar periferico que es sustituido
					$origen1 = $this->mov->origen_destino($serial_sustituido,'origen');
					$destino1 = $this->mov->origen_destino($serial_sustituido,'destino');

					$origenP = $origen1->origen;
					$destinoP = $destino1->destino;

					$respuesta3 = $this->mov->actualizarPeriferico($origenP,$destinoP,$fecha_prestamo,$codigo,$estado,$serial_sustituido);

					if($respuesta2 && $respuesta3)
					{
						//si todo fue bien
						$this->session->set_flashdata('exito','movimiento realizado');
						redirect(base_url().'prestamos');

					}

				}

				break;
		}


		/*campos a usar si es pc completa 
				***Tabla movimiento
					- $fecha_retiro ............. fecha_retiro
					- $fecha_prestamo ........... fecha_cambio
					- $encargado ................ encargado
					- $tecnico .................. tecnico
					- $codigo ................... codigo_id
					- $desc_prestamo ............ descripcion_cambio
					- $laboratorios ............. laboratorio (de donde se saca el elemento para el prestamo)
					- $caract_equipo_f .......... descripcion_equipoNuevo (del equipo del laboratorio)
					- $caract_equipo_prestamo ... descripcion_equipoRetirado (si es prestamo en sustitución)

					**** datos que se llenara por el sistema
					campo ........ dato
					¿que cambio sufrio el equipo?
					- cambio ------------------- Prestamo de PC completa ¿que cambio sufrio el equipo?
					- origen_nuevoEquipo_id ---- 37(laboratorio)
					- destino_nuevoEquipo_id --- origen del codigo digitado ($codigo)
					- tipoHardSoft ------------- HARDWARE-EXTERNO
					- tipo_movimiento ---------- Prestamo
					- serial ------------------- si es periferico
					- unidad_pertenece_id ------ origen del codigo digitado ($codigo)
					- unidad_traslado_id ------- bodega de informatica 1 si es prestamo en sustitucion $prestamo(sustitucion)
											     null si es prestamo en devolucion $prestamo(devolucion)*/


				/* tabla inventario_bodega 
						el campo pc_servidor_antiguo_id----> tomara el valor de pc_servidor_id ($equipo)
						y pc_Servidor_id----> tomara el origen del equipo del codigo digitado

						el campo origen pasara a tener el valor 37(laboratorio) y destino el origen del codigo*/





		



		
	}//fin de prestamos

	//función que se encarga de verificar si el codigo existe en algún inventario
	# devuelve 1 si esta en inventario_adm
	# devuelve 2 si esta en inventario_lab
	# devuelve 0 si no se encuentra en la base de datos
	public function verificar_codigo()
	{
		$codigo = $this->input->post('codigo');//obtenemos el codigo que mandamos de la función ajax
		
		#vamos primero a consultar en la tabla inventario_adm
		$valor = $this->mov->verificarAdmin($codigo);

		//verificamos si el codigo se encuentra en el inventario admin
		if($valor)
		{
			$result = 1; #si esta en inventario_adm
		}else{
			//si el codigo no esta en el inventario_adm, consultamos en inventario_lab
			$valor = $this->mov->verificarLab($codigo);
			if($valor)
			{
				$result = 2; #si esta en inventario_lab 
			}
			else
				$result = 0; #si no esta en ningún inventario
		}
		echo json_encode($result);
	}

	//función que verifica si hay equipos en el laboratorio seleccionado
	public function obtener_equipo()
	{
		$laboratorio = $this->input->post('lab');
		$resultado = $this->mov->obtener_equipo($laboratorio);

		if($resultado)
		{
			echo json_encode($resultado);
		}else{
			echo json_encode(false);
		}
	}

	//función para verificar el periferico de la pc seleccionada de lab
	public function verificar_periferico()
	{
		$equipo = $this->input->post('equipoLab');
		$periferico  = $this->input->post('periferico');

		$resultado = $this->mov->verificar_periferico($equipo, $periferico);
		//print_r($resultado);
		if($resultado)
		{
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}

}//fin de la clase lab_lista_Controller



 ?>
