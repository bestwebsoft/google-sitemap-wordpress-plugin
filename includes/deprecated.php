<?php
/**
* Includes deprecated functions
*/

/**
 * Remove sitemap directive from robots.txt when removing plugin
 * @deprecated since 3.1.0
 * @todo remove after 28.01.2018
 */
if ( ! function_exists( 'gglstmp_clean_robots' ) ) {
	function gglstmp_clean_robots() {
		$robots_path  = ABSPATH . "robots.txt";
		if ( file_exists( $robots_path ) ) {
			if ( ! is_writable( $robots_path ) )
				@chmod( $robots_path, 0755 );
			if ( is_writable( $robots_path ) ) {
				$content = file_get_contents( $robots_path );
				$content = preg_replace( "~\nSitemap: *\.xml~", '', $content );
				file_put_contents( $robots_path, $content );
			}
		}
	}
}