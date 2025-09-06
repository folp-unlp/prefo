<?php
$shared_ctrl = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3 p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <h4 class="record-title">Ver</h4>
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
                <div class="col-md-12">
                    <?php $this::display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-Fecha">
                                        <th class="title"> Fecha: </th>
                                        <td class="value"> <?php echo $data['Fecha']; ?></td>
                                    </tr>
                                    <tr  class="td-CicloLectivo">
                                        <th class="title"> Ciclolectivo: </th>
                                        <td class="value"> <?php echo $data['CicloLectivo']; ?></td>
                                    </tr>
                                    <tr  class="td-Asignatura">
                                        <th class="title"> Asignatura: </th>
                                        <td class="value"> <?php echo $data['Asignatura']; ?></td>
                                    </tr>
                                    <tr  class="td-Origen">
                                        <th class="title"> Origen: </th>
                                        <td class="value"> <?php echo $data['Origen']; ?></td>
                                    </tr>
                                    <tr  class="td-Destino1">
                                        <th class="title"> Destino1: </th>
                                        <td class="value"> <?php echo $data['Destino1']; ?></td>
                                    </tr>
                                    <tr  class="td-Destino2">
                                        <th class="title"> Destino2: </th>
                                        <td class="value"> <?php echo $data['Destino2']; ?></td>
                                    </tr>
                                    <tr  class="td-Destino3">
                                        <th class="title"> Destino3: </th>
                                        <td class="value"> <?php echo $data['Destino3']; ?></td>
                                    </tr>
                                    <tr  class="td-Destino4">
                                        <th class="title"> Destino4: </th>
                                        <td class="value"> <?php echo $data['Destino4']; ?></td>
                                    </tr>
                                    <tr  class="td-Destino5">
                                        <th class="title"> Destino5: </th>
                                        <td class="value"> <?php echo $data['Destino5']; ?></td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">save</i> Exportar datos
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <i class="fa fa-print mr-1"></i> Imprimir
                                    </a>
                                    <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                        <i class="fa fa-file-pdf-o mr-1"></i> Pdf
                                    </a>
                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                        <i class="fa fa-file-word-o mr-1"></i> Word
                                    </a>
                                    <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                        <i class="fa fa-file-excel-o mr-1"></i> Csv
                                    </a>
                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                        <i class="fa fa-file-excel-o mr-1"></i> Excel
                                    </a>
                                </div>
                            </div>
                            <a class="btn btn-sm btn-warning"  href="<?php print_link("duplicarcomisiones/edit/$rec_id"); ?>">
                                <i class="material-icons">edit</i> Editar
                            </a>
                            <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("duplicarcomisiones/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="¿Seguro quiere borrar este registro?" data-display-style="modal">
                                <i class="material-icons">clear</i> Eliminar
                            </a>
                        </div>
                        <?php
                        }
                        else{
                        ?>
                        <!-- Empty Record Message -->
                        <div class="text-center text-muted animated bounce my-5">
                            <?php HTML::page_img(SITE_ADDR. IMG_DIR . "empty.png", 320) ?>
                            <h4 class="my-3">No se encontraron registros</h4>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
