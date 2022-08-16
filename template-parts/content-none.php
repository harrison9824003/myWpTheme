<?php 
    /**
     * content none
     * 
     * @package mywordpresstheme
     */

?>

<section class="no-result not-found">
    <header class="page_header">
        <h1 class="page-title"><?php echo esc_heml_e( 'Nothing Found', 'mywp'); ?></h1>
    </header>

    <div class="page-content">
        <?php 
            if ( is_home() && current_user_can( 'publish_posts' ) ) {
                ?>
                    <p>
                        <?php 
                            print_f(
                                wp_kses(
                                    __( '準備好新建一篇文章嗎?<a href="%s">新增+</a>', 'mywp'),
                                    [
                                        'a' => [
                                            'href' => []
                                        ]
                                    ]
                                ),
                                esc_url( admin_url( 'post_new.php' ))
                            )
                        ?>
                    </p>
                <?php
            } else if ( is_search() ) {
                ?>
                <p>
                    <?php 
                        esc_html_e( '抱歉,無法找到您搜尋的結果,請在調整關鍵字搜尋!', 'mywp' );
                    ?>
                </p>
                <?php
                get_search_form();
            } else {
                ?>
                <p>
                    <?php
                        esc_html_e( '無法找到文章,可以用關鍵字搜尋', 'mywp' );
                    ?>
                </p>
                <?php
                get_search_form();
            }
        ?>
    </div>
</section>