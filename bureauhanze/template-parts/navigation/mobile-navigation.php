<div class="nav">
    <nav class="nav__content">
        <div class="nav__header">
            <button id="nav--close">&#10005;</button>
        </div>
        <div class="container">
            <nav class="nav__links">
                <?php
                wp_nav_menu( 
                    array( 
                        'menu' => 'mobile'
                    ) 
                ); 
                ?>
            </nav>
        </div>
    </nav>
</div>