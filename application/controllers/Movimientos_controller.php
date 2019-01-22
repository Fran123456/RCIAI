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
		$codigo = strtoupper($this->input->post('codigo')); // codigo del equipo que recibe el prestamo
		$desc_prestamo = $this->input->post('desc_prestamo');//descripción del porque se hace el prestamo
		$laboratorios = $this->input->post('laboratorios'); // laboratorio de donde se sacara el equipo para hacer el prestamo
		$equipo = strtoupper($this->input->post('equipo')); //equipo del laboratorio que hara el prestamo
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
				#vamos a verificar si el periferico es un CPU, si es un CPU no podemos hacer el prestamo en devolución, ya que 
				#no pueden existir dos equipos con el mismo codigo
				if($perifericos==='CPU')
				{
					$this->session->set_flashdata('error1','no se puede realizar movimiento');
					redirect(base_url().'prestamos');
				}
				else
				{
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
				
				/*************************************************************************************************************************/
				//si el periferico es un cpuse modificaran las diversas tablas con la información
				if($perifericos==='CPU')
				{
					//vamos a obtener los valores de cada una de las tablas asociadas al cpu
					//obtenemos el valor de adaptador_red
					$red_prestado = $this->mov->get_detalles('adaptador_red','pc_id',$equipo);//esta es la información del equipo que es prestado le mandamos el codigo de la pc que esta en el lab
					$red_recibe = $this->mov->get_detalles('adaptador_red','pc_id',$codigo);//información del equipo que recibe el prestamo. recibe de parametro el codigo del equipo que recibe el prestamo
					$video_prestamo = $this->mov->get_detalles('adaptador_video','pc_id',$equipo);
					$video_recibe = $this->mov->get_detalles('adaptador_video','pc_id',$codigo);

					//detalle de la tabla almacenamiento
					$almacenamiento_prestamo = $this->mov->get_detalles('almacenamiento','pc_id',$equipo);
					$almacenamiento_recibe = $this->mov->get_detalles('almacenamiento','pc_id',$codigo);

					//detalle de la descripcion_sistema
					$descripcion_prestamo = $this->mov->get_detalles('descripcion_sistema','pc_ids',$equipo);
					$descripcion_recibe = $this->mov->get_detalles('descripcion_sistema','pc_ids',$codigo);

					//detalle de la placa
					$placa_prestamo = $this->mov->get_detalles('placa_base','pc_id',$equipo);
					$placa_recibe = $this->mov->get_detalles('placa_base','pc_id',$codigo);

					//traemos el detalle de la compra
					$compra_prestamo = $this->mov->get_compra($equipo);
					$compra_recibe = $this->mov->get_compra($codigo);

					/* vamos a generar un nuevo codigo el cual actualizara el registro nuevo */
					$codigo_aleatorio1 = $this->codigo_aleatorio();//para el elemento que recibe el prestamo
					$codigo_aleatorio2 = $this->codigo_aleatorio();//para el elemento que se presta

					$sw_prestamo = $this->mov->sw_lab($equipo);#sw del equipo que se presta
					

					//actualizamos a null cada uno de los inventarios
					$cod = substr($codigo,0,2); //hacemos un substring para saber si es codigo PC o codigo LAB
					if($cod === 'PC')
					{
						#actualizamos en null los campos de la tabla inventario_adm con el codigo
						$null1 = $this->mov->actualizar_null('inventario_adm','des_sistema_id','identificador',$codigo);

						#vamos a traer el sw si el equipo es administrativo
						$sw_recibe = $this->mov->sw_adm($codigo);#sw del equipo que recibe el prestamo
					}
					else
					{
						#actualizamos en null los campos de la tabla inventario_lab con el codigo
						$null1 = $this->mov->actualizar_null('inventario_lab','descripcion_sistema_id','identificador_lab',$codigo);

						#vamos a traer el sw si el equipo es administrativo
						$sw_recibe = $this->mov->sw_lab($codigo);#sw del equipo que recibe el prestamo
					}

					#actualizamos en null los campos de la tabla inventario_lab de $equipo
					$null2 = $this->mov->actualizar_null('inventario_lab','descripcion_sistema_id','identificador_lab',$equipo);

					//vamos a actualizar cada uno de las tablas donde esta el codigo que recibe el prestamo, con un codigo aleatorio 
					$up_red = $this->mov->actualizar_tablas('adaptador_red','pc_id',$codigo,$codigo_aleatorio1);
					$up_video = $this->mov->actualizar_tablas('adaptador_video','pc_id',$codigo,$codigo_aleatorio1);
					$up_placa = $this->mov->actualizar_tablas('placa_base','pc_id',$codigo,$codigo_aleatorio1);
					$up_desc = $this->mov->actualizar_tablas('descripcion_sistema','pc_ids',$codigo,$codigo_aleatorio1);
					$up_alma = $this->mov->actualizar_tablas('almacenamiento','pc_id',$codigo,$codigo_aleatorio1);

					//actualizamos los campos de el equipo que se presta con el codigo del equipo que recibe el prestamo
					$lab_red = $this->mov->actualizar_tablas('adaptador_red','pc_id',$equipo,$codigo);
					$lab_video = $this->mov->actualizar_tablas('adaptador_video','pc_id',$equipo,$codigo);
					$lab_placa = $this->mov->actualizar_tablas('placa_base','pc_id',$equipo,$codigo);
					$lab_desc = $this->mov->actualizar_tablas('descripcion_sistema','pc_ids',$equipo,$codigo);
					$lab_alma = $this->mov->actualizar_tablas('almacenamiento','pc_id',$equipo,$codigo);

					//hacemos una nueva inserción en las tablas foraneas con los datos del elemento que se presta y con su id
					$t_red = $this->mov->insertar_red($red_prestado);
					$t_video = $this->mov->insertar_video($video_prestamo);
					$t_alma = $this->mov->insertar_alma($almacenamiento_prestamo);
					$t_placa = $this->mov->insertar_placa($placa_prestamo);
					$t_desc = $this->mov->insertar_desc($descripcion_prestamo);

					
					if($cod === 'PC')
					{
						//actualizamos en la tabla de los inventarios las llaves foraneas
						$actualizar1 = $this->mov->actualizar_inv('inventario_adm','des_sistema_id','identificador',$codigo);

						//vamos a actualizar el sw del equipo que recibe el prestamo con los datos del equipo prestado
						if($sw_recibe&&$sw_prestamo)
						{
							#si ambos tienen datos actualizamos los campos de la pc q recibe el prestamo por un codigo generico
							#que se guardara en bodega_id
							for($i=0;$i<count($sw_recibe);$i++)
							{
								$id = $sw_recibe[$i]['id'];
								$this->mov->actualizar_sw($id,$codigo_aleatorio1);
							}
							#actualizamos el codigo de el equipo que recibe el prestamo en pc_id y ponemos null en PC_lab_id
							for($i=0;$i<count($sw_prestamo);$i++)
							{
								$id = $sw_prestamo[$i]['id'];
								$this->mov->up_swLab($id,$codigo);
							}
						}
						elseif(($sw_recibe==FALSE)&&($sw_prestamo))
						{
							#si solo el equipo que se presta tiene sw
							for($i=0;$i<count($sw_prestamo);$i++)
							{
								$id = $sw_prestamo[$i]['id'];
								$this->mov->up_swLab($id,$codigo);
							}
						}elseif (($sw_recibe)&&($sw_prestamo==FALSE)) 
						{
							# si solo el equipo que recibe el prestamo tiene sw
							for($i=0;$i<count($sw_recibe);$i++)
							{
								$id = $sw_recibe[$i]['id'];
								$this->mov->actualizar_sw($id,$codigo_aleatorio1);
							}
						}
					}
					else
					{
						#actualizamos en null los campos de la tabla inventario_lab con el codigo
						$actualizar1 = $this->mov->actualizar_inv('inventario_lab','descripcion_sistema_id','identificador_lab',$codigo);

						//vamos a actualizar el sw del equipo que recibe el prestamo con los datos del equipo prestado
						if($sw_recibe&&$sw_prestamo)
						{
							#si ambos tienen datos actualizamos los campos de la pc q recibe el prestamo por un codigo generico
							#que se guardara en bodega_id
							for($i=0;$i<count($sw_recibe);$i++)
							{
								$id = $sw_recibe[$i]['id'];
								$this->mov->actualizar_swLab($id,$codigo_aleatorio1);
							}
							#actualizamos el codigo de el equipo que recibe el prestamo en pc_id y ponemos null en PC_lab_id
							for($i=0;$i<count($sw_prestamo);$i++)
							{
								$id = $sw_prestamo[$i]['id'];
								$this->mov->update_swLab($id,$codigo);
							}
						}
						elseif(($sw_recibe==FALSE)&&($sw_prestamo))
						{
							#si solo el equipo que se presta tiene sw
							for($i=0;$i<count($sw_prestamo);$i++)
							{
								$id = $sw_prestamo[$i]['id'];
								$this->mov->update_swLab($id,$codigo);
							}
						}elseif (($sw_recibe)&&($sw_prestamo==FALSE)) 
						{
							# si solo el equipo que recibe el prestamo tiene sw
							for($i=0;$i<count($sw_recibe);$i++)
							{
								$id = $sw_recibe[$i]['id'];
								$this->mov->actualizar_swLab($id,$codigo_aleatorio1);
							}
						}
					}
					$actualizar2 = $this->mov->actualizar_inv('inventario_lab','descripcion_sistema_id','identificador_lab',$equipo);

					#vamos a crear el movimiento
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

						$respuesta3 = $this->mov->actualizarPeriferico(1,$destinoP,$fecha_prestamo,$codigo,$estado,$serial_sustituido,$codigo_aleatorio1);

						if($respuesta2 && $respuesta3)
						{
							//si todo fue bien
							$this->session->set_flashdata('exito','movimiento realizado');
							redirect(base_url().'prestamos');

						}

					}
				} 
				else
				{

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

					$respuesta3 = $this->mov->actualizarPeriferico($origenP,$destinoP,$fecha_prestamo,$codigo,$estado,$serial_sustituido,null);

					if($respuesta2 && $respuesta3)
					{
						//si todo fue bien
						$this->session->set_flashdata('exito','movimiento realizado');
						redirect(base_url().'prestamos');

					}

				}
			}

				break;
		}

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

	//función para generar un codigo aleatorio
	public function codigo_aleatorio()
	{
		$variable = "";
        $parte1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $parte2 = rand(100000, 999999). "-" . rand(1000, 9999);
        $parte3 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

        $parte4 = "PC--";
        $variable = $parte4. $parte1 . $parte2 . $parte3 ;
        
        return $variable;
    }


}//fin de la clase Movimientos_Controller



 ?>
