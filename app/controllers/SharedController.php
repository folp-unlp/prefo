<?php 


/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * planillasencabezado_idcomision_option_list Model Action
     * @return array
     */
	function planillasencabezado_idcomision_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT idComision AS value , idComision AS label FROM comisiones ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * planillasencabezado_idasignatura_option_list Model Action
     * @return array
     */
	function planillasencabezado_idasignatura_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT idAsignatura AS value , idAsignatura AS label FROM asignaturas ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * planillasencabezado_iddocente_option_list Model Action
     * @return array
     */
	function planillasencabezado_iddocente_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT idUsuario AS value , idUsuario AS label FROM usuarios ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * planillasencabezado_idCentroOperativo_option_list Model Action
     * @return array
     */
	function planillasencabezado_idCentroOperativo_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT idCentroOperativo AS value , idCentroOperativo AS label FROM centrooperativo ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_planillas Model Action
     * @return Value
     */
	function getcount_planillas(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM planillasencabezado";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);

		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
