<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class lab_lista_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('dashboard_Model');
		$this->load->model('lab_lista_Model','lab');
		require 'application/plus/noty.php';

	}

	public function index($lab){
		//vamos a traer la información de las PC'S de ese laboratorio
		$data['registro'] = $this->lab->getEquipos($lab);

		//para saber de que laboratorio queremos ver los registros
		switch ($lab) {
			case 'lab-01':
				$lugar = 'Laboratorio 1';
			break;
			case 'lab-02':
				$lugar = 'Laboratorio 2';
			break;
			case 'lab-03':
				$lugar = 'Laboratorio 3';
			break;
			case 'lab-04':
				$lugar = 'Laboratorio 4';
			break;
			case 'lab-05':
				$lugar = 'Laboratorio 5';
			break;
			case 'lab-HW':
				$lugar = 'Laboratorio de Hardware';
			break;
			case 'lab-red':
				$lugar = 'Laboratorio de red';
			break;
		}
		$data['lab'] = $lugar;
		
		$this->load->view('Dashboard/laboratorios/laboratorio_vista',$data);
	}//fin de index

	#vamos a obtener todos los registros de un equipo en el lab
	public function detalle($id){
		//var_dump($id);
		$resultado = $this->lab->detalleEquipo($id);
		if($resultado){
			$data['detalle'] = $resultado;

			//vamos a obtener el software de ese equipo
			$sw = $this->lab->getSoftware($id);
			$data['software'] = $sw;

			//vamos a obtener los perifericos asociados al equipo
			$pf=$this->lab->getPerifericos($id);
			$data['perifericos'] = $pf;
			//vamos a obtener las unidades 
			foreach ($resultado as $u) {
				$origen = $this->lab->getOrigen_destino($u->origen);
				$u->origen = $origen;
				$destino = $this->lab->getOrigen_destino($u->destino);
				$u->destino = $destino;
			}

		}
		
		//print_r($resultado);var_dump($resultado);
		$this->load->view('Dashboard/laboratorios/laboratorio_detalle',$data);
	}//fin de detalle

	//función para redireccionar el botón de atras
	public function redireccionar($lab){
		//vamos a ver de que laboratorio queremos ir
		//hacemos un substring para obtener solo los 
		$cad=substr($lab,0,4);
		
		switch ($cad) {
			case 'LAB1':
				$id='lab-01';
				$this->index($id);
				//redirect(base_url().'equipos/'.$lab[0]['PC_lab_id']);
			break;

			case 'LAB2':
				$id='lab-02';
				$this->index($id);
			break;

			case 'LAB3':
				$id='lab-03';
				$this->index($id);
			break;

			case 'LAB4':
				$id='lab-04';
				$this->index($id);
			break;

			case 'LAB5':
				$id='lab-05';
				$this->index($id);
			break;

			case 'RED-':
				$id='lab-red';
				$this->index($id);
			break;
			
			case 'HW-P':
				$id='lab-HW';
				$this->index($id);
			break;
			default:
				# code...
			break;
		}
	}// fin de la función redireccionar


