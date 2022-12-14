<?php 
    /**
     * index page
     * 
     * @package mywordpresstheme
     */


    get_header();
?>

    <div id="primary">
        <main id="main" class="site-main mt-5" role="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <?php 
                            if ( have_posts() ) :                                
                                ?>
                                    <div class="container">
                                        <?php
                                            if ( is_home() && ! is_front_page() ) {
                                                ?>
                                                    <header class="mb-5">
                                                        <h1>
                                                            <?php single_post_title(); ?>
                                                        </h1>
                                                    </header>
                                                <?php
                                            }
                                            
                                        ?>

                                        <div class="row g-3">
                                            <?php 
                                                $index = 0;
                                                $no_of_columns = 3;
                                                $total_posts = $wp_query->post_count;

                                                while ( have_posts() ): the_post();

                                                    if( 0 === $index % $no_of_columns ) {
                                                        ?>
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <?php
                                                    }

                                                    get_template_part( 'template-parts/content');
                                                    $index++;
                                                    if( ( 0 !== $index && 0 === $index % $no_of_columns ) || $total_posts === $index ) {
                                                        ?>
                                                        </div>
                                                        <?php
                                                    }

                                                endwhile;
                                            ?>
                                        </div>
                                    </div>
                                <?php
                            else : 
                                get_template_part( 'template-parts/content-none' );
                            endif;               
                        ?>

                        <div class="d-flex justify-content-end mt-3 py-3 border-top border-bottom">
                            <?php mywp_pagination(); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>            
        </main>
    </div>

<?php
    get_footer();
?>