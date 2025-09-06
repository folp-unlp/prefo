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
                        <form id="comisiones-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("comisiones/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="CicloLectivo">Ciclolectivo <span class="text-danger">*</span></label>
                                    <div id="ctrl-CicloLectivo-holder" class="">
                                        <input id="ctrl-CicloLectivo"  value="<?php  echo $this->set_field_value('CicloLectivo',""); ?>" type="number" placeholder="Ingrese Ciclolectivo" step="1"  required="" name="CicloLectivo"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="Asignatura">Asignatura <span class="text-danger">*</span></label>
                                        <div id="ctrl-Asignatura-holder" class="">
                                            <input id="ctrl-Asignatura"  value="<?php  echo $this->set_field_value('Asignatura',""); ?>" type="number" placeholder="Ingrese Asignatura" step="1"  required="" name="Asignatura"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="NumeroComision">Numerocomision <span class="text-danger">*</span></label>
                                            <div id="ctrl-NumeroComision-holder" class="">
                                                <input id="ctrl-NumeroComision"  value="<?php  echo $this->set_field_value('NumeroComision',""); ?>" type="number" placeholder="Ingrese Numerocomision" step="1"  required="" name="NumeroComision"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="Dia">Dia <span class="text-danger">*</span></label>
                                                <div id="ctrl-Dia-holder" class="">
                                                    <input id="ctrl-Dia"  value="<?php  echo $this->set_field_value('Dia',""); ?>" type="text" placeholder="Ingrese Dia"  required="" name="Dia"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="Horario">Horario <span class="text-danger">*</span></label>
                                                    <div id="ctrl-Horario-holder" class="">
                                                        <input id="ctrl-Horario"  value="<?php  echo $this->set_field_value('Horario',""); ?>" type="text" placeholder="Ingrese Horario"  required="" name="Horario"  class="form-control " />
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
