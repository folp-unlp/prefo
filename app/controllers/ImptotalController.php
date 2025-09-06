<?php 
/**
 * Imptotal Page Controller
 * @category  Controller
 */
class ImptotalController extends BaseController{
	function __construct(){
		parent::__construct();
		$this->tablename = "imptotal";
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
		$fields = ["DNI",
			"Apellido",
			"Nombres",
			"COM",
			"DIA",
			"HORARIO",
			"F7",
			"LUGAR_DE_TRABAJO",
			"DOCENTE"];
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // límite de paginación
		// buscamos registros en todos los campos vidibles
		if(!empty($request->search)){
			$text = trim($request->search);

			$search_condition = "(
				imptotal.DNI LIKE ? OR 
				imptotal.Apellido LIKE ? OR 
				imptotal.Nombres LIKE ? OR 
				imptotal.COM LIKE ? OR 
				imptotal.DIA LIKE ? OR 
				imptotal.HORARIO LIKE ? OR 
				imptotal.F7 LIKE ? OR 
				imptotal.LUGAR_DE_TRABAJO LIKE ? OR 
				imptotal.DOCENTE LIKE ?
			)";

			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);

			// ajustamos las condiciones de búsqueda
			$db->where($search_condition, $search_params);

			//plantilla para búsqueda ajax
			$this->view->search_template = "imptotal/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("imptotal.DNI", ORDER_TYPE);
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

		$page_title = $this->view->page_title = "Imptotal";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;

		$this->view->report_title = $page_title;

		$this->view->report_layout = "report_layout.php";

		$this->view->report_paper_size = "A4";

		$this->view->report_orientation = "portrait";
		$this->render_view("imptotal/list.php", $data); //render the full page
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
		$this->redirect("imptotal");
	}
// No View Function Generated Because No Field is Defined as the Primary Key on the Database Table
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
			$fields = $this->fields = ["DNI","Apellido","Nombres","COM","DIA","HORARIO","F7","LUGAR_DE_TRABAJO","DOCENTE"];
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'DNI' => 'required|numeric',
				'Apellido' => 'required',
				'Nombres' => 'required',
				'COM' => 'required|numeric',
				'DIA' => 'required',
				'HORARIO' => 'required',
				'F7' => 'required',
				'LUGAR_DE_TRABAJO' => 'required',
				'DOCENTE' => 'required',
			);

			$this->sanitize_array = array(
				'DNI' => 'sanitize_string',
				'Apellido' => 'sanitize_string',
				'Nombres' => 'sanitize_string',
				'COM' => 'sanitize_string',
				'DIA' => 'sanitize_string',
				'HORARIO' => 'sanitize_string',
				'F7' => 'sanitize_string',
				'LUGAR_DE_TRABAJO' => 'sanitize_string',
				'DOCENTE' => 'sanitize_string',
			);

			$this->filter_vals = true; //set whether to remove empty fields

			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);

                if($rec_id) {
					$this->set_flash_msg("Registro agregado exitosamente!", "success");

                	return $this->redirect("imptotal");
				} else {
					$this->set_page_error();
				}
			}
		}

		$page_title = $this->view->page_title = "Agregar nuevo";

        $this->render_view("imptotal/add.php");
	}
// No Edit Function Generated Because No Field is Defined as the Primary Key
// No Delete Function Generated Because No Field is Defined as the Primary Key on the Database Table/View

}
