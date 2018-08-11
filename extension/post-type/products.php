<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post type product
*---------------------------------------------------------------------
*/

add_action('init', 'logi_create_products', 10);

function logi_create_products() {

    /* Start post type template */
    $labels = array(
        'name'                  =>  _x( 'Products', 'post type general name', 'logi' ),
        'singular_name'         =>  _x( 'Products', 'post type singular name', 'logi' ),
        'menu_name'             =>  _x( 'Products', 'admin menu', 'logi' ),
        'name_admin_bar'        =>  _x( 'All Products', 'add new on admin bar', 'logi' ),
        'add_new'               =>  _x( 'Add New', 'Products', 'logi' ),
        'add_new_item'          =>  esc_html__( 'Add New Products', 'logi' ),
        'edit_item'             =>  esc_html__( 'Edit Products', 'logi' ),
        'new_item'              =>  esc_html__( 'New Products', 'logi' ),
        'view_item'             =>  esc_html__( 'View Products', 'logi' ),
        'all_items'             =>  esc_html__( 'All Products', 'logi' ),
        'search_items'          =>  esc_html__( 'Search Products', 'logi' ),
        'not_found'             =>  esc_html__( 'No template found', 'logi' ),
        'not_found_in_trash'    =>  esc_html__( 'No template found in trash', 'logi' ),
        'parent_item_colon'     =>  ''
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-products',
        'rewrite'            => array('slug' => 'product' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type('product', $args );
    /* End post type template */

    /* Start taxonomy template */
    $taxonomy_labels = array(

        'name'              => _x( 'Products categories', 'taxonomy general name', 'logi' ),
        'singular_name'     => _x( 'Products category', 'taxonomy singular name', 'logi' ),
        'search_items'      => __( 'Search template category', 'logi' ),
        'all_items'         => __( 'All Category', 'logi' ),
        'parent_item'       => __( 'Parent category', 'logi' ),
        'parent_item_colon' => __( 'Parent category:', 'logi' ),
        'edit_item'         => __( 'Edit category', 'logi' ),
        'update_item'       => __( 'Update category', 'logi' ),
        'add_new_item'      => __( 'Add New category', 'logi' ),
        'new_item_name'     => __( 'New category Name', 'logi' ),
        'menu_name'         => __( 'Categories', 'logi' ),

    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-category' ),

    );

    register_taxonomy( 'product_cat', array( 'product' ), $taxonomy_args );
    /* End taxonomy template */

    /* Start tag template */
    $taxonomy_tag_labels = array(
        'name'            =>  _x( 'Products tag', 'taxonomy general name', 'logi' ),
        'singular_name'   =>  _x( 'Tag', 'taxonomy singular name', 'logi' ),
        'search_items'    =>  esc_html__( 'Search template tag', 'logi' ),
        'edit_item'       =>  esc_html__( 'Edit Tag', 'logi' ),
        'update_item'     =>  esc_html__( 'Update Tag', 'logi' ),
        'add_new_item'    =>  esc_html__( 'Add New Tag', 'logi' ),
        'new_item_name'   =>  esc_html__( 'New Tag Name', 'logi' ),
        'menu_name'       =>  esc_html__( 'Tag', 'logi' ),
    );

    $taxonomy_tag_args = array(
        'hierarchical'      =>  '',
        'labels'            =>  $taxonomy_tag_labels,
        'show_ui'           =>  true,
        'show_admin_column' =>  true,
        "singular_label"    =>  "Products Tag",
        'rewrite'           =>  array( 'slug' => 'product-tag' ),
    );
    register_taxonomy( 'product_tag', array( 'product' ), $taxonomy_tag_args );
    /* End tag template */

}