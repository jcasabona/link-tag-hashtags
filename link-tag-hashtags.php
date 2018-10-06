
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
        $lth_tags_array = array();
        preg_match_all( '/(?<!\S)#([0-9a-zA-Z]+)/', $text, $lth_tags_array );
        lth_create_tags( $lth_tags_array[1] );

        return preg_replace( '/(?<!\S)#([0-9a-zA-Z]+)/', '<a href="http://joecasabona.local/tag/$1">#$1</a>', $text );
    }

    //@TODO: don't hardcode the dang link.

    add_filter( 'the_content', 'lth_linkify_hashtags' );

    function lth_create_tags( $tags, $tax = 'post_tag' ) {
        foreach( $tags as $tag ) {
            wp_insert_term( $tag, $tax );
        }
    }

    //@TODO: Add posts to new tags!