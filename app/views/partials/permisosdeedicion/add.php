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
                        <form id="permisosdeedicion-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("permisosdeedicion/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="PlanillaFecha">Planillafecha <span class="text-danger">*</span></label>
                                    <div id="ctrl-PlanillaFecha-holder" class="input-group">
                                        <input id="ctrl-PlanillaFecha" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('PlanillaFecha',""); ?>" type="datetime" name="PlanillaFecha" placeholder="Ingrese Planillafecha" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="PlanillaDocente">Planilladocente <span class="text-danger">*</span></label>
                                        <div id="ctrl-PlanillaDocente-holder" class="">
                                            <input id="ctrl-PlanillaDocente"  value="<?php  echo $this->set_field_value('PlanillaDocente',""); ?>" type="number" placeholder="Ingrese Planilladocente" step="1"  required="" name="PlanillaDocente"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="PlanillaAsignatura">Planillaasignatura <span class="text-danger">*</span></label>
                                            <div id="ctrl-PlanillaAsignatura-holder" class="">
                                                <input id="ctrl-PlanillaAsignatura"  value="<?php  echo $this->set_field_value('PlanillaAsignatura',""); ?>" type="number" placeholder="Ingrese Planillaasignatura" step="1"  required="" name="PlanillaAsignatura"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="PlanillaComision">Planillacomision <span class="text-danger">*</span></label>
                                                <div id="ctrl-PlanillaComision-holder" class="">
                                                    <input id="ctrl-PlanillaComision"  value="<?php  echo $this->set_field_value('PlanillaComision',""); ?>" type="number" placeholder="Ingrese Planillacomision" step="1"  required="" name="PlanillaComision"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="PlanillaFechaHasta">Planillafechahasta <span class="text-danger">*</span></label>
                                                    <div id="ctrl-PlanillaFechaHasta-holder" class="input-group">
                                                        <input id="ctrl-PlanillaFechaHasta" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('PlanillaFechaHasta',""); ?>" type="datetime" name="PlanillaFechaHasta" placeholder="Ingrese Planillafechahasta" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="nueva">Nueva <span class="text-danger">*</span></label>
                                                        <div id="ctrl-nueva-holder" class="">
                                                            <input id="ctrl-nueva"  value="<?php  echo $this->set_field_value('nueva',"N"); ?>" type="text" placeholder="Ingrese Nueva"  required="" name="nueva"  class="form-control " />
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
