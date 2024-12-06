<?php
/*
Plugin Name: Hello World by OZ
Description: A simple Hello World WordPress plugin.
Version: 0.1
Author: Oliver Zott
*/

function hello_world() {
    echo "<p>Hello World, from Olli!</p>";
}

add_action('wp_footer', 'hello_world');
