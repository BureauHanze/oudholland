
<aside class="sidebar__content">
    <div class="content__categories">
        <h4>Recente blogs</h4>
        <?php
        $args = array(  
            'post_type' => 'blog',
            'post_status' => 'publish',
            'posts_per_page' => 4, 
            'orderby' => 'date', 
            'order' => 'DESC', 
        );
        $loop = new WP_Query( $args ); ?>
        <ul>
            <?php 
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>    
            </li>
            <?php
            endwhile;
            wp_reset_postdata(); ?>
        </ul>
    </div>
    <div class="contact__paragraph">
        <div class="paragraph__contact-info">
            <?php
            $contactphone = get_field('contactPhone', 'option');
            if($contactphone):?>
            <a class="main__contact" href="<?php echo $contactphone['url']; ?>" target="<?php echo $contactphone['target']; ?>" title="<?php echo $contactphone['title']; ?>"><?php get_template_part( 'assets/svg/phone'); echo $contactphone['title']; ?></a>
            <?php
            endif; 

            $contactmail = get_field('contactMail', 'option');
            if($contactmail):?>
            <a class="main__contact" href="<?php echo $contactmail['url']; ?>" target="<?php echo $contactmail['target']; ?>" title="<?php echo $contactmail['title']; ?>"><?php get_template_part( 'assets/svg/envelope'); echo $contactmail['title']; ?></a>
            <?php
            endif; ?>
        </div>
    </div>
</aside>
