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
                        <form id="usrimp-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("usrimp/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="ASIGNATURA">Asignatura <span class="text-danger">*</span></label>
                                    <div id="ctrl-ASIGNATURA-holder" class="">
                                        <input id="ctrl-ASIGNATURA"  value="<?php  echo $this->set_field_value('ASIGNATURA',""); ?>" type="text" placeholder="Ingrese Asignatura"  required="" name="ASIGNATURA"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="DOCENTE">Docente <span class="text-danger">*</span></label>
                                        <div id="ctrl-DOCENTE-holder" class="">
                                            <input id="ctrl-DOCENTE"  value="<?php  echo $this->set_field_value('DOCENTE',""); ?>" type="text" placeholder="Ingrese Docente"  required="" name="DOCENTE"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="DOCUMENTO">Documento <span class="text-danger">*</span></label>
                                            <div id="ctrl-DOCUMENTO-holder" class="">
                                                <input id="ctrl-DOCUMENTO"  value="<?php  echo $this->set_field_value('DOCUMENTO',""); ?>" type="number" placeholder="Ingrese Documento" step="1"  required="" name="DOCUMENTO"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="AP">Ap <span class="text-danger">*</span></label>
                                                <div id="ctrl-AP-holder" class="">
                                                    <input id="ctrl-AP"  value="<?php  echo $this->set_field_value('AP',""); ?>" type="text" placeholder="Ingrese Ap"  required="" name="AP"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="NOM">Nom <span class="text-danger">*</span></label>
                                                    <div id="ctrl-NOM-holder" class="">
                                                        <input id="ctrl-NOM"  value="<?php  echo $this->set_field_value('NOM',""); ?>" type="text" placeholder="Ingrese Nom"  required="" name="NOM"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="APELLIDO">Apellido <span class="text-danger">*</span></label>
                                                        <div id="ctrl-APELLIDO-holder" class="">
                                                            <input id="ctrl-APELLIDO"  value="<?php  echo $this->set_field_value('APELLIDO',""); ?>" type="text" placeholder="Ingrese Apellido"  required="" name="APELLIDO"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="NOMBRES">Nombres <span class="text-danger">*</span></label>
                                                            <div id="ctrl-NOMBRES-holder" class="">
                                                                <input id="ctrl-NOMBRES"  value="<?php  echo $this->set_field_value('NOMBRES',""); ?>" type="text" placeholder="Ingrese Nombres"  required="" name="NOMBRES"  class="form-control " />
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
