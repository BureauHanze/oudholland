<div class="nav">
    <nav class="nav__content">
        <div class="nav__header">
            <button id="nav--close">&#10005;</button>
        </div>
        <div class="container">
            <nav class="nav__links">
            <?php
            if( get_field('header_select-type') === 'projectinrichting' ) :
                wp_nav_menu( 
                    array( 
                        'menu' => 'projectinrichting'
                    ) 
                );
            elseif(get_field('header_select-type') === 'webshop' || is_product_category() ) :
			wp_nav_menu( 
				array( 
					'menu' => 'webshop'
				) 
			);
            endif; ?>
            </nav>
        </div>
    </nav>
</div>