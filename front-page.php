<?php
    /**
     * Front page template
     * 
     * @package mywordpresstheme
     */

get_header();

// Banner
$banner_posts = wp_get_recent_posts(array(
    'numberposts' => 3, // 數量
    'post_status' => 'publish', // 顯示發佈文章
    'category' => MY_BANNER_ID
));

// 最新文章
$hot_posts = wp_get_recent_posts(array(
    'numberposts' => 5, // 數量
    'post_status' => 'publish', // 顯示發佈文章
    'category' => MY_HOT_CATEGORY_ID
));

// 最新文章
$announcement_posts = wp_get_recent_posts(array(
    'numberposts' => 5, // 數量
    'post_status' => 'publish', // 顯示發佈文章
    'category' => MY_ANNOUNCEMENT_ID
));

// echo "<pre>";
// print_r($announcement_posts);
// wp_die();

?>

<div class="row">
    <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <?php 
                    $idx = 0;
                    foreach ( $banner_posts as $post_item ) {
                        echo '<div class="carousel-item '.( $idx++ < 1 ? 'active' : '' ).'">';
                        if ( has_post_thumbnail( $post_item['ID'] ) ) { 
                            echo get_the_post_custom_thumbnail( $post_item['ID'], 'thumbnail', array('class' => 'd-block w-100 rounded img-fluid banner') );
                        } else {
                            ?>
                            <img src="https://fakeimg.pl/1000x500/?text=1" class="d-block w-100 rounded" alt="...">
                            <?php
                        }
                        echo '</div>';
                    } 
                ?>                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link text-secondary active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">熱門文章</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-secondary" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">全站公告</button>
            </li>
        </ul>
        <div class="tab-content border border-top-0 px-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">                
                <ul class="list-group list-group-flush">
                    <?php foreach( $hot_posts as $post_item ) : ?>
                        <li class="list-group-item text-secondary d-flex">
                            <a class="link-secondary text-decoration-none" href="<?php echo get_permalink($post_item['ID']); ?>">
                                <i class="bi bi-calendar3 me-2"></i>
                                <span>[ <?php echo date("Y-m-d", strtotime($post_item['post_modified'])); ?> ]</span>
                                <span><?php echo $post_item['post_title']; ?></span>
                                <!-- <span class="ms-auto d-inline-block">詳細內容...</span> -->
                            </a>
                        </li>  
                    <?php endforeach; ?>           
                </ul>                  
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <ul class="list-group list-group-flush">
                    <?php foreach( $announcement_posts as $post_item ) : ?>
                        <li class="list-group-item text-secondary d-flex">
                            <a class="link-secondary text-decoration-none" href="<?php echo get_permalink($post_item['ID']); ?>">
                                <i class="bi bi-calendar3 me-2"></i>
                                <span>[ <?php echo date("Y-m-d", strtotime($post_item['post_modified'])); ?> ]</span>
                                <span><?php echo $post_item['post_title']; ?></span>
                                <!-- <span class="ms-auto d-inline-block">詳細內容...</span> -->
                            </a>
                        </li>  
                    <?php endforeach; ?>    
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <!-- <h3>全站分類</h3>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">1</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
        </ul> -->
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>