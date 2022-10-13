<div class="main-navigation">
    <div class="main-navigation__contact">
        <p>Lorem ipsum  as fasfas asf</p>
        <?php
        $contactphone = get_field('contactPhone', 'option');
        if($contactphone):?>
        <a class="main-navigation__phone contact-phone" href="<?php echo $contactphone['url']; ?>" target="<?php echo $contactphone['target']; ?>" title="<?php echo $contactphone['title']; ?>"><?php get_template_part( 'assets/svg/phone'); echo $contactphone['title']; ?></a>
        <?php
        endif; ?>

        <?php
        $contactmail = get_field('contactMail', 'option');
        if($contactmail):?>
        <a class="main-navigation__mail contact-mail" href="<?php echo $contactmail['url']; ?>" target="<?php echo $contactmail['target']; ?>" title="<?php echo $contactmail['title']; ?>"><?php get_template_part( 'assets/svg/envelope'); echo $contactmail['title']; ?></a>
        <?php
        endif; ?>
    </div>
    <nav class="main-navigation__links">
    <?php 
        wp_nav_menu( 
            array( 
                'menu' => 'main'
            ) 
        ); 
    ?>
    </nav>
</div>