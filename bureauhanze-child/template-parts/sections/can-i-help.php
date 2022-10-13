<section id="can-i-help-popup" class="can-i-help">
    <div class="popup__circles"></div>
    <div class="container">
        <button id="can-i-help--close">&#10005;</button>
        <h4>Direct contact</h4>
        <div class="popup__content">
            <div class="content__image">
                <img src="/wp-content/uploads/2021/12/bureauhanze.jpeg" alt="">
            </div>
            <div class="content__content">
                <?php
                $contactphone = get_field('contactPhone', 'option');
                if($contactphone):?>
                <a class="main__contact" href="<?php echo $contactphone['url']; ?>" target="<?php echo $contactphone['target']; ?>" title="<?php echo $contactphone['title']; ?>"><?php get_template_part( 'assets/svg/phone'); echo $contactphone['title']; ?></a>
                <?php
                endif; ?>
                <?php
                $contactmail = get_field('contactMail', 'option');
                if($contactmail):?>
                <a class="main__contact" href="<?php echo $contactmail['url']; ?>" target="<?php echo $contactmail['target']; ?>" title="<?php echo $contactmail['title']; ?>"><?php get_template_part( 'assets/svg/envelope'); echo $contactmail['title']; ?></a>
                <?php
                endif; ?>
            </div>
        </div>
    </div>
</section>