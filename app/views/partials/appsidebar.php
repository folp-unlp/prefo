<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-light bg-white border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php print_link(HOME_PAGE) ?>">
            <img class="img-responsive" src="<?php print_link(SITE_LOGO); ?>" /> <?php echo SITE_NAME ?>
        </a>
        <?php
        if (user_login_status() == true) {
        ?>
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse"></button>
            <button type="button" id="sidebarCollapse" class="btn btn-white">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="navbar-nav ml-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <?php
                            if (!empty(USER_PHOTO)) {
                            ?>
                                <img class="img-fluid rounded-circle mr-2" style="height:30px;" src="<?php print_link(set_img_src(USER_PHOTO, 30, 30)); ?>" />
                            <?php
                            } else {
                            ?>
                                <span class="avatar-icon"><i class="fa fa-user"></i></span>
                            <?php
                            }
                            ?>
                            <span> <?php echo ucwords(USER_NAME); ?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="<?php print_link('account') ?>"><i class="fa fa-user"></i> Mi cuenta</a>
                            <a class="dropdown-item" href="<?php print_link('index/logout?csrf_token=' . Csrf::$token) ?>"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
if (user_login_status() == true) {
?>
    <div id="sidebar" class="navbar-dark bg-dark">
        <!-- <div style="padding: 1rem 1.5rem;">
                <a class="navbar-brand" href="<?php print_link(HOME_PAGE) ?>">
                    <img class="img-responsive" src="<?php print_link(SITE_LOGO); ?>" /> <?php echo SITE_NAME ?>
                    </a>
                </div> -->
        <?php Html::render_menu(Menu::$navbarsideleft, "nav navbar-nav w-100 flex-column align-self-start", "collapse"); ?>
    </div>
<?php
}
?>