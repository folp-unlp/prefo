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
                        <form id="imptotal-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("imptotal/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="DNI">Dni <span class="text-danger">*</span></label>
                                    <div id="ctrl-DNI-holder" class="">
                                        <input id="ctrl-DNI"  value="<?php  echo $this->set_field_value('DNI',""); ?>" type="number" placeholder="Ingrese Dni" step="1"  required="" name="DNI"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="Apellido">Apellido <span class="text-danger">*</span></label>
                                        <div id="ctrl-Apellido-holder" class="">
                                            <input id="ctrl-Apellido"  value="<?php  echo $this->set_field_value('Apellido',""); ?>" type="text" placeholder="Ingrese Apellido"  required="" name="Apellido"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="Nombres">Nombres <span class="text-danger">*</span></label>
                                            <div id="ctrl-Nombres-holder" class="">
                                                <input id="ctrl-Nombres"  value="<?php  echo $this->set_field_value('Nombres',""); ?>" type="text" placeholder="Ingrese Nombres"  required="" name="Nombres"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="COM">Com <span class="text-danger">*</span></label>
                                                <div id="ctrl-COM-holder" class="">
                                                    <input id="ctrl-COM"  value="<?php  echo $this->set_field_value('COM',""); ?>" type="number" placeholder="Ingrese Com" step="1"  required="" name="COM"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="DIA">Dia <span class="text-danger">*</span></label>
                                                    <div id="ctrl-DIA-holder" class="">
                                                        <input id="ctrl-DIA"  value="<?php  echo $this->set_field_value('DIA',""); ?>" type="text" placeholder="Ingrese Dia"  required="" name="DIA"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="HORARIO">Horario <span class="text-danger">*</span></label>
                                                        <div id="ctrl-HORARIO-holder" class="">
                                                            <input id="ctrl-HORARIO"  value="<?php  echo $this->set_field_value('HORARIO',""); ?>" type="text" placeholder="Ingrese Horario"  required="" name="HORARIO"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="F7">F7 <span class="text-danger">*</span></label>
                                                            <div id="ctrl-F7-holder" class="">
                                                                <input id="ctrl-F7"  value="<?php  echo $this->set_field_value('F7',""); ?>" type="text" placeholder="Ingrese F7"  required="" name="F7"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="LUGAR_DE_TRABAJO">Lugar De Trabajo <span class="text-danger">*</span></label>
                                                                <div id="ctrl-LUGAR_DE_TRABAJO-holder" class="">
                                                                    <input id="ctrl-LUGAR_DE_TRABAJO"  value="<?php  echo $this->set_field_value('LUGAR_DE_TRABAJO',""); ?>" type="text" placeholder="Ingrese Lugar De Trabajo"  required="" name="LUGAR_DE_TRABAJO"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label" for="DOCENTE">Docente <span class="text-danger">*</span></label>
                                                                    <div id="ctrl-DOCENTE-holder" class="">
                                                                        <input id="ctrl-DOCENTE"  value="<?php  echo $this->set_field_value('DOCENTE',""); ?>" type="text" placeholder="Ingrese Docente"  required="" name="DOCENTE"  class="form-control " />
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
