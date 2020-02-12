<?php
$group_color = 'Typo & Color';

vc_map( array(
    'base'          => 'penci_recent_posts',
    'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
    'category'      => 'Soledad',
    'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/recent_posts/frontend.php',
    'weight'        => 700,
    'name'          => __( 'Penci Widget Recent/Popular Posts', 'soledad' ),
    'description'   => __( 'Recent Posts Block', 'soledad' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
            array(
                'type'        => 'loop',
                'heading'     => __( '', 'soledad' ),
                'param_name'  => 'build_query',
                'value'       => 'post_type:post|size:10',
                'settings'    => array(
                    'size'      => array( 'value' => 10, 'hidden' => false ),
                    'post_type' => array( 'value' => 'post', 'hidden' => false )
                ),
                'description' => __( 'Create WordPress loop, to populate content from your site.', 'soledad' ),
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__( 'Custom words length for post titles', 'soledad' ),
                'param_name' => 'title_length',
                'description'     => __( 'If your post titles is too long - You can use this option for trim it. Fill number value here.', 'soledad' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Image Size Type', 'soledad'),
                'value' => array(
                    'Default' => '',
                    'Horizontal Size' => 'horizontal',
                    'Square Size' => 'square',
                    'Vertical Size' => 'vertical',
                    'Custom' => 'custom',
                ),
                'std' => 'horizontal',
                'param_name' => 'penci_size',
            ),
            array(
                'type'             => 'penci_only_number',
                'heading'          => esc_html__( 'Image Ratio.Unit is %. E.g: 50', 'soledad' ),
                'param_name'       => 'penci_img_ratio',
                'value'            => '',
                'std'              => '',
                'min'              => 0,
                'max'              => 100,
                'suffix'           => '%',
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array( 'element' => 'penci_size', 'value' => 'custom' ),
            ),
            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__( 'Display thumbnail on right?', 'soledad' ),
                'param_name' => 'thumbright',
                'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
            ),
            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__( 'Display on 2 columns?', 'soledad' ),
                'param_name' => 'twocolumn',
                'description'     => __( 'If you use 2 columns option, it will ignore option display thumbnail on right.', 'soledad' ),
                'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
            ),
            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__( 'Display 1st post featured?', 'soledad' ),
                'param_name' => 'featured',
                'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
            ),
            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__( 'Display featured post style 2?', 'soledad' ),
                'param_name' => 'featured2',
                'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
            ),
            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__( 'Display all post featured?', 'soledad' ),
                'param_name' => 'allfeatured',
                'description'     => __( 'If you use all post featured option, it will ignore option display thumbnail on right & 2 columns.', 'soledad' ),
                'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
            ),
            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__( 'Hide post date?', 'soledad' ),
                'param_name' => 'hide_postdate',
                'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
            ),
            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__( 'Enable icon post format?', 'soledad' ),
                'param_name' => 'icon_format',
                'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
            ),
        ),
		Penci_Vc_Params_Helper::heading_block_params(),
		Penci_Vc_Params_Helper::params_heading_typo_color(),
        array(
            array(
                'type'             => 'textfield',
                'param_name'       => 'heading_ptittle_settings',
                'heading'          => esc_html__( 'General Posts', 'soledad' ),
                'value'            => '',
                'group'            => $group_color,
                'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
            ),
            array(
                'type'             => 'colorpicker',
                'heading'          => esc_html__( 'Post Border Color', 'soledad' ),
                'param_name'       => 'post_border_color',
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Post title
            array(
                'type'             => 'colorpicker',
                'heading'          => esc_html__( 'Post Title Color', 'soledad' ),
                'param_name'       => 'ptitle_color',
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'colorpicker',
                'heading'          => esc_html__( 'Post Title Hover Color', 'soledad' ),
                'param_name'       => 'ptitle_hcolor',
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'penci_number',
                'param_name'       => 'ptitle_fsize',
                'heading'          => __( 'Font Size for Post Title', 'soledad' ),
                'value'            => '',
                'std'              => '',
                'suffix'           => 'px',
                'min'              => 1,
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => __( 'Custom Font Family for Post Title', 'soledad' ),
                'param_name'       => 'use_ptitle_typo',
                'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'       => 'google_fonts',
                'group'      => $group_color,
                'param_name' => 'ptitle_typo',
                'value'      => '',
                'dependency' => array( 'element' => 'use_ptitle_typo', 'value' => 'yes' ),
            ),
            array(
                'type'       => 'penci_separator',
                'param_name' => 'penci_separator1',
                'group'      => $group_color,
            ),
            // Post meta
            array(
                'type'             => 'colorpicker',
                'heading'          => esc_html__( 'Post Meta Color', 'soledad' ),
                'param_name'       => 'pmeta_color',
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'penci_number',
                'param_name'       => 'pmeta_fsize',
                'heading'          => __( 'Font Size for Post Meta', 'soledad' ),
                'value'            => '',
                'std'              => '',
                'suffix'           => 'px',
                'min'              => 1,
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => __( 'Custom Font Family for Post Meta', 'soledad' ),
                'param_name'       => 'use_pmeta_typo',
                'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'       => 'google_fonts',
                'group'      => $group_color,
                'param_name' => 'pmeta_typo',
                'value'      => '',
                'dependency' => array( 'element' => 'use_pmeta_typo', 'value' => 'yes' ),
            ),
        ),
		Penci_Vc_Params_Helper::extra_params()
	)
) );