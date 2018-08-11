<?php

add_filter( 'rwmb_meta_boxes', 'logi_register_meta_boxes' );

function logi_register_meta_boxes() {

    /* Start meta box post */
    $logi_meta_boxes[] = array(
        'id'         => 'post_format_option',
        'title'      => esc_html__( 'Post Format', 'logi' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'id'               => 'logi_gallery_post',
                'name'             => 'Gallery',
                'type'             => 'image_advanced',
                'force_delete'     => false,
                'max_status'       => false,
                'image_size'       => 'thumbnail',
            ),

            array(
                'id'            => 'logi_video_post',
                'name'          => 'Video Or Audio',
                'type'          => 'oembed',
            ),


        )
    );
    /* End meta box post */

    /* Start meta box product */
    $logi_meta_boxes[] = array(
        'id'         => 'post_type_product_option',
        'title'      => esc_html__( 'Product Options', 'logi' ),
        'post_types' => array( 'product' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'id'               =>   'logi_product_file_upload',
                'name'             =>   'Flie Upload',
                'type'             =>   'file_advanced',
                'max_file_uploads' =>   1,
            ),

        )
    );
    /* End meta box product */

    return $logi_meta_boxes;

}