<?php

function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    $breadcrumbs = Array("<a class='breadcrumb-item' href=\"$base\">$home</a>");
    $last = end(array_keys($path));

    // Build the breadcrumbs
    foreach ($path AS $x => $crumb) {
        $title = ucwords(str_replace(Array('.php', '_', '-'), Array('', ' ', ' '), $crumb));
        if ($x != $last)
            $breadcrumbs[] = "<a class='breadcrumb-item' href=\"$base$crumb\">$title</a>";
        else
            $breadcrumbs[] = "<a class='breadcrumb-item'>" . $title . "</a>";
    }
    return implode($separator, $breadcrumbs);
} ?>

<div class="breadcrumb">
    <p><?= breadcrumbs(' 
        <svg width="10px" height="16px" viewBox="0 0 10 16" fill="#fff" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
        newItem.name = curItem.text;
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