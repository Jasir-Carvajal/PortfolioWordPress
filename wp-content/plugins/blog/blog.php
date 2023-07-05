<?php
/**
 * Plugin Name: Blog
 * Description: Despliega las entradas del blog
 * Version: 1.0
 * Author: Jasir Carvajal
 */

 function mostrar_entradas_blog(){
    $publicaciones  = new WP_Query(array('post_type'=>'post'));
    $content = '<section class="publicaciones">';
    if( $publicaciones->have_posts() ){
        while ($publicaciones->have_posts()) {
            $publicaciones->the_post();
            $content .= '<article>
            <a href="'. get_the_permalink() . '">'. get_the_post_thumbnail() . '</a>
            <p>'.get_the_date().'</p>
            <a class="title" href="'. get_the_permalink() . '">'. get_the_title() . '</a>
            <p>'.get_the_excerpt().'</p>
            </article>';
        }
    }

    wp_reset_postdata();
    $content .= '</section>';

    return $content;
 }
 add_shortcode ('entradas_blog', 'mostrar_entradas_blog');

