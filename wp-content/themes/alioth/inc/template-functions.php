<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Alioth
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function alioth_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
    
    if (class_exists('Redux')) {
        
        $option = get_option('pe-redux');
        $classes[] = $option['site_layout'];
        
        if ($option['cursor_active']) {
             $classes[] = 'cursor-active';
            
        }
        
        if ($option['page_loader_active']) {
             $classes[] = 'page-loader-active';
        }
        
        if ($option['animate_header']) {
            
            $classes[] = 'loader-animate-header';
            
        }
        
         if ($pageTransitions = $option['page_transitions_active']) {
            
            $classes[] = 'ajax-enabled';
            
        }
        
         if ($option['smooth_scroll_active']) {
            
            $classes[] = 'smooth-scroll-enabled';
            
        }
        
        
        
        
}

	return $classes;
}
add_filter( 'body_class', 'alioth_body_classes' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function alioth_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'alioth_pingback_header' );

/**
 * Change the Tag Cloud's Font Sizes.
 */

function alioth_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '20';
    $args['largest'] = '20';
    $args['unit'] = 'px';

    return $args;
};

add_filter( 'widget_tag_cloud_args', 'alioth_tag_cloud_font_sizes');

function alioth_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="field-wrap">
    <label class="screen-reader-text" for="s">' . __( 'Search for:' , 'alioth' ) . '</label>
    <label class="alioth-search">' . esc_attr__( 'Search..' , 'alioth' ) . '</label>
    <input id="al-search" class="search-input" type="search" value="' . get_search_query() . '" name="s" id="s" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'alioth_search_form', 100 );


/**
 * Check if the current post/page
 * is built using Elementor
 *
 * @param string $post_id
 * @return bool
 */
function is_built_with_elementor( $post_id = null ) {

	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		return false;
	}

	if ( $post_id == null ) {
		$post_id = get_the_ID();
	}

	if ( is_singular() && \Elementor\Plugin::$instance->documents->get( $post_id )->is_built_with_elementor() ) {
		return true;
	}

	return false;
}

// Remove url field from comment form

function alioth_unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       unset($fields['cookies']);
       return $fields;
}

add_filter('comment_form_default_fields', 'alioth_unset_url_field');

// Add placeholder for Name and Email
function alioth_comment_form_fields($fields){
    
    
    $commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'alioth' );
	$aria_req  = $req ? "aria-required='true'" : '';
    

    
    $fields['author'] = '<div class="field-wrap half-field name-field"><label>Name*</label>' . '<input id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.' </div>';
    
    $fields['email'] = '<div class="field-wrap half-field mail-field"><label>E-mail*</label>' . '<input id="email"  name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' />'.'</div>';


    
    return $fields;
}
add_filter('comment_form_default_fields','alioth_comment_form_fields'); 
                
function alioth_comment_field( $comment_field ) {


  $comment_field =
    '<div class="message-wrap comment-wrap"><label>Your Comment</label>
            <textarea required id="comment" name="comment"  cols="45" rows="4" aria-required="true"></textarea>'. '</div>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'alioth_comment_field' );


function alioth_comment_author( $comment_author ) {
    
     $commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'alioth' );
	$aria_req  = $req ? "aria-required='true'" : '';
    
  $comment_author =
  '<div class="field-wrap half-field name-field"><label>Name*</label>' . '<input id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.' </div>';

  return $comment_author;
}
add_filter( 'comment_form_field_author', 'alioth_comment_author' );

function alioth_comment_email( $comment_email ) {
    
     $commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'alioth' );
	$aria_req  = $req ? "aria-required='true'" : '';
    
  $comment_email =
 '<div class="field-wrap half-field mail-field"><label>E-mail*</label>' . '<input id="email"  name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' />'.'</div>';

  return $comment_email;
}
add_filter( 'comment_form_field_email', 'alioth_comment_email' );

/**
 * Posts Navigation
 */

if ( ! function_exists( 'alioth_posts_nav' ) ) :

function alioth_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="posts-navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 

 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}
endif;


/**
 * Comments
 */

if (!function_exists('alioth_comments')) {
    
function alioth_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
    $is_pingback_comment = $comment->comment_type == 'pingback';
    $comment_class = 'comment';
    if ( $is_pingback_comment ) {
        $comment_class .= ' pingback-comment';
    }
	?>

<li>
    <div class="<?php echo esc_attr($comment_class); ?>">
        <div class="comment-meta">
            <?php if ( ! $is_pingback_comment ) { ?>
            <div class="image"> <?php echo get_avatar($comment, 75); ?> </div>
            <?php } ?>

            <div class="comment-usr">

                <h4 class="name"><?php if ( $is_pingback_comment ) { esc_html_e( 'Pingback:', 'alioth' ); } ?><?php echo get_comment_author_link(); ?></h4>
                <span class="comment_date"><?php comment_date(); ?></span>

            </div>

        </div>

        <div class="text_holder" id="comment-<?php echo comment_ID(); ?>">
            <?php comment_text(); ?>
        </div>

        <?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>

    </div>

    <?php if ($comment->comment_approved == '0') : ?>
    <p><em><?php esc_html_e('Your comment is awaiting moderation.', 'alioth'); ?></em></p>
    <?php endif; ?>
    <?php 
}
}




// Modify comments header text in comments
add_filter( 'alioth_title_comments', 'child_title_comments');

function alioth_child_title_comments() {
    return esc_html__e(comments_number( '<h3>No Responses</h3>', '<h3>1 Response</h3>', '<h3>% Responses...</h3>' ), 'alioth');
}


function register_footer_menu() {
    register_nav_menu( 'footer-menu', __( 'Footer Menu', 'alioth' ) );
}
add_action( 'after_setup_theme', 'register_footer_menu' );


add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
    wp_register_style( 'admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
    //OR
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
}

function add_admin_js( $hook ) {
  wp_enqueue_script ( 'admin_js', get_template_directory_uri() . '/js/admin.js' );

}
add_action('admin_enqueue_scripts', 'add_admin_js');

function get_custom_logo_url()
{
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    return $image[0];
}


add_action( 'woocommerce_after_single_product', 'alioth_output_related_products', 25);

function alioth_output_related_products(){
    
	$args = array( 
        'posts_per_page' => 3,  
        'orderby' => 'rand' 
 ); 
   	woocommerce_related_products( apply_filters( 'alioth_output_related_products_args', $args ) ); 
}
