<?php
$page_id = null;
$shared_ctrl = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="border-bottom p-3 mb-3 p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <h4 >Escritorio</h4>
                </div>
            </div>
        </div>
    </div>
    <div  class=" p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-3">
                    <?php $rec_count = $shared_ctrl->getcount_planillas();  ?>
                    <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("planillasencabezado/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons ">search</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">PLANILLAS</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
