<?php

function breadcrumbs($separator = ' &raquo; ', $home = '') {
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    $breadcrumbs = Array("<a class='breadcrumb-item' href=\"$base\">$home</a>");
    // $last = end(array_keys($path));
    $homeIcon = '<svg class="breadcrumb__icon" width="15px" height="15px" viewBox="0 0 11 11" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Markten" transform="translate(-297.000000, -367.000000)" fill="#1F3F58" fill-rule="nonzero">
                <g id="home-icon" transform="translate(297.750000, 367.750000)">
                    <path d="M3.59682274,0.438597827 C4.2331812,-0.109649457 5.1068509,-0.143914912 5.77287326,0.335801462 L5.90800309,0.442865017 L8.91769784,3.17418585 C9.24418862,3.45403508 9.45034194,3.86565297 9.49212304,4.29878314 L9.5,4.462 L9.4996616,7.76000321 C9.45061911,8.70161912 8.78687629,9.42077984 7.91259388,9.49387262 L7.765,9.5 L1.735,9.5 C0.833931303,9.5 0.0790556303,8.78130498 0.00582073477,7.88921737 L0,7.747 L0,4.462 C0,4.02858995 0.167645608,3.60714239 0.461125241,3.29191298 L0.576996911,3.17886502 L3.59682274,0.438597827 Z M4.75,1.427 C4.69464917,1.427 4.63728348,1.43997181 4.58551244,1.46075254 L4.51300309,1.49713498 L1.46867505,4.25601257 C1.4376983,4.27666374 1.41233232,4.33523857 1.403425,4.42957559 L1.4,4.507 L1.4,7.792 C1.4,7.94927168 1.52316924,8.09469292 1.67061229,8.12859086 L1.735,8.136 L7.72,8.136 C7.87552746,8.136 8.01536624,8.01433481 8.04789582,7.85992243 L8.055,7.792 L8.055,4.507 C8.055,4.45251545 8.040661,4.40221667 8.00270816,4.33033969 L7.94100001,4.22300622 L7.954,4.231 L4.9332233,1.4887767 C4.89638632,1.45193971 4.82780211,1.427 4.75,1.427 Z" id="Shape"></path>
                </g>
            </g>
        </g>
    </svg>';
    $breadcrumbs = Array("<a href=\"$base\">$homeIcon $home</a>");
    // Build the breadcrumbs
    foreach ($path AS $x => $crumb) {
        $title = ucwords(str_replace(Array('.php', '_', '-', 'Home'), Array('', ' ', ' ', ''), $crumb));
        // if ($x != $last)
            $breadcrumbs[] = "<a class='breadcrumb-item' href=\"$base$crumb\">$title</a>";
        // else
        //     $breadcrumbs[] = "<a class='breadcrumb-item'>" . $title . "</a>";
    }
    return implode($separator, $breadcrumbs);
} ?>

<?php
if(!is_product() && !is_product_category() && !is_page('winkelwagen') && !is_account_page() && !is_checkout() ) : ?>
<div class="breadcrumb">
<?php
else : ?> 
<div class="breadcrumb breadcrumb-product">
    <button onclick="history.go(-1);"><?php get_template_part( 'assets/svg/return' ); ?> Terug</button>
<?php
endif; ?>
    <p><?= breadcrumbs(' 
        <svg width="10px" height="16px" viewBox="0 0 10 16" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd">
                <g id="Machinery" transform="translate(-803.000000, -981.000000)" fill-rule="nonzero">
                    <g id="Group-10-Copy-2" transform="translate(776.000000, 961.000000)">
                        <g id="right-chevron-(1)" transform="translate(27.000000, 20.000000)">
                            <polygon id="Path" points="1.886625 0 0 1.8866875 6.1133125 8 0 14.1133125 1.886625 16 9.886625 8"></polygon>
                        </g>
                    </g>
                </g>
            </g>
        </svg>
        ') ?>
    </p>
</div>

<!-- Schema.org Breadcrumb -->
<script>
    var el = document.createElement('script');
    el.type = 'application/ld+json';
    var position = 0;
    var breadcrumb = {
        position:0,
        name:"",
        item:""
    }
    var listArray = []
    var items = document.querySelectorAll('.breadcrumb-item a');
    for(var i = 0; i < items.length; i++) {
        var newItem = Object.create(breadcrumb);
        var curItem = items[i];

        newItem["@type"] = "ListItem";
        position++;
        newItem.position = position;
        newItem.name = curItem.title;
        newItem.item = curItem.getAttribute('href');
        listArray.push(newItem);
    }
    var breadcrumbSchema = {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": listArray
    };
    var finalSchema = JSON.stringify(breadcrumbSchema);
    el.text = finalSchema;
    var head = document.head || document.getElementsByTagName("head")[0];
    head.appendChild(el);
</script>