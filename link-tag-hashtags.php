
<?php
    /**
     * Plugin Name: Link Tags from Hashtags
     * Plugin URI: https:casabona.org/projects/link-hashtags/
     * Description: This plugin looks for #hashtags in WordPress content and replaces them with links to newly created tags.
     * Author: Joe Casabona
     * Version: 1.0
     * Author URI: http://casabona.org/
     * 
     * @package link-tag-hashtags
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    function lth_linkify_hashtags ( $text ){
        return preg_replace( '/(?<!\S)#([0-9a-zA-Z]+)/', '[#$1](/$1)', $text );
    }

    //@TODO: Make this a filter on content. with add_filter( 'the_content', 'lth_linkify_hashtags' )

    function lth_find_tags( $tags ) {
        $query = new WP_Query( array( 'tag_slug__in' => $tags );

        // If Tags are not found, create them: 
        // wp_insert_term( )
    }