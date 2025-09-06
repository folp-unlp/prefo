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
                        <form id="duplicarcomisiones-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("duplicarcomisiones/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
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
                                                <label class="control-label" for="Origen">Origen <span class="text-danger">*</span></label>
                                                <div id="ctrl-Origen-holder" class="">
                                                    <input id="ctrl-Origen"  value="<?php  echo $this->set_field_value('Origen',""); ?>" type="number" placeholder="Ingrese Origen" step="1"  required="" name="Origen"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="Destino1">Destino1 <span class="text-danger">*</span></label>
                                                    <div id="ctrl-Destino1-holder" class="">
                                                        <input id="ctrl-Destino1"  value="<?php  echo $this->set_field_value('Destino1',""); ?>" type="number" placeholder="Ingrese Destino1" step="1"  required="" name="Destino1"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="Destino2">Destino2 <span class="text-danger">*</span></label>
                                                        <div id="ctrl-Destino2-holder" class="">
                                                            <input id="ctrl-Destino2"  value="<?php  echo $this->set_field_value('Destino2',""); ?>" type="number" placeholder="Ingrese Destino2" step="1"  required="" name="Destino2"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="Destino3">Destino3 <span class="text-danger">*</span></label>
                                                            <div id="ctrl-Destino3-holder" class="">
                                                                <input id="ctrl-Destino3"  value="<?php  echo $this->set_field_value('Destino3',""); ?>" type="number" placeholder="Ingrese Destino3" step="1"  required="" name="Destino3"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="Destino4">Destino4 <span class="text-danger">*</span></label>
                                                                <div id="ctrl-Destino4-holder" class="">
                                                                    <input id="ctrl-Destino4"  value="<?php  echo $this->set_field_value('Destino4',""); ?>" type="number" placeholder="Ingrese Destino4" step="1"  required="" name="Destino4"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label" for="Destino5">Destino5 <span class="text-danger">*</span></label>
                                                                    <div id="ctrl-Destino5-holder" class="">
                                                                        <input id="ctrl-Destino5"  value="<?php  echo $this->set_field_value('Destino5',""); ?>" type="number" placeholder="Ingrese Destino5" step="1"  required="" name="Destino5"  class="form-control " />
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
