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
                        <form id="reporthistory-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("reporthistory/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="reportname">Reportname <span class="text-danger">*</span></label>
                                    <div id="ctrl-reportname-holder" class="">
                                        <input id="ctrl-reportname"  value="<?php  echo $this->set_field_value('reportname',""); ?>" type="text" placeholder="Ingrese Reportname"  required="" name="reportname"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="reporttype">Reporttype <span class="text-danger">*</span></label>
                                        <div id="ctrl-reporttype-holder" class="">
                                            <input id="ctrl-reporttype"  value="<?php  echo $this->set_field_value('reporttype',""); ?>" type="text" placeholder="Ingrese Reporttype"  required="" name="reporttype"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="filtername">Filtername <span class="text-danger">*</span></label>
                                            <div id="ctrl-filtername-holder" class="">
                                                <input id="ctrl-filtername"  value="<?php  echo $this->set_field_value('filtername',""); ?>" type="text" placeholder="Ingrese Filtername"  required="" name="filtername"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="username">Username <span class="text-danger">*</span></label>
                                                <div id="ctrl-username-holder" class="">
                                                    <input id="ctrl-username"  value="<?php  echo $this->set_field_value('username',""); ?>" type="text" placeholder="Ingrese Username"  required="" name="username"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="reportdate">Reportdate <span class="text-danger">*</span></label>
                                                    <div id="ctrl-reportdate-holder" class="input-group">
                                                        <input id="ctrl-reportdate" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('reportdate',""); ?>" type="datetime"  name="reportdate" placeholder="Ingrese Reportdate" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="reporturl">Reporturl <span class="text-danger">*</span></label>
                                                        <div id="ctrl-reporturl-holder" class="">
                                                            <input id="ctrl-reporturl"  value="<?php  echo $this->set_field_value('reporturl',""); ?>" type="text" placeholder="Ingrese Reporturl"  required="" name="reporturl"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="remoteip">Remoteip <span class="text-danger">*</span></label>
                                                            <div id="ctrl-remoteip-holder" class="">
                                                                <input id="ctrl-remoteip"  value="<?php  echo $this->set_field_value('remoteip',""); ?>" type="text" placeholder="Ingrese Remoteip"  required="" name="remoteip"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="requestparameters">Requestparameters <span class="text-danger">*</span></label>
                                                                <div id="ctrl-requestparameters-holder" class="">
                                                                    <textarea placeholder="Ingrese Requestparameters" id="ctrl-requestparameters"  required="" rows="5" name="requestparameters" class=" form-control"><?php  echo $this->set_field_value('requestparameters',""); ?></textarea>
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
