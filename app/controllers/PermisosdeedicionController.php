<?php 
/**
 * Permisosdeedicion Page Controller
 * @category  Controller
 */
class PermisosdeedicionController extends BaseController{
	function __construct(){
		parent::__construct();
		$this->tablename = "permisosdeedicion";
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
		$fields = ["idPermiso",
			"PlanillaFecha",
			"PlanillaDocente",
			"PlanillaAsignatura",
			"PlanillaComision",
			"PlanillaFechaHasta",
			"nueva"];
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // límite de paginación
		// buscamos registros en todos los campos vidibles
		if(!empty($request->search)){
			$text = trim($request->search);

			$search_condition = "(
				permisosdeedicion.idPermiso LIKE ? OR 
				permisosdeedicion.PlanillaFecha LIKE ? OR 
				permisosdeedicion.PlanillaDocente LIKE ? OR 
				permisosdeedicion.PlanillaAsignatura LIKE ? OR 
				permisosdeedicion.PlanillaComision LIKE ? OR 
				permisosdeedicion.PlanillaFechaHasta LIKE ? OR 
				permisosdeedicion.nueva LIKE ?
			)";

			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);

			// ajustamos las condiciones de búsqueda
			$db->where($search_condition, $search_params);

			//plantilla para búsqueda ajax
			$this->view->search_template = "permisosdeedicion/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("permisosdeedicion.idPermiso", ORDER_TYPE);
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

		$page_title = $this->view->page_title = "Permisosdeedicion";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;

		$this->view->report_title = $page_title;

		$this->view->report_layout = "report_layout.php";

		$this->view->report_paper_size = "A4";

		$this->view->report_orientation = "portrait";
		$this->render_view("permisosdeedicion/list.php", $data); //render the full page
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
		$this->redirect("permisosdeedicion");
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
		$fields = ["idPermiso",
			"PlanillaFecha",
			"PlanillaDocente",
			"PlanillaAsignatura",
			"PlanillaComision",
			"PlanillaFechaHasta",
			"nueva"];
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		} else {
			$db->where("permisosdeedicion.idPermiso", $rec_id);; //select record based on primary key
		}
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

		return $this->render_view("permisosdeedicion/view.php", $record);
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
			$fields = $this->fields = ["PlanillaFecha","PlanillaDocente","PlanillaAsignatura","PlanillaComision","PlanillaFechaHasta","nueva"];
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'PlanillaFecha' => 'required',
				'PlanillaDocente' => 'required|numeric',
				'PlanillaAsignatura' => 'required|numeric',
				'PlanillaComision' => 'required|numeric',
				'PlanillaFechaHasta' => 'required',
				'nueva' => 'required',
			);

			$this->sanitize_array = array(
				'PlanillaFecha' => 'sanitize_string',
				'PlanillaDocente' => 'sanitize_string',
				'PlanillaAsignatura' => 'sanitize_string',
				'PlanillaComision' => 'sanitize_string',
				'PlanillaFechaHasta' => 'sanitize_string',
				'nueva' => 'sanitize_string',
			);

			$this->filter_vals = true; //set whether to remove empty fields

			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);

                if($rec_id) {
					$this->set_flash_msg("Registro agregado exitosamente!", "success");

                	return $this->redirect("permisosdeedicion");
				} else {
					$this->set_page_error();
				}
			}
		}

		$page_title = $this->view->page_title = "Agregar nuevo";

        $this->render_view("permisosdeedicion/add.php");
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
		$fields = $this->fields = ["idPermiso","PlanillaFecha","PlanillaDocente","PlanillaAsignatura","PlanillaComision","PlanillaFechaHasta","nueva"];

		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'PlanillaFecha' => 'required',
				'PlanillaDocente' => 'required|numeric',
				'PlanillaAsignatura' => 'required|numeric',
				'PlanillaComision' => 'required|numeric',
				'PlanillaFechaHasta' => 'required',
				'nueva' => 'required',
			);

			$this->sanitize_array = array(
				'PlanillaFecha' => 'sanitize_string',
				'PlanillaDocente' => 'sanitize_string',
				'PlanillaAsignatura' => 'sanitize_string',
				'PlanillaComision' => 'sanitize_string',
				'PlanillaFechaHasta' => 'sanitize_string',
				'nueva' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("permisosdeedicion.idPermiso", $rec_id);;

				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated

				if($bool && $numRows){
					$this->set_flash_msg("Registro actualizado con éxito!", "success");
					return $this->redirect("permisosdeedicion");
				} else {
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No se actualizó ningún registro";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("permisosdeedicion");
					}
				}
			}
		}

		$db->where("permisosdeedicion.idPermiso", $rec_id);;

		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Editar";

		if(!$data){
			$this->set_page_error();
		}

		return $this->render_view("permisosdeedicion/edit.php", $data);
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
		$db->where("permisosdeedicion.idPermiso", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Registro eliminado con éxito!", "success");
		} elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}

		return	$this->redirect("permisosdeedicion");
	}
}
