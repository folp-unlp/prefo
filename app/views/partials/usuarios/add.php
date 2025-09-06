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
                        <form id="usuarios-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("usuarios/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="Usuario">Usuario <span class="text-danger">*</span></label>
                                    <div id="ctrl-Usuario-holder" class="">
                                        <input id="ctrl-Usuario"  value="<?php  echo $this->set_field_value('Usuario',""); ?>" type="text" placeholder="Ingrese Usuario"  required="" name="Usuario"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="Clave">Clave <span class="text-danger">*</span></label>
                                        <div id="ctrl-Clave-holder" class="">
                                            <input id="ctrl-Clave"  value="<?php  echo $this->set_field_value('Clave',""); ?>" type="text" placeholder="Ingrese Clave"  required="" name="Clave"  class="form-control " />
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
                                                    <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                                                    <div id="ctrl-email-holder" class="">
                                                        <input id="ctrl-email"  value="<?php  echo $this->set_field_value('email',""); ?>" type="email" placeholder="Ingrese Email"  required="" name="email"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="Telefono">Telefono <span class="text-danger">*</span></label>
                                                        <div id="ctrl-Telefono-holder" class="">
                                                            <input id="ctrl-Telefono"  value="<?php  echo $this->set_field_value('Telefono',""); ?>" type="text" placeholder="Ingrese Telefono"  required="" name="Telefono"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="Rol">Rol <span class="text-danger">*</span></label>
                                                            <div id="ctrl-Rol-holder" class="">
                                                                <input id="ctrl-Rol"  value="<?php  echo $this->set_field_value('Rol',""); ?>" type="number" placeholder="Ingrese Rol" step="1"  required="" name="Rol"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="Status">Status <span class="text-danger">*</span></label>
                                                                <div id="ctrl-Status-holder" class="">
                                                                    <input id="ctrl-Status"  value="<?php  echo $this->set_field_value('Status',""); ?>" type="number" placeholder="Ingrese Status" step="1"  required="" name="Status"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label" for="Motivo">Motivo <span class="text-danger">*</span></label>
                                                                    <div id="ctrl-Motivo-holder" class="">
                                                                        <textarea placeholder="Ingrese Motivo" id="ctrl-Motivo"  required="" rows="5" name="Motivo" class=" form-control"><?php  echo $this->set_field_value('Motivo',""); ?></textarea>
                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Por favor ingrese el texto</div>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label" for="eSTADO">Estado <span class="text-danger">*</span></label>
                                                                    <div id="ctrl-eSTADO-holder" class="">
                                                                        <input id="ctrl-eSTADO"  value="<?php  echo $this->set_field_value('eSTADO',""); ?>" type="text" placeholder="Ingrese Estado"  required="" name="eSTADO"  class="form-control " />
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
