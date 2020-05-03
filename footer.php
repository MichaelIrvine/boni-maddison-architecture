<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Boni•Maddison_Architects
 */

?>

</div>

<footer id="colophon" class="site-footer">

  <div class="copyright-container">
    <?php
		$currentYear = date('Y');
		echo '<p class="footer-copyright">&copy;';
		echo $currentYear;
		echo '</p>';
		echo '<p class="copyright"> | Boni•Maddison Architects</p>';
		?>
  </div>

  <div class="mobile-cover">
    <?php
		wp_nav_menu(array(
			'theme_location' => 'mobile-menu',
			'menu_id'        => 'menu-mobile'
		));
		?>
  </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>