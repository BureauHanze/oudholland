<?php

// add_image_size ( string $name, int $width, int $height, bool|array $crop = false )
add_image_size( 'hero', 1920, 800, true  );
add_image_size( 'hero-page', 1920, 640, true  );
add_image_size( 'hero-single', 1920, 640, true  );

// Cards
add_image_size( 'card', 640, 480, true  );
add_image_size( 'card-blog', 240, 0, true  );

// Brands
add_image_size( 'brand', 999, 128, false  );

// Favicons (automatic generate)
add_image_size( 'favicon', 16, 16, false  );
add_image_size( 'favicon-chrome', 192, 192, false  );
add_image_size( 'favicon-apple', 180, 180, false  );
add_image_size( 'favicon-mail', 48, 48, false  );