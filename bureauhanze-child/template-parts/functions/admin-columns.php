
<?php
// Make admin column fot type page
add_filter( 'manage_pages_columns', 'my_custom_pages_columns' ); 
function my_custom_pages_columns( $columns ) {
    $myCustomColumns = array(
        'type-page' => __( 'Type pagina' )
    );
    $columns = array_merge( $myCustomColumns, $columns );
    /** Remove a Author, Comments Columns **/
    unset(
        $columns['author'],
        $columns['comments']
    );
    return $columns;
}

// Fill custom column with type of page
add_action( 'manage_pages_custom_column', 'bs_event_table_content', 10, 2 );
function bs_event_table_content( $column_name, $post_id ) {
    if ($column_name == 'type-page') {
        if( get_field('header_select-type') == 'projectinrichting' ) :
            echo '<p class="type-page__projectinrichting">Projectinrichting</p>';
        elseif(get_field('header_select-type') == 'webshop') :
            echo '<p class="type-page__webshop">Webshop</p>';
        endif;
    }
}

// Add custom css
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
  #type-page {
    display: table-cell;
    width: 120px;
  }
  .column-type-page {
    display: flex;
  }
  .type-page__webshop,
  .type-page__projectinrichting {
    display: flex;
    justify-content: center;
    width: 100%;
    padding: 10px;
    margin: 0 !important;
    border-radius: 5px;
    font-weight: bold;
  }
  .type-page__webshop {
    background: #2F4B5D;
    color: white !important;
  }
  .type-page__projectinrichting {
    background: #DAE3E8;
    color: #2F4B5D !important;
  }
  </style>';
}