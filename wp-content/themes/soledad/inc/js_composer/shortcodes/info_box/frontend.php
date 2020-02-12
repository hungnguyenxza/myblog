<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title_text
 * @var $_use_line
 * @var $description_text
 * @var $icon_position
 * @var $title_mar_top
 * @var $title_mar_bottom
 * @var $des_mar_top
 * @var $icon_type
 * @var $image
 * @var $image_hover
 * @var $icon_fontawesome
 * @var $icon_view
 * @var $icon_shape
 * @var $icon_hover_animation
 * @var $img_wh
 * @var $icon_mar_bottom
 * @var $icon_padding
 * @var $_link
 * @var $pline_width
 * @var $pline_height
 * @var $line_margin_top
 * @var $line_margin_bottom
 * @var $line_color
 * @var $icon_color
 * @var $icon_bgcolor
 * @var $icon_border_color
 * @var $icon_hcolor
 * @var $icon_hbgcolor
 * @var $icon_hborder_color
 * @var $title_color
 * @var $_title_typo
 * @var $_title_fsize
 * @var $_content_color
 * @var $_content_typo
 * @var $_content_fsize
 * @var $css_animation
 * @var $el_class
 * @var $css
 */

$el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'penci-block-vc penci-info-box';
$css_class .= $icon_position ? ' penci-ibox-' . $icon_position : 'penci-ibox-float-left';
$css_class .= $icon_view ? ' penci-view-' . $icon_view : '';
$css_class .= $icon_shape ? ' penci-shape-' . $icon_shape : '';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$block_id = Penci_Vc_Helper::get_unique_id_block( 'info_box' );

$url      = vc_build_link( $_link );
vc_icon_element_fonts_enqueue( 'fontawesome' );

$a_before = '<span class="penci-ibox-icon-fa">';
$a_after  = '</span>';
if ( strlen( $_link ) > 0 && strlen( $url['url'] ) > 0 ) {
	$a_before = '<a class="penci-ibox-icon-fa" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '"></a>';
	$a_after  = '</a>';
}
?>
<div id="<?php echo esc_attr( $block_id ) ?>" class="<?php echo esc_attr( $css_class ); ?>">
	<div class="penci-ibox-inner">
		<?php
		if ( 'icon' == $icon_type ) {
			echo '<div class="penci-ibox-icon penci-ibox-icon--icon penci-icon ' . ( $icon_hover_animation ? 'penci-animation-' . $icon_hover_animation : '' ) . '">';
			echo $a_before;

			echo '<i class="penci-ibox-icon--i ' . $icon_fontawesome . '"></i>';
			echo $a_after;
			echo '</div>';
		} elseif ( $image ) {
			echo '<div class="penci-ibox-icon penci-ibox-icon--image">';
			echo $a_before;
			echo '<img class="' . ( $image_hover ? 'penci-ibox-img_active' : '' ) . '" src="' . esc_url( wp_get_attachment_url( $image ) ) . '">';

			if ( $image_hover ) {
				echo '<img class="penci-ibox-img_hover" src="' . esc_url( wp_get_attachment_url( $image_hover ) ) . '">';
			}

			echo $a_after;
			echo '</div>';
		}
		?>
		<div class="penci-ibox-content">
		<?php if( $title_text ): ?><h3 class="penci-ibox-title"><?php echo $title_text; ?></h3><?php endif; ?>
		<?php if( $_use_line ): ?><span class="penci-ibox-line"></span><?php endif; ?>
		<?php if( $description_text ): ?><p class="penci-ibox-content"><?php echo do_shortcode( $description_text ); ?></p><?php endif; ?>
		</div>
	</div>
</div>
<?php
$id_info_box = '#' . $block_id;

$css_custom = '';
if ( $atts['title_mar_top'] ) {
	$css_custom = $id_info_box . ' .penci-ibox-title{margin-top:' . esc_attr( $atts['title_mar_top'] ) . '}';
}
if ( $atts['title_mar_bottom'] ) {
	$css_custom = $id_info_box . ' .penci-ibox-title{margin-bottom:' . esc_attr( $atts['title_mar_bottom'] ) . '}';
}
if ( $atts['des_mar_top'] ) {
	$css_custom = $id_info_box . ' .penci-ibox-content{margin-top:' . esc_attr( $atts['des_mar_top'] ) . '}';
}

$line_custom_css = '';
if ( $atts['pline_width'] ) {
	$line_custom_css .= 'width:' . esc_attr( $atts['pline_width'] ) . ';';
}
if ( $atts['pline_height'] ) {
	$line_custom_css .= 'height:' . esc_attr( $atts['pline_height'] ) . ';';
}
if ( $atts['line_margin_top'] ) {
	$line_custom_css .= 'margin-top:' . esc_attr( $atts['line_margin_top'] ) . ';';
}
if ( $atts['line_margin_bottom'] ) {
	$line_custom_css .= 'margin-bottom:' . esc_attr( $atts['line_margin_bottom'] ) . ';';
}
if ( $atts['line_color'] ) {
	$line_custom_css .= 'color:' . esc_attr( $atts['line_color'] ) . ';';
}
if ( $line_custom_css ) {
	$css_custom = $id_info_box . ' .penci-ibox-line{' . esc_attr( $line_custom_css ) . '}';
}



if ( $css_custom ) {
echo '<style>';
	echo $css_custom;
	echo '</style>';
}

