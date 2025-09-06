<?php
$shared_ctrl = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3 p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <h4 class="record-title">Editar</h4>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("pacientes/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="Documento">Documento <span class="text-danger">*</span></label>
                                    <div id="ctrl-Documento-holder" class="">
                                        <input id="ctrl-Documento"  value="<?php  echo $data['Documento']; ?>" type="number" placeholder="Ingrese Documento" step="1"  required="" name="Documento"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="IdComision">Idcomision <span class="text-danger">*</span></label>
                                        <div id="ctrl-IdComision-holder" class="">
                                            <input id="ctrl-IdComision"  value="<?php  echo $data['IdComision']; ?>" type="number" placeholder="Ingrese Idcomision" step="1"  required="" name="IdComision"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="Apellido">Apellido <span class="text-danger">*</span></label>
                                            <div id="ctrl-Apellido-holder" class="">
                                                <input id="ctrl-Apellido"  value="<?php  echo $data['Apellido']; ?>" type="text" placeholder="Ingrese Apellido"  required="" name="Apellido"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="Nombres">Nombres <span class="text-danger">*</span></label>
                                                <div id="ctrl-Nombres-holder" class="">
                                                    <input id="ctrl-Nombres"  value="<?php  echo $data['Nombres']; ?>" type="text" placeholder="Ingrese Nombres"  required="" name="Nombres"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="Sexo">Sexo <span class="text-danger">*</span></label>
                                                    <div id="ctrl-Sexo-holder" class="">
                                                        <?php
                                                        $Sexo_options = Menu :: $Sexo;
                                                        $field_value = $data['Sexo'];
                                                        if(!empty($Sexo_options)){
                                                        foreach($Sexo_options as $option){
                                                        $value = $option['value'];
                                                        $label = $option['label'];
                                                        //check if value is among checked options
                                                        $checked = $this->check_form_field_checked($field_value, $value);
                                                        ?>
                                                        <label class="custom-control custom-radio custom-control-inline">
                                                            <input id="ctrl-Sexo" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="Sexo" />
                                                                <span class="custom-control-label"><?php echo $label ?></span>
                                                            </label>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="FechaNacimiento">Fechanacimiento <span class="text-danger">*</span></label>
                                                        <div id="ctrl-FechaNacimiento-holder" class="input-group">
                                                            <input id="ctrl-FechaNacimiento" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['FechaNacimiento']; ?>" type="datetime" name="FechaNacimiento" placeholder="Ingrese Fechanacimiento" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="OS">Os <span class="text-danger">*</span></label>
                                                            <div id="ctrl-OS-holder" class="">
                                                                <input id="ctrl-OS"  value="<?php  echo $data['OS']; ?>" type="text" placeholder="Ingrese Os"  required="" name="OS"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="Residencia">Residencia <span class="text-danger">*</span></label>
                                                                <div id="ctrl-Residencia-holder" class="">
                                                                    <input id="ctrl-Residencia"  value="<?php  echo $data['Residencia']; ?>" type="text" placeholder="Ingrese Residencia"  required="" name="Residencia"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-ajax-status"></div>
                                                            <div class="form-group text-center">
                                                                <button class="btn btn-primary" type="submit">
                                                                    Actualizar
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
