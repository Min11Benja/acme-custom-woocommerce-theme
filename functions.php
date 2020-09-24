<?php 
/**
 *
 * [Pangja] child theme functions and definitions
 * 
 * @package [Pangja]
 * @author  HaruTheme <admin@harutheme.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

//*******************************************************
//Function to change to lost password url
//********************************************************
add_filter( 'lostpassword_url',  'wdm_lostpassword_url', 10, 0 );
function wdm_lostpassword_url() {
    return site_url('/wp-login.php?action=lostpassword');
}

function haru_child_theme_enqueue_scripts() {
    wp_enqueue_style( 'haru-theme-child-style', get_stylesheet_directory_uri(). '/style.css', array('haru-theme-style') );
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/assets/js/haru-custom-script.js',
        array( 'jquery' )
    );
}
add_action( 'wp_enqueue_scripts', 'haru_child_theme_enqueue_scripts', 12 );

/*Remove the you may also like this */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_filter('woocommerce_product_related_posts_query', '__return_empty_array', 100);

/* Hide  Quantity Input field if category slug = stickers*/
add_action( 'wp_head', 'ced_quantity_wp_head' );
function ced_quantity_wp_head() 
{
    if (has_term( array( 'stickers' ), 'product_cat' ))
    {
        ?>
<style type="text/css">
    .quantity,
    .buttons_added {
        width: 0;
        height: 0;
        display: none;
        visibility: hidden;
    }

    div.quantity,
    .woocommerce .button[name=add-to-cart] {
        display: none;
        /*Hide Add to Cart button until last step*/
    }

    form.cart {
        border-radius: 9px;
        border: 5px solid rgba(0, 0, 0, .15);
        background-clip: padding-box;
        padding: 15px 20px;
        margin-bottom: 20px;
        background-color: #fff;
    }
    .woocommerce div.product form.cart div.quantity {
    display: none!important;
}

</style>

<?php
    
        /** remove image hook before single product sumary**/
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

/** remove title hook in single product sumary**/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

/** remove price hook in single product sumary**/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

/** remove short desc hook in single product sumary**/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

/** remove single meta hook in single product sumary**/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/** remove sharing hook in single product sumary**/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

/** add title hook before single product sumary**/
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5 );

/** add price hook before single product sumary
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_price', 10 );
**/

/** add short desc hook before single product sumary**/
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

/** add single meta hook before single product sumary**/
/*add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_meta', 40  );
*/
/** add sharing hook before single product sumary**/
/*add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_sharing', 50  );
*/
/*progress bar added*/
add_action('wapf_before_wrapper', 'wapf_before_wrapper');
function wapf_before_wrapper($product) {
	?>
<div class="wapf-progress">
    <div class="wapf-progress-bar"></div>
    <div class="wapf-progress-steps"></div>
</div>
<?php
}

add_action('wapf_before_product_totals', 'wapf_before_product_totals');
function wapf_before_product_totals($product){
	?>
<div class="wapf_step_buttons">
    <button class="button wapf_btn_prev" style="display:none">Previous</button>
    <button class="button wapf_btn_next">Next</button>
</div>


<?php
}   
        
    }
}



?>
