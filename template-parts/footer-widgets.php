<?php

/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$has_footer = is_active_sidebar('footer');

// Only output the container if there are elements to display.
if ($has_footer) {
?>
    <div class="bitad-footer-widgets">
        <?php dynamic_sidebar('footer'); ?>
    </div>
<?php } ?>