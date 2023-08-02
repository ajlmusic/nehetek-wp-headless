<?php function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
            height: 111px;
            width: 110px;
            background-size: 111px 110px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');

add_theme_support('post-thumbnails');


register_nav_menus(
    array(
        'primary' => esc_html__('Primary menu', 'mississippibaptistseminary'),
        'secondary' => esc_html__('Secondary menu', 'mississippibaptistseminary'),
        'footer1'  => esc_html__('Footer1 menu', 'mississippibaptistseminary'),
        'footer2'  => esc_html__('Footer2 menu', 'mississippibaptistseminary'),
        'footer3'  => esc_html__('Footer3 menu', 'mississippibaptistseminary'),
    )
);



function msbsbc_pdf_link_att($atts)
{
    $default = array(
        'link' => '#',
    );
    $a = shortcode_atts($default, $atts);

    return '
    <a href="' . $a['link'] . '" class="bg-transparent hover:bg-msbsbc-gold text-msbsbc-gold font-semibold hover:text-white py-2 px-4 border border-msbsbc-gold hover:border-transparent rounded">Download file.</a>
    <object class="w-full" data="' . $a['link'] . '" width="800" height="500">
            <p>It appears you don\'t have a PDF viewer for this browser.
            No biggie... you can <a href="' . $a['link'] . '">click here to download the PDF file.</a></p>
            </object>';
}
add_shortcode('msbsbcpdf', 'msbsbc_pdf_link_att');

/**
 * Custom post type "program".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_program_init()
{
    $labels = array(
        'name'                  => _x('Programs', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Program', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Programs', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Program', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Program', 'textdomain'),
        'new_item'              => __('New Program', 'textdomain'),
        'edit_item'             => __('Edit Program', 'textdomain'),
        'view_item'             => __('View Program', 'textdomain'),
        'all_items'             => __('All Programs', 'textdomain'),
        'search_items'          => __('Search Programs', 'textdomain'),
        'parent_item_colon'     => __('Parent Programs:', 'textdomain'),
        'not_found'             => __('No programs found.', 'textdomain'),
        'not_found_in_trash'    => __('No programs found in Trash.', 'textdomain'),
        'featured_image'        => _x('Program Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives'              => _x('Program archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into program', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this program', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter programs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Programs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list'            => _x('Programs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'program'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 6,
        'supports'              => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes', 'post-formats', 'custom-fields'),
        'taxonomies'            => array('category', 'post_tag'),
        'show_in_rest'          => true,
        'show_in_graphql'       => true,
        'graphql_single_name'   => 'program',
        'graphql_plural_name'   => 'programs',
        'public'                => true,
        'publicly_queryable'    => true
    );

    register_post_type('program', $args);
}

add_action('init', 'wpdocs_codex_program_init');
