<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php print_link(HOME_PAGE) ?>">
            <img class="img-responsive" src="<?php print_link(SITE_LOGO); ?>" /> <?php echo SITE_NAME ?>
            </a>
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            </button>
            <button type="button" id="sidebarCollapse" class="btn">
                <!-- <button type="button" id="sidebarCollapse" class="btn btn-dark"> -->
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                </div>
            </div>
        </div>
        <nav id="sidebar" class="navbar-light bg-light">
            <?php Html::render_menu(Menu::$navbarsideleft  , 'nav navbar-nav w-100 flex-column align-self-start'  , "accordion"); ?>
        </nav>
