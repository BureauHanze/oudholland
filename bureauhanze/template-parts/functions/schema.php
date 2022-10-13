<?php

// Schema.org
function addschema()
{
    global $post;
    $headline = get_the_title($post->ID);
    $description = get_the_content($post->ID);
    $permalink = get_permalink();
    $faviconcompany = get_field('contactFavicon', 'option');            // Favicon
    $company = get_field('contactCompany', 'option');                   // Bedrijfsnaam
    $slogancompany = get_field('contactSlogan', 'option');              // Ondertitel bedrijf
    $urlcompany = get_field('contactURL', 'option');                    // Website URL
    $addresscompany = get_field('contactAddress', 'option');            // Adres
    $postalcompany = get_field('contactPostal', 'option');              // Postcode
    $placecompany = get_field('contactPlace', 'option');                // Plaatsnaam
    $phonecompany = get_field('contactPhone', 'option');                // Telefoonnummer
    $instagramcompany = get_field('contactInstagram', 'option');        // Instagram URL
    $linkedincompany = get_field('contactLinkedIn', 'option');          // LinkedIn URL
    $seodescription = get_field('seoPageMetaDescription', 'option');    // Meta Description
 
    // Main schema.org for organisation
    $schema_organisation = array(
        '@context'  => "http://schema.org",
        '@type'     => "Organization",
        "@id" => "$urlcompany#organization",
        "name" => $company,
        "alternateName" => $slogancompany,
        "description" => $seodescription, // Meta description van SEO per pagina
        "url" => $urlcompany,
        "logo" => $faviconcompany['sizes']['favicon-chrome'],
        // 'sameAs' => array(
        //     $instagramcompany['url'],
        //     $linkedincompany['url']
        // ),
        "address" => array(
            "@type" => "PostalAddress",
            "addressLocality" => $placecompany,
            "postalCode" => $postalcompany,
            "streetAddress" => $addresscompany
        ),
        "openingHours" => "Mo,Tu,We,Th,Fr,Sa 09:00-18:00",
        "contactPoint" => array(
            "@type" => "ContactPoint",
            "telephone" => $phonecompany['url'],
            "areaServed" => "NL",
            "availableLanguage" => "Dutch"
        )
        // "makesOffer" => array(
        //     "@type" => "Offer",
        //     "priceSpecification" => array(
        //         "@type" => "UnitPriceSpecification",
        //         "priceCurrency" => "EUR",
        //         "price" => "2000-5000"
        //     ),
        //     "itemOffered" => array(
        //         "@type" => "Service",
        //         "name" => "Webdiensten",
        //         "description" => "Lorem ipsum."
        //     )
        // ),

    );
    echo '<script type="application/ld+json">' . json_encode($schema_organisation) . '</script>';
 
    // Schema.org for Custom Post Type "Blog"
    if (is_singular( array('blog')) ){
        $author_id = $post->post_author;
        $author = get_the_author_meta('display_name', $author_id);
        $imgurl = get_the_post_thumbnail_url();
        $datepublished = get_the_date('c'); // Date published in ISO 8601 format
        $datemodified = get_the_modified_time('c'); // Date modified in ISO 8601 format
        $schema_blogposting = array(
            '@context'  => "http://schema.org",
            '@type'     => "BlogPosting",
            'mainEntityOfPage' => array(
                '@type' => "WebPage",
                '@id'   => $permalink
            ),
            'headline' => $headline,
            'image'     => array(
                '@type'     => "ImageObject",
                'url'       => $imgurl,
                'height'    => "440",
                'width'     => "880"
            ),
            'datePublished' => $datepublished,
            'dateModified' => $datemodified,
            'author'    => array(
                '@type'     => "Person",
                'name'      => $author
            ),
            'publisher' => array(
                '@type' => "Organization",
                'name'  => $company,
                'logo'  => array(
                    '@type'  => "ImageObject",
                    'url'    => $faviconcompany['sizes']['favicon-chrome'],
                    'width'  => "192",
                    'height' => "192"
                )
            ),
            'description' => $description
        );
        echo '<script type="application/ld+json">' . json_encode($schema_blogposting) . '</script>';
    }   
}

add_action('wp_head', 'addschema'); //Add Schema to header