<?php
$shared_ctrl = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3 p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <h4 class="record-title">Agregar nuevo</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class=" p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-7">
                    <?php $this::display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="planillasencabezado-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("planillasencabezado/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="idcomision">Idcomision <span class="text-danger">*</span></label>
                                    <div id="ctrl-idcomision-holder" class="">
                                        <select required=""  id="ctrl-idcomision" name="idcomision"  placeholder="Seleccione un valor"    class="custom-select" >
                                            <option value="">Seleccione un valor</option>
                                            <?php
                                            $idcomision_options = $shared_ctrl -> planillasencabezado_idcomision_option_list();
                                            if(!empty($idcomision_options)){
                                            foreach($idcomision_options as $option){
                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                            $selected = $this->set_field_selected('idcomision',$value, "");
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                            </option>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="idasignatura">Idasignatura <span class="text-danger">*</span></label>
                                    <div id="ctrl-idasignatura-holder" class="">
                                        <select required=""  id="ctrl-idasignatura" name="idasignatura"  placeholder="Seleccione un valor"    class="custom-select" >
                                            <option value="">Seleccione un valor</option>
                                            <?php
                                            $idasignatura_options = $shared_ctrl -> planillasencabezado_idasignatura_option_list();
                                            if(!empty($idasignatura_options)){
                                            foreach($idasignatura_options as $option){
                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                            $selected = $this->set_field_selected('idasignatura',$value, "");
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                            </option>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="iddocente">Iddocente <span class="text-danger">*</span></label>
                                    <div id="ctrl-iddocente-holder" class="">
                                        <select required=""  id="ctrl-iddocente" name="iddocente"  placeholder="Seleccione un valor"    class="custom-select" >
                                            <option value="">Seleccione un valor</option>
                                            <?php
                                            $iddocente_options = $shared_ctrl -> planillasencabezado_iddocente_option_list();
                                            if(!empty($iddocente_options)){
                                            foreach($iddocente_options as $option){
                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                            $selected = $this->set_field_selected('iddocente',$value, "");
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                            </option>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="idCentroOperativo">Idcentrooperativo <span class="text-danger">*</span></label>
                                    <div id="ctrl-idCentroOperativo-holder" class="">
                                        <select required=""  id="ctrl-idCentroOperativo" name="idCentroOperativo"  placeholder="Seleccione un valor"    class="custom-select" >
                                            <option value="">Seleccione un valor</option>
                                            <?php
                                            $idCentroOperativo_options = $shared_ctrl -> planillasencabezado_idCentroOperativo_option_list();
                                            if(!empty($idCentroOperativo_options)){
                                            foreach($idCentroOperativo_options as $option){
                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                            $selected = $this->set_field_selected('idCentroOperativo',$value, "");
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                            </option>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="Fecha">Fecha <span class="text-danger">*</span></label>
                                    <div id="ctrl-Fecha-holder" class="input-group">
                                        <input id="ctrl-Fecha" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('Fecha',""); ?>" type="datetime" name="Fecha" placeholder="Ingrese Fecha" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="CantAlumnos">Cantalumnos <span class="text-danger">*</span></label>
                                        <div id="ctrl-CantAlumnos-holder" class="">
                                            <input id="ctrl-CantAlumnos"  value="<?php  echo $this->set_field_value('CantAlumnos',""); ?>" type="number" placeholder="Ingrese Cantalumnos" step="1"  required="" name="CantAlumnos"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="RegimenHorario">Regimenhorario <span class="text-danger">*</span></label>
                                            <div id="ctrl-RegimenHorario-holder" class="">
                                                <input id="ctrl-RegimenHorario"  value="<?php  echo $this->set_field_value('RegimenHorario',""); ?>" type="number" placeholder="Ingrese Regimenhorario" step="1"  required="" name="RegimenHorario"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="RegimenLaboral">Regimenlaboral <span class="text-danger">*</span></label>
                                                <div id="ctrl-RegimenLaboral-holder" class="">
                                                    <input id="ctrl-RegimenLaboral"  value="<?php  echo $this->set_field_value('RegimenLaboral',""); ?>" type="text" placeholder="Ingrese Regimenlaboral"  required="" name="RegimenLaboral"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="Escuela1">Escuela1 <span class="text-danger">*</span></label>
                                                    <div id="ctrl-Escuela1-holder" class="">
                                                        <input id="ctrl-Escuela1"  value="<?php  echo $this->set_field_value('Escuela1',""); ?>" type="text" placeholder="Ingrese Escuela1"  required="" name="Escuela1"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="Escuela2">Escuela2 <span class="text-danger">*</span></label>
                                                        <div id="ctrl-Escuela2-holder" class="">
                                                            <input id="ctrl-Escuela2"  value="<?php  echo $this->set_field_value('Escuela2',""); ?>" type="text" placeholder="Ingrese Escuela2"  required="" name="Escuela2"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="Alta">Alta <span class="text-danger">*</span></label>
                                                            <div id="ctrl-Alta-holder" class="">
                                                                <input id="ctrl-Alta"  value="<?php  echo $this->set_field_value('Alta',""); ?>" type="text" placeholder="Ingrese Alta"  required="" name="Alta"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="Editable">Editable <span class="text-danger">*</span></label>
                                                                <div id="ctrl-Editable-holder" class="">
                                                                    <input id="ctrl-Editable"  value="<?php  echo $this->set_field_value('Editable',"S"); ?>" type="text" placeholder="Ingrese Editable"  required="" name="Editable"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label" for="UltimaModificacion">Ultimamodificacion <span class="text-danger">*</span></label>
                                                                    <div id="ctrl-UltimaModificacion-holder" class="">
                                                                        <input id="ctrl-UltimaModificacion"  value="<?php  echo $this->set_field_value('UltimaModificacion',""); ?>" type="text" placeholder="Ingrese Ultimamodificacion"  required="" name="UltimaModificacion"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label class="control-label" for="AutorizaEdicion">Autorizaedicion <span class="text-danger">*</span></label>
                                                                        <div id="ctrl-AutorizaEdicion-holder" class="input-group">
                                                                            <input id="ctrl-AutorizaEdicion" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('AutorizaEdicion',""); ?>" type="datetime" name="AutorizaEdicion" placeholder="Ingrese Autorizaedicion" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                        <div class="form-ajax-status"></div>
                                                                        <button class="btn btn-primary" type="submit">
                                                                            Guardar
                                                                            <i class="material-icons">send</i>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
