<section class="flex-content flex-content-contact-with-maps">
    <div class="container">
        <div class="row">
            <div class="flex-content-maps_contact">
                <div class="paragraph__circle-blue"></div>
                <h3>Showroom</h3>
                <div class="contact__address">
                <?php
                $contactaddress = get_field('contactAddress', 'option');
                if ($contactaddress) : ?>
                    <p>
                    <?php the_field('contactAddress', 'option'); ?>
                    </p>
                <?php
                endif; 
                $contactpostal = get_field('contactPostal', 'option');
                if ($contactpostal) : ?>
                    <p>
                    <?php the_field('contactPostal', 'option');
                    $contactplace = get_field('contactPlace', 'option');
                    if ($contactplace) : ?>
                        <?php the_field('contactPlace', 'option');
                    endif; ?>
                    </p>
                <?php
                endif; ?>
                </div>



                <?php
                $contactphone = get_field('contactPhone', 'option');
                if($contactphone):?>
                <a class="main__contact" href="<?php echo $contactphone['url']; ?>" target="<?php echo $contactphone['target']; ?>" title="<?php echo $contactphone['title']; ?>"><?php get_template_part( 'assets/svg/phone'); ?><span><?php echo $contactphone['title']; ?></span></a>
                <?php
                endif; ?>
                <?php
                $contactmail = get_field('contactMail', 'option');
                if($contactmail):?>
                <a class="main__contact" href="<?php echo $contactmail['url']; ?>" target="<?php echo $contactmail['target']; ?>" title="<?php echo $contactmail['title']; ?>"><?php get_template_part( 'assets/svg/envelope'); ?><span><?php echo $contactmail['title']; ?></span></a>
                <?php
                endif; ?>
            </div>
            <div class="flex-content-maps_map">
                <div class="paragraph__circle-red"></div>
                <?php
                if(get_sub_field('section_flex-content-maps_map')) :
                    the_sub_field('section_flex-content-maps_map');
                endif; ?>
            </div>

        </div>
    </div>
</section>
