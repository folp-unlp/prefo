<?php

// Asigna la URL desde la clase Router
$page_name   = Router::$page_name;
$page_action = Router::$page_action;
$page_id     = Router::$page_id;
$body_class  = "$page_name-" . str_ireplace('list','index', $page_action);
$page_title  = $this->get_page_title();
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="shortcut icon" href="<?php print_link(SITE_FAVICON); ?>" />
    <title><?php echo $page_title; ?></title>

    <?php
    // Metas de página
    Html::page_meta('theme-color',META_THEME_COLOR);
    Html::page_meta('author',META_AUTHOR);
    Html::page_meta('keyword',META_KEYWORDS);
    Html::page_meta('description',META_DESCRIPTION);
    Html::page_meta('viewport',META_VIEWPORT);

    // Estilos CSS
    $theme = get_active_user('theme');
    if (isset($theme)) {
        Html::page_themes(strtolower($theme) . '.css');
    } else {
        Html::page_themes('default.css');
    }

    //Html::page_css('bootstrap-theme-default.css');
    Html::page_css('custom-style.css');
    Html::page_css('material-icons.css');

    // Plugins CSS
    Html::page_css('animate.css');
    Html::page_css('blueimp-gallery.css');
    Html::page_css('flatpickr.min.css');
    // Plugins JS
    Html::page_js('jquery-3.5.1.min.js');
    Html::page_js('qrcode.min.js');
    ?>
</head>
	<body id="main" class="<?php echo $body_class ?> d-flex flex-column h-100">

    <!-- Muestra una barra de progreso cuando se carga ajax -->
    <div class="progress ajax-progress-bar">
        <div class="progress-bar"></div>
    </div>

    <!-- Navegación de página con menú -->
    <nav>
        <?php $this->render_view('appheader.php'); ?>
    </nav>

    <!-- Cuerpo de la página -->
    <main role="main" class="flex-shrink-0">
        <div id="main-content">

            <!-- Contenido principal de la página-->
            <div id="page-content">
                <?php $this->render_body();?>
            </div>

            <!-- Contenedor para mensajes flash -->
            <div class="flash-msg-container">
                <?php show_flash_msg(); ?>
            </div>

            <!-- Modal para mostrar una página ajax -->
            <div id="main-page-modal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body p-0 reset-grids inline-page"></div>
                        <div style="top: 0.875rem; right:0.875rem; z-index: 999;" class="position-absolute">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para mostrar mensaje de eliminación de registro -->
            <div class="modal fade" id="delete-record-modal-confirm" tabindex="-1" role="dialog"
                aria-labelledby="delete-record-modal-confirm" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Se necesita confirmación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="delete-record-modal-msg" class="modal-body"></div>

                        <div class="modal-footer">
                            <a href="" id="delete-record-modal-btn" class="btn btn-danger">Proceder</a>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Componente de Vista previa de imágenes -->
            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div>
            </div>

            <!-- Plantilla para indicadores -->
            <template id="page-loading-indicator">
                <div class="p-2 text-center m-2 text-muted m-auto">
                    <div class="ajax-loader"></div>
                    <h4 class="p-3 mt-2 font-weight-light">Cargando...</h4>
                </div>
            </template>
            <template id="page-saving-indicator">
                <div class="p-2 text-center m-2 text-muted">
                    <div class="lds-dual-ring"></div>
                    <h4 class="p-3 mt-2 font-weight-light">Guardando registro</h4>
                </div>
            </template>
            <template id="inline-loading-indicator">
                <div class="p-2 text-center d-flex justify-content-center">
                    <span class="loader mr-3"></span>
                    <span class="font-weight-bold">Cargando...</span>
                </div>
            </template>
        </div>
    </main>

    <!-- Footer de página -->
    <footer class="footer mt-auto p-3">
	<?php $this->render_view('appfooter.php'); ?>

    </footer>

    <!-- Scripts -->
    <script>
        var siteAddr = '<?php echo SITE_ADDR; ?>';
        var defaultPageLimit = <?php echo MAX_RECORD_COUNT; ?>;
        var csrfToken = '<?php echo Csrf::$token; ?>';
    </script>

    <?php
	Html::page_js('bootstrap.bundle.js');
	Html::page_js('flatpickr.min.js');
	Html::page_js('locale/flatpickr/spanish.js');
	Html::page_js('locale/summernote-es-ES.min.js');
	//boostrapswitch, passwordStrength, twbs-pagination, blueimp-gallery
	Html::page_js('plugins.js');
	Html::page_js('plugins-init.js');
	Html::page_js('page-scripts.js');
	?>
</body>

</html>