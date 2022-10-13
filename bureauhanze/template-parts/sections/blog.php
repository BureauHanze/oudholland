<?php
if(is_front_page()) : ?>
<section class="blog">
    <div class="container">
        <div class="row row__filters">
            <h2>Blogberichten</h2>
            <div id="blog__filter-buttons">
                <?php
                $terms = get_terms( 'blog_category', array( 'hide_empty' => true, 'parent' => 0 ) ); ?>
                <button class="btn active" onclick="filterSelectionBlog('all')">
                Alle categorieën
                </button> 
                <?php
                foreach ( $terms as $term ) : 
                    if($term->count > 0) { ?>
                    <button class="btn" onclick="filterSelectionBlog('<?php echo esc_html( $term->slug ); ?>')">
                        <?php echo esc_html( $term->name ); ?>
                    </button>
                    <?php 
                    }
                endforeach; ?>
                <script>
                var btnContainer = document.getElementById("blog__filter-buttons");
                var btns = btnContainer.getElementsByClassName("btn");
                for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("active");
                        current[0].className = current[0].className.replace(" active", "");
                        this.className += " active";
                    });
                }
                </script>
            </div>
        </div>
        <div class="row">
        <?php
        $args = array(  
            'post_type' => 'blog',
            'post_status' => 'publish',
            'posts_per_page' => 3, 
            'orderby' => 'title', 
            'order' => 'DESC',
        );
        $loop = new WP_Query( $args ); 
        while ( $loop->have_posts() ) : $loop->the_post();
            get_template_part( 'template-parts/cards/blog');
        endwhile;
        wp_reset_postdata(); 
        ?>
        </div>
    </div>
</section>
<?php
elseif(is_page('blog')) : ?>
    <section class="blog">
    <div class="container">
        <div class="row row__filters">
            <h2>Blogberichten</h2>
            <div id="blog__filter-buttons">
                <?php
                $terms = get_terms( 'blog_category', array( 'hide_empty' => true, 'parent' => 0 ) ); ?>
                <button class="btn active" onclick="filterSelectionBlog('all')">
                Alle categorieën
                </button> 
                <?php
                foreach ( $terms as $term ) : 
                    if($term->count > 0) { ?>
                    <button class="btn" onclick="filterSelectionBlog('<?php echo esc_html( $term->slug ); ?>')">
                        <?php echo esc_html( $term->name ); ?>
                    </button>
                    <?php 
                    }
                endforeach; ?>
                <script>
                var btnContainer = document.getElementById("blog__filter-buttons");
                var btns = btnContainer.getElementsByClassName("btn");
                for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("active");
                        current[0].className = current[0].className.replace(" active", "");
                        this.className += " active";
                    });
                }
                </script>
            </div>
        </div>
        <div class="row">
        <?php
        $args = array(  
            'post_type' => 'blog',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'title', 
            'order' => 'DESC',
        );
        $loop = new WP_Query( $args ); 
        while ( $loop->have_posts() ) : $loop->the_post();
            get_template_part( 'template-parts/cards/blog');
        endwhile;
        wp_reset_postdata();
        ?>
        </div>
    </div>
</section>
<?php
endif; ?>