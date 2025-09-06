<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="shortcut icon" href="<?php print_link(SITE_FAVICON); ?>" />
    <title><?php echo $this->get_page_title(); ?></title>
    <?php
    // Metas Page
    Html::page_meta('theme-color', META_THEME_COLOR);
    Html::page_meta('author', META_AUTHOR);
    Html::page_meta('keyword', META_KEYWORDS);
    Html::page_meta('description', META_DESCRIPTION);
    Html::page_meta('viewport', META_VIEWPORT);
    // CSS Stylesheets
    $theme = get_active_user('theme');
    if (isset($theme)) {
        Html::page_themes(strtolower($theme) . '.css');
    } else {
        Html::page_themes('default.css');
    }
    Html::page_css('custom-style.css');
    Html::page_css('font-awesome.min.css');
    // CSS Plugins
    Html::page_css('animate.css');
    // JS Plugins
    Html::page_js('jquery-3.5.1.min.js');
    ?>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">
            <a class="navbar-brand" href="<?php print_link('') ?>">
                <img class="img-responsive" src="<?php print_link(SITE_LOGO); ?>" />
                <?php echo SITE_NAME ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php print_link(HOME_PAGE) ?>">Inicio</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php print_link('info/about') ?>">Acerca de...</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php print_link('info/help') ?>">Preguntas frecuentes</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php print_link('info/contact') ?>">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main role="main" class="flex-shrink-0">
        <div id="main-content">
            <!-- Page Content -->
            <div id="page-content">
                <?php $this->render_body(); ?>
            </div>
        </div>
    </main>
    <footer class="footer text-dark mt-auto p-4">
        <?php $this->render_view('appfooter.php'); ?>
    </footer>
    <?php
    Html::page_js('bootstrap.bundle.min.js');
    ?>
</body>

</html>