 <!-- Original Source : http://www.elftronix.com/add-css-class-directly-to-wordpress-menu-item-link/

 This is modified version of code from elftronix.com
 -1 will add custom CSS class to every menu item, while if you will use 1 ut will add Custom css classs to 1st link only.
 normally WordPress themes apply CSS classes to UL and li not a links, that's why you can use this code to add class to anchors.
 i used this code to apply .mdl-navigation__link class from Material Design Framework to anchors, when i was creating WordPress theme with material design. -->


<!-- Step 1 :  Add this to register functions.php navigation menu -->

<?php
register_nav_menus( array(
	'primary' => __( 'Primary Menu',      'materialdesign' ),
) );

?>

<!-- Step 2 : add this code to header.php to display menu -->

<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="site-navigation" class="mdl-navigation" role="navigation">
		<?php
				// Primary navigation menu.
				wp_nav_menu( array(
					'menu_class'     => 'nav-menu',
					'container' => false,
					'theme_location' => 'primary',
					'items_wrap'      => '<ul>%3$s</ul>',
				) );
			?>
	</nav><!-- .main-navigation -->
<?php endif; ?>

<!-- Step 3 :  Add this function to functions.php file to apply .mdl-navigation__link to each a element  -->

<?php
function add_menuclass($ulclass) {
return preg_replace('/<a/', '<a class="mdl-navigation__link"', $ulclass, -1);
}
add_filter('wp_nav_menu','add_menuclass');?>

 <!-- step 4: Add this to themes style.css file -->

<style> 
nav.mdl-navigation li {
  margin: 0;
  padding: 0;
  float: left;
  list-style: none;
  display: inline-block;
}
</style>
