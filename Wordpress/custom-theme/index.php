<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<h1><?php bloginfo( 'name' ); ?></h1>
<p><?php bloginfo( 'description' ); ?></p>
<?php echo do_shortcode( '[lemonade_hello]' ); ?>

<?php
$posts = get_posts();
foreach ( $posts as $post ) {
    echo "<div class='post'>";
    echo '<h2>' . esc_html( $post->post_title ) . '</h2>';
    echo '<p>' . wp_kses_post( $post->post_content ) . '</p>';
    echo '</div>';
}
?>

<?php wp_footer(); ?>
</body>
</html>

