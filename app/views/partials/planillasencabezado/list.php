<?php
$shared_ctrl = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3 p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col">
                    <h4 class="record-title">Planillasencabezado</h4>
                </div>
                <div class="col-sm-3">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("planillasencabezado/add") ?>">
                        <i class="material-icons">add</i>
                        Agregar nuevo
                    </a>
                </div>
                <div class="col-sm-4">
                    <form  class="search" action="<?php print_link('planillasencabezado'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Buscar" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 py-2 px-3">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('planillasencabezado'); ?>">
                                            <i class="material-icons">arrow_back</i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('planillasencabezado'); ?>">
                                            <i class="material-icons">arrow_back</i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Buscar
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class=" p-3 mb-3">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <?php $this::display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="planillasencabezado-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table table-hover table-striped table-sm text-left table-borderless">
                                        <thead class="table-header ">
                                            <tr>
                                                <th  class="td-idplanilla"> ID</th>
                                                <th  class="td-Fecha"> Fecha</th>
                                                <th  class="td-iddocente"> Docente asignado</th>
                                                <th  class="td-idcomision"> Comision</th>
                                                <th  class="td-idCentroOperativo"> Centro Operativo</th>
                                                <th  class="td-idasignatura"> Asignatura</th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['idplanilla']) ? urlencode($data['idplanilla']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <td class="td-idplanilla"><a href="<?php print_link("planillasencabezado/view/$data[idplanilla]") ?>"><?php echo $data['idplanilla']; ?></a></td>
                                                <td class="td-Fecha"> <?php echo $data['Fecha']; ?></td>
                                                <td class="td-iddocente">
                                                    <a size="sm" class=" page-modal" href="<?php print_link("usuarios/view/" . urlencode($data['iddocente'])) ?>">
                                                        <?php echo $data['usuarios_Apellido'] ?>
                                                    </a>
                                                </td>
                                                <td class="td-idcomision">
                                                    <a size="sm" class=" page-modal" href="<?php print_link("comisiones/view/" . urlencode($data['idcomision'])) ?>">
                                                        <?php echo $data['comisiones_NumeroComision'] ?>
                                                    </a>
                                                </td>
                                                <td class="td-idCentroOperativo">
                                                    <a size="sm" class=" page-modal" href="<?php print_link("centrooperativo/view/" . urlencode($data['idCentroOperativo'])) ?>">
                                                        <?php echo $data['centrooperativo_Nombre'] ?>
                                                    </a>
                                                </td>
                                                <td class="td-idasignatura">
                                                    <a size="sm" class=" page-modal" href="<?php print_link("asignaturas/view/" . urlencode($data['idasignatura'])) ?>">
                                                        <?php echo $data['asignaturas_Asignatura'] ?>
                                                    </a>
                                                </td>
                                                <th class="td-btn">
                                                    <a class="btn btn-sm btn-success has-tooltip" title="Ver registro" href="<?php print_link("planillasencabezado/view/$rec_id"); ?>">
                                                        <i class="material-icons">visibility</i> Ver
                                                    </a>
                                                    <a class="btn btn-sm btn-warning has-tooltip" title="Editar este registro" href="<?php print_link("planillasencabezado/edit/$rec_id"); ?>">
                                                        <i class="material-icons">edit</i> Editar
                                                    </a>
                                                    <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Eliminar este registro" href="<?php print_link("planillasencabezado/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="¿Seguro quiere borrar este registro?" data-display-style="modal">
                                                        <i class="material-icons">clear</i>
                                                        Eliminar
                                                    </a>
                                                </th>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <!--endrecord-->
                                        </tbody>
                                        <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php
                                    if(empty($records)){
                                    ?>
                                    <!-- Empty Record Message -->
                                    <div class="text-center text-muted animated bounce my-5">
                                        <?php HTML::page_img(SITE_ADDR. IMG_DIR . "empty.png", 320) ?>
                                        <h4 class="my-3"> No se encontraron registros </h4>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if( $show_footer && !empty($records)){
                                ?>
                                <!-- <div class=" border-top mt-3"> -->
                                    <div class=" mt-3">
                                        <div class="row justify-content-center">
                                            <div class="col-md-auto justify-content-center">
                                                <div class="d-flex justify-content-between">
                                                    <button data-prompt-msg="¿Está seguro de que desea eliminar estos registros?" data-display-style="modal" data-url="<?php print_link("planillasencabezado/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="material-icons">clear</i> Eliminar seleccionado
                                                    </button>
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
                                                    <?php Html::import_form('planillasencabezado/import_data' , "Importar datos", 'CSV , JSON'); ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <?php
                                                if($show_pagination == true){
                                                $pager = new Pagination($total_records, $record_count);
                                                $pager->route = $this->route;
                                                $pager->show_page_count = true;
                                                $pager->show_record_count = true;
                                                $pager->show_page_limit =true;
                                                $pager->limit_count = $this->limit_count;
                                                $pager->show_page_number_list = true;
                                                $pager->pager_link_range=5;
                                                $pager->render();
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
