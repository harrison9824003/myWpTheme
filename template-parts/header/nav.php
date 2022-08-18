<?php 
    /**
     * nav.
     * 
     * @package mywordpresstheme
     */

    $menu_class = \MYWP_THEME\Inc\Menus::get_instance();
    $header_menu_id = $menu_class->get_meun_id( 'mywp-header-menu' );
    $header_menus = wp_get_nav_menu_items( $header_menu_id );
    // echo "<pre>";
    // print_r($header_menus);
    // wp_die();
?>

<nav class="navbar navbar-expand-lg bg-warning sticky-top shadow">
    <div class="container">
        <a class="navbar-brand link-secondary" href="<?php echo get_home_url(); ?>"><i class="bi bi-house-fill"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if ( ! empty( $header_menus ) && count( $header_menus ) > 0 ) : ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php 
                    foreach( $header_menus as $menu ) {
                        
                        
                        // 第一層選單
                        if ( empty( $menu->menu_item_parent ) ) {
                            $child_menus = $menu_class->get_child_menu_items( $header_menus, $menu->ID );
                            $has_child_menus = count( $child_menus ) > 0 ? true : false ;
                            if ( $has_child_menus ) {
                            ?>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle link-secondary" href="<?= $menu->url ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= esc_html__($menu->title); ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ( $child_menus as $child_menu ) { ?>
                                            <li>
                                                <a class="dropdown-item link-secondary" href="<?= $child_menu->url ?>">
                                                    <?= esc_html__($child_menu->title); ?>
                                                </a>
                                            </li>                                            
                                        <?php } ?>
                                    </ul>
                                </li>

                            <?php
                            } else {                            
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link link-secondary" aria-current="page" href="<?= $menu->url ?>">
                                        <?= esc_html__($menu->title); ?>
                                    </a>
                                </li>
                            <?php
                            }
                        }
                    }
                ?>
            </ul>
            <?php endif; ?>
            <form class="d-flex col-lg-3" role="search">
            <div class="input-group">
                <input class="form-control text-blue border-0 text-secondary" type="search" placeholder="搜尋" aria-label="搜尋">
                <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
            </div>
            </form>
        </div>
    </div>
</nav>