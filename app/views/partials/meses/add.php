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
                        <form id="meses-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("meses/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="Mes">Mes <span class="text-danger">*</span></label>
                                    <div id="ctrl-Mes-holder" class="">
                                        <input id="ctrl-Mes"  value="<?php  echo $this->set_field_value('Mes',""); ?>" type="number" placeholder="Ingrese Mes" step="1"  required="" name="Mes"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="MesTXt">Mestxt <span class="text-danger">*</span></label>
                                        <div id="ctrl-MesTXt-holder" class="">
                                            <textarea placeholder="Ingrese Mestxt" id="ctrl-MesTXt"  required="" rows="5" name="MesTXt" class=" form-control"><?php  echo $this->set_field_value('MesTXt',""); ?></textarea>
                                            <!--<div class="invalid-feedback animated bounceIn text-center">Por favor ingrese el texto</div>-->
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
