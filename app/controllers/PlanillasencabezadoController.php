<?php 
/**
 * Planillasencabezado Page Controller
 * @category  Controller
 */
class PlanillasencabezadoController extends BaseController{
	function __construct(){
		parent::__construct();
		$this->tablename = "planillasencabezado";
	}
	/**
     * Lista los registros de la tabla relacionada al controlador
     * @param $fieldname (nombre del campo)
     * @param $fieldvalue (valor del campo)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = ["planillasencabezado.idplanilla",
			"planillasencabezado.Fecha",
			"planillasencabezado.iddocente",
			"usuarios.Apellido AS usuarios_Apellido",
			"planillasencabezado.idcomision",
			"comisiones.NumeroComision AS comisiones_NumeroComision",
			"planillasencabezado.idCentroOperativo",
			"centrooperativo.Nombre AS centrooperativo_Nombre",
			"planillasencabezado.idasignatura",
			"asignaturas.Asignatura AS asignaturas_Asignatura"];
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // límite de paginación
		// buscamos registros en todos los campos vidibles
		if(!empty($request->search)){
			$text = trim($request->search);

			$search_condition = "(
				planillasencabezado.idplanilla LIKE ? OR 
				planillasencabezado.Fecha LIKE ? OR 
				planillasencabezado.iddocente LIKE ? OR 
				planillasencabezado.idcomision LIKE ? OR 
				planillasencabezado.idCentroOperativo LIKE ? OR 
				planillasencabezado.idasignatura LIKE ? OR 
				planillasencabezado.CantAlumnos LIKE ? OR 
				planillasencabezado.RegimenHorario LIKE ? OR 
				planillasencabezado.RegimenLaboral LIKE ? OR 
				planillasencabezado.Escuela1 LIKE ? OR 
				planillasencabezado.Escuela2 LIKE ? OR 
				planillasencabezado.Alta LIKE ? OR 
				planillasencabezado.Editable LIKE ? OR 
				planillasencabezado.UltimaModificacion LIKE ? OR 
				planillasencabezado.AutorizaEdicion LIKE ?
			)";

			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);

			// ajustamos las condiciones de búsqueda
			$db->where($search_condition, $search_params);

			//plantilla para búsqueda ajax
			$this->view->search_template = "planillasencabezado/search.php";
		}
		$db->join("usuarios", "planillasencabezado.iddocente = usuarios.idUsuario", "INNER");
		$db->join("comisiones", "planillasencabezado.idcomision = comisiones.idComision", "INNER");
		$db->join("centrooperativo", "planillasencabezado.idCentroOperativo = centrooperativo.idCentroOperativo", "INNER");
		$db->join("asignaturas", "planillasencabezado.idasignatura = asignaturas.idAsignatura", "INNER");
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("planillasencabezado.idplanilla", ORDER_TYPE);
		}
        if($fieldname){
			$db->where($fieldname , $fieldvalue); // filtrar por un único campo
		}
		$tc = $db->withTotalCount();              // total de filas filtradas

		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;

        // guardamos el registro de logs
		if($db->getLastError()){
			$this->set_page_error();
		}

		$page_title = $this->view->page_title = "Planillasencabezado";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;

		$this->view->report_title = $page_title;

		$this->view->report_layout = "report_layout.php";

		$this->view->report_paper_size = "A4";

		$this->view->report_orientation = "portrait";
		$this->render_view("planillasencabezado/list.php", $data); //render the full page
	}
	/**
     * Load csv|json data
     * @return data
     */
	function import_data(){
		if(!empty($_FILES['file'])){
			$finfo = pathinfo($_FILES['file']['name']);
			$ext = strtolower($finfo['extension']);
			if(!in_array($ext , array('csv','json'))){
				$this->set_flash_msg("Formato de archivo no soportado", "danger");
			} else {
			$file_path = $_FILES['file']['tmp_name'];

				if(!empty($file_path)){
					$request = $this->request;
					$db = $this->GetModel();
					$tablename = $this->tablename;
					if($ext == "csv"){
						$options = array('table' => $tablename, 'fields' => '', 'delimiter' => ',', 'quote' => '"');
						$data = $db->loadCsvData($file_path , $options , false);
					}
					else{
						$data = $db->loadJsonData($file_path, $tablename , false);
					}
					if($db->getLastError()){
						$this->set_flash_msg($db->getLastError(), "danger");
					}
					else{
						$this->set_flash_msg("Datos importados con éxito", "success");
					}
				} else {
					$this->set_flash_msg("Error al cargar el archivo", "success");
				}
			}
		} else {
			$this->set_flash_msg("No se seleccionó ningún archivo para cargar", "warning");
		}
		$this->redirect("planillasencabezado");
	}
	/**
     * Vista en detalle del registro
	 * @param $rec_id (seleccionamos el registro por su id)
     * @param $value value (seleccionamos el registro por el valor del campo (rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = ["planillasencabezado.idplanilla",
			"planillasencabezado.idcomision",
			"comisiones.NumeroComision AS comisiones_NumeroComision",
			"planillasencabezado.idasignatura",
			"asignaturas.Asignatura AS asignaturas_Asignatura",
			"planillasencabezado.iddocente",
			"usuarios.Apellido AS usuarios_Apellido",
			"planillasencabezado.idCentroOperativo",
			"centrooperativo.Nombre AS centrooperativo_Nombre",
			"planillasencabezado.Fecha",
			"planillasencabezado.CantAlumnos",
			"planillasencabezado.RegimenHorario",
			"planillasencabezado.RegimenLaboral",
			"planillasencabezado.Escuela1",
			"planillasencabezado.Escuela2",
			"planillasencabezado.Alta",
			"planillasencabezado.Editable",
			"planillasencabezado.UltimaModificacion",
			"planillasencabezado.AutorizaEdicion"];
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		} else {
			$db->where("planillasencabezado.idplanilla", $rec_id);; //select record based on primary key
		}
		$db->join("comisiones", "planillasencabezado.idcomision = comisiones.idComision", "INNER");
		$db->join("asignaturas", "planillasencabezado.idasignatura = asignaturas.idAsignatura", "INNER");
		$db->join("usuarios", "planillasencabezado.iddocente = usuarios.idUsuario", "INNER");
		$db->join("centrooperativo", "planillasencabezado.idCentroOperativo = centrooperativo.idCentroOperativo", "INNER");
		$record = $db->getOne($tablename, $fields );

		if($record){
			$page_title = $this->view->page_title = "Ver";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;

		$this->view->report_title = $page_title;

		$this->view->report_layout = "report_layout.php";

		$this->view->report_paper_size = "A4";

		$this->view->report_orientation = "portrait";

		} else {
			if($db->getLastError()){
				$this->set_page_error();
			} else {
				$this->set_page_error("Registro no encontrado");
			}
		}

		return $this->render_view("planillasencabezado/view.php", $record);
	}
	/**
     * Insertamos un nuevo registro en la tabla
	 * @param $formdata array() desde $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			$fields = $this->fields = ["idcomision","idasignatura","iddocente","idCentroOperativo","Fecha","CantAlumnos","RegimenHorario","RegimenLaboral","Escuela1","Escuela2","Alta","Editable","UltimaModificacion","AutorizaEdicion"];
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'idcomision' => 'required',
				'idasignatura' => 'required',
				'iddocente' => 'required',
				'idCentroOperativo' => 'required',
				'Fecha' => 'required',
				'CantAlumnos' => 'required|numeric',
				'RegimenHorario' => 'required|numeric',
				'RegimenLaboral' => 'required',
				'Escuela1' => 'required',
				'Escuela2' => 'required',
				'Alta' => 'required',
				'Editable' => 'required',
				'UltimaModificacion' => 'required',
				'AutorizaEdicion' => 'required',
			);

			$this->sanitize_array = array(
				'idcomision' => 'sanitize_string',
				'idasignatura' => 'sanitize_string',
				'iddocente' => 'sanitize_string',
				'idCentroOperativo' => 'sanitize_string',
				'Fecha' => 'sanitize_string',
				'CantAlumnos' => 'sanitize_string',
				'RegimenHorario' => 'sanitize_string',
				'RegimenLaboral' => 'sanitize_string',
				'Escuela1' => 'sanitize_string',
				'Escuela2' => 'sanitize_string',
				'Alta' => 'sanitize_string',
				'Editable' => 'sanitize_string',
				'UltimaModificacion' => 'sanitize_string',
				'AutorizaEdicion' => 'sanitize_string',
			);

			$this->filter_vals = true; //set whether to remove empty fields

			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);

                if($rec_id) {
					$this->set_flash_msg("Registro agregado exitosamente!", "success");

                	return $this->redirect("planillasencabezado");
				} else {
					$this->set_page_error();
				}
			}
		}

		$page_title = $this->view->page_title = "Agregar nuevo";

        $this->render_view("planillasencabezado/add.php");
	}
	/**
     * Actualiza aun registro de la tabla
	 * @param $rec_id (id del registro seleccionado)
	 * @param $formdata array() desde $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		$fields = $this->fields = ["idplanilla","idcomision","idasignatura","iddocente","idCentroOperativo","Fecha","CantAlumnos","RegimenHorario","RegimenLaboral","Escuela1","Escuela2","Alta","Editable","UltimaModificacion","AutorizaEdicion"];

		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'idcomision' => 'required',
				'idasignatura' => 'required',
				'iddocente' => 'required',
				'idCentroOperativo' => 'required',
				'Fecha' => 'required',
				'CantAlumnos' => 'required|numeric',
				'RegimenHorario' => 'required|numeric',
				'RegimenLaboral' => 'required',
				'Escuela1' => 'required',
				'Escuela2' => 'required',
				'Alta' => 'required',
				'Editable' => 'required',
				'UltimaModificacion' => 'required',
				'AutorizaEdicion' => 'required',
			);

			$this->sanitize_array = array(
				'idcomision' => 'sanitize_string',
				'idasignatura' => 'sanitize_string',
				'iddocente' => 'sanitize_string',
				'idCentroOperativo' => 'sanitize_string',
				'Fecha' => 'sanitize_string',
				'CantAlumnos' => 'sanitize_string',
				'RegimenHorario' => 'sanitize_string',
				'RegimenLaboral' => 'sanitize_string',
				'Escuela1' => 'sanitize_string',
				'Escuela2' => 'sanitize_string',
				'Alta' => 'sanitize_string',
				'Editable' => 'sanitize_string',
				'UltimaModificacion' => 'sanitize_string',
				'AutorizaEdicion' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("planillasencabezado.idplanilla", $rec_id);;

				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated

				if($bool && $numRows){
					$this->set_flash_msg("Registro actualizado con éxito!", "success");
					return $this->redirect("planillasencabezado");
				} else {
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No se actualizó ningún registro";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("planillasencabezado");
					}
				}
			}
		}

		$db->where("planillasencabezado.idplanilla", $rec_id);;

		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Editar";

		if(!$data){
			$this->set_page_error();
		}

		return $this->render_view("planillasencabezado/edit.php", $data);
	}
	/**
     * Elimina un registro de la base de datos
	 * Soporte multi eliminación separando los registrso por coma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;

		// eliminación múltiple, ID de registro separado por coma en array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("planillasencabezado.idplanilla", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Registro eliminado con éxito!", "success");
		} elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}

		return	$this->redirect("planillasencabezado");
	}
}
