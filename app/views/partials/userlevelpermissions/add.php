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
                        <form id="userlevelpermissions-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("userlevelpermissions/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="userlevelid">Userlevelid <span class="text-danger">*</span></label>
                                    <div id="ctrl-userlevelid-holder" class="">
                                        <input id="ctrl-userlevelid"  value="<?php  echo $this->set_field_value('userlevelid',""); ?>" type="number" placeholder="Ingrese Userlevelid" step="1"  required="" name="userlevelid"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="tablename">Tablename <span class="text-danger">*</span></label>
                                        <div id="ctrl-tablename-holder" class="">
                                            <input id="ctrl-tablename"  value="<?php  echo $this->set_field_value('tablename',""); ?>" type="text" placeholder="Ingrese Tablename"  required="" name="tablename"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="permission">Permission <span class="text-danger">*</span></label>
                                            <div id="ctrl-permission-holder" class="">
                                                <input id="ctrl-permission"  value="<?php  echo $this->set_field_value('permission',""); ?>" type="number" placeholder="Ingrese Permission" step="1"  required="" name="permission"  class="form-control " />
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
