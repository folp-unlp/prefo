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
                        <form id="planillasdetalle-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("planillasdetalle/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="idPlanilla">Idplanilla <span class="text-danger">*</span></label>
                                    <div id="ctrl-idPlanilla-holder" class="">
                                        <input id="ctrl-idPlanilla"  value="<?php  echo $this->set_field_value('idPlanilla',""); ?>" type="number" placeholder="Ingrese Idplanilla" step="1"  required="" name="idPlanilla"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="idPAciente">Idpaciente <span class="text-danger">*</span></label>
                                        <div id="ctrl-idPAciente-holder" class="">
                                            <input id="ctrl-idPAciente"  value="<?php  echo $this->set_field_value('idPAciente',""); ?>" type="number" placeholder="Ingrese Idpaciente" step="1"  required="" name="idPAciente"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="TipoPaciente">Tipopaciente <span class="text-danger">*</span></label>
                                            <div id="ctrl-TipoPaciente-holder" class="">
                                                <input id="ctrl-TipoPaciente"  value="<?php  echo $this->set_field_value('TipoPaciente',""); ?>" type="number" placeholder="Ingrese Tipopaciente" step="1"  required="" name="TipoPaciente"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="Sector">Sector <span class="text-danger">*</span></label>
                                                <div id="ctrl-Sector-holder" class="">
                                                    <input id="ctrl-Sector"  value="<?php  echo $this->set_field_value('Sector',""); ?>" type="text" placeholder="Ingrese Sector"  required="" name="Sector"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="Pieza">Pieza <span class="text-danger">*</span></label>
                                                    <div id="ctrl-Pieza-holder" class="">
                                                        <input id="ctrl-Pieza"  value="<?php  echo $this->set_field_value('Pieza',""); ?>" type="text" placeholder="Ingrese Pieza"  required="" name="Pieza"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="Diagnostico">Diagnostico <span class="text-danger">*</span></label>
                                                        <div id="ctrl-Diagnostico-holder" class="">
                                                            <input id="ctrl-Diagnostico"  value="<?php  echo $this->set_field_value('Diagnostico',""); ?>" type="text" placeholder="Ingrese Diagnostico"  required="" name="Diagnostico"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="Tratamiento">Tratamiento <span class="text-danger">*</span></label>
                                                            <div id="ctrl-Tratamiento-holder" class="">
                                                                <input id="ctrl-Tratamiento"  value="<?php  echo $this->set_field_value('Tratamiento',""); ?>" type="number" placeholder="Ingrese Tratamiento" step="1"  required="" name="Tratamiento"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="UOI">Uoi <span class="text-danger">*</span></label>
                                                                <div id="ctrl-UOI-holder" class="">
                                                                    <input id="ctrl-UOI"  value="<?php  echo $this->set_field_value('UOI',""); ?>" type="number" placeholder="Ingrese Uoi" step="1"  required="" name="UOI"  class="form-control " />
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