//////////////////////////////////////////////////////////////////////////////////
	//función para editar 
	public function mostrarSW($id){
		
		//mandamos a llamar al modelo que nos traera los datos
		$data['software'] = $this->lab->getSoftware($id);
		
		//print_r($data['id']);
		$this->session->set_flashdata('url',$id);

		$this->load->view('Dashboard/laboratorios/laboratorio_editar',$data);
	}

	//función para eliminar el software
	public function deleteSoftware(){
		//vamos a llamar la función del modelo que nos eliminara el software seleccionado
		$id=$this->input->post('valor');
		$lab=$this->lab->lab_id($id);
		$result = $this->lab->deleteSoftware($id);

         //$result=true;
		if($result){
			
			$this->session->set_flashdata('Exitos','El elemento ha sido eliminado ');
			redirect(base_url().'lab_lista_Controller/mostrarSW/'.$lab[0]['PC_lab_id']);
			//return true;
			//$this->editarLab($lab);
		}else{
			//return false;
			$this->session->set_flashdata('Errors','El elemento no ha podido ser eliminado ');
			redirect(base_url().'lab_lista_Controller/mostrarSW/'.$lab[0]['PC_lab_id']);
		}
	}//fin de deleteSoftware

	//función para poder guardar software
	public function guardar(){
		//$id=$this->input->post('id');

		$id= $this->session->flashdata('url');
		//echo "id:";
		//echo $id;

		$descripcion = $this->input->post('descripcion');
		$empresa = $this->input->post('empresa');
		$nom_carpeta = $this->input->post('nom_carpeta');
		$version = $this->input->post('version');
		$nom_archivo = $this->input->post('nom_archivo');

		//vamos a agregar esos elementos a el software
		$valores = array(
			'PC_lab_id' => $id,
			'nombre' => $descripcion,
			'empresa' => $empresa,
			'nom_carpeta' => $nom_carpeta,
			'version' => $version,
			'nom_archivo' => $nom_archivo

		);

		//hacemos la consulta
		$result = $this->lab->guardar($valores);

		if($result){
			$this->session->set_flashdata('agregado','El elemento ha sido agregado ');
			redirect(base_url().'lab_lista_Controller/mostrarSW/'.$id);
		}else{
			$this->session->set_flashdata('error2','El elemento no ha podido ser agregado ');
			redirect(base_url().'lab_lista_Controller/mostrarSW/'.$id);
		}
	}//fin de guardar


	//función para poder editar el software
	public function editSoftware(){
		$id = $this->input->post('id');
		//$id = filter_input(INPUT_POST,'id');var_dump($id);
		$data = $this->lab->edit($id);

		echo json_encode($data);
	}//fin de la función editSoftware


	//función para poder eliminar todos los registros del software de una PC
	public function deleteAll(){
		//capturamos el id que mandamos por ajax, el cual nos servira para encontrar el identificador de esa pc
		$id = $this->input->post('valor2');var_dump($id);
		//mandamos el id del software para poder obtener el PC_lab_id 
		//$pc = $this->lab->lab_id($id);
		//llamamos a la función en el modelo que nos eliminara todo el software
		$result = $this->lab->deleteAll($id);

		if($result){
			
			$this->session->set_flashdata('Exitos','El elemento ha sido eliminado ');
			redirect(base_url().'lab_lista_Controller/mostrarSW/'.$id);
			//return true;
			//$this->editarLab($lab);
		}else{
			//return false;
			$this->session->set_flashdata('Errors','El elemento no ha podido ser eliminado ');
			redirect(base_url().'lab_lista_Controller/mostrarSW/'.$id);
		}
	}//fin de deleteAll

	//esta función se encargara de actualizar los datos de los software
	public function updateSoftware(){
		$data = array('nombre' => $this->input->post('descripcionE'),
					  'empresa' => $this->input->post('empresaE'),
					  'nom_carpeta' => $this->input->post('nom_carpetaE'),
					  'version' => $this->input->post('versionE'),
					  'nom_archivo' => $this->input->post('nom_archivoE'), );
		$id = $this->input->post('id');
		$idpc = $this->input->post('idpc');

		//llamamos a la funcion en el modelo para actualizar 
		$result = $this->lab->updateSoftware($data,$id);
		if($result){
			
			$this->session->set_flashdata('actualizado','El elemento ha sido actualizado ');
			redirect(base_url().'lab_lista_Controller/mostrarSW/'.$idpc);
			//return true;
			//$this->editarLab($lab);
		}else{
			//return false;
			$this->session->set_flashdata('Error_update','El elemento no ha podido ser actualizado ');
			redirect(base_url().'lab_lista_Controller/mostrarSW/'.$idpc);
		}
	}//fin de updateSoftware
///////////////////////////////////////////////////////////////////////////////////////

	//función para poder realizar prestamos de los equipos de laboratorio
	public function prestamos()
	{
		$this->load->view('Dashboard/laboratorios/prestamos/prestamos_view');
	}




}//fin de la clase lab_lista_Controller



 ?>
