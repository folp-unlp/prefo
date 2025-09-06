<?php 
/**
 * Huerfanos Page Controller
 * @category  Controller
 */
class HuerfanosController extends BaseController{
	function __construct(){
		parent::__construct();
		$this->tablename = "huerfanos";
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
		$fields = ["iddetalle",
			"idPlanilla",
			"idPAciente",
			"TipoPaciente",
			"Sector",
			"Pieza",
			"Diagnostico",
			"Tratamiento",
			"UOI"];
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // límite de paginación
		// buscamos registros en todos los campos vidibles
		if(!empty($request->search)){
			$text = trim($request->search);

			$search_condition = "(
				huerfanos.iddetalle LIKE ? OR 
				huerfanos.idPlanilla LIKE ? OR 
				huerfanos.idPAciente LIKE ? OR 
				huerfanos.TipoPaciente LIKE ? OR 
				huerfanos.Sector LIKE ? OR 
				huerfanos.Pieza LIKE ? OR 
				huerfanos.Diagnostico LIKE ? OR 
				huerfanos.Tratamiento LIKE ? OR 
				huerfanos.UOI LIKE ?
			)";

			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);

			// ajustamos las condiciones de búsqueda
			$db->where($search_condition, $search_params);

			//plantilla para búsqueda ajax
			$this->view->search_template = "huerfanos/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("huerfanos.iddetalle", ORDER_TYPE);
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

		$page_title = $this->view->page_title = "Huerfanos";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;

		$this->view->report_title = $page_title;

		$this->view->report_layout = "report_layout.php";

		$this->view->report_paper_size = "A4";

		$this->view->report_orientation = "portrait";
		$this->render_view("huerfanos/list.php", $data); //render the full page
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
		$this->redirect("huerfanos");
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
			$fields = $this->fields = ["iddetalle","idPlanilla","idPAciente","TipoPaciente","Sector","Pieza","Diagnostico","Tratamiento","UOI"];
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'iddetalle' => 'required|numeric',
				'idPlanilla' => 'required|numeric',
				'idPAciente' => 'required|numeric',
				'TipoPaciente' => 'required|numeric',
				'Sector' => 'required',
				'Pieza' => 'required',
				'Diagnostico' => 'required',
				'Tratamiento' => 'required|numeric',
				'UOI' => 'required|numeric',
			);

			$this->sanitize_array = array(
				'iddetalle' => 'sanitize_string',
				'idPlanilla' => 'sanitize_string',
				'idPAciente' => 'sanitize_string',
				'TipoPaciente' => 'sanitize_string',
				'Sector' => 'sanitize_string',
				'Pieza' => 'sanitize_string',
				'Diagnostico' => 'sanitize_string',
				'Tratamiento' => 'sanitize_string',
				'UOI' => 'sanitize_string',
			);

			$this->filter_vals = true; //set whether to remove empty fields

			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);

                if($rec_id) {
					$this->set_flash_msg("Registro agregado exitosamente!", "success");

                	return $this->redirect("huerfanos");
				} else {
					$this->set_page_error();
				}
			}
		}

		$page_title = $this->view->page_title = "Agregar nuevo";

        $this->render_view("huerfanos/add.php");
	}
// No Edit Function Generated Because No Field is Defined as the Primary Key
// No Delete Function Generated Because No Field is Defined as the Primary Key on the Database Table/View

}
