<?php 
    /**
     * register clock widget
     * 
     * @package mywordpresstheme
     */

    namespace MYWP_THEME\Inc;
    use WP_Widget;

    use MYWP_THEME\Inc\Traits\Singleton;

    class Clock_Widget extends WP_Widget {
        use Singleton;

        public function __construct() {
            parent::__construct(
                'clock_widget',
                'Clock',
                [ 'description' => __( 'Clock Widget', 'mywp' ) ]
            );
        }

        /**
         * 顯示前台 widget 樣式
         */

        public function widget( $args, $instance ){
            extract( $args );

            $title = apply_filters( 'widget_title', $instance['title'] );

            echo $before_widget;

            if( ! empty( $title ) ){
                echo $before_title . $title . $after_title;
            }
            ?>

            <section class="card">
                <div class="clock card-body">
                    <span id="time"></span>
                    <span id="ampm"></span>
                    <span id="time-emoji"></span>
                </div>
            </section>

            <?php
            echo $after_widget;
        }

        /**
         * 設定 widget 表單
         */

        public function form( $instance ) {
            if ( isset( $instance['title'] ) ) {
                $title = $instance['title'];
            } else {
                $title = __( 'New title', 'mywp' );
            }
            ?>

                <p>
                    <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title', 'mywp'); ?></label>
                    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>
                        name="<?php echo $this->get_field_name( 'title' ); ?>"
                        value="<?php echo esc_attr( $title ); ?> " />
                </p>

            <?php
        }

        /**
         * 更新 widget 設定
         */

        public function update( $new_instance, $old_instance ) {
            $instance = [];
            $instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance ) : '';

            return $instance;
        }


    }
?>