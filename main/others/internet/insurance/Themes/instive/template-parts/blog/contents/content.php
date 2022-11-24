<?php

$style = instive_option('post_layout', 'style1');
$style_class = $style == 'style2' ? 'media post-inline' : '';

?>

<article <?php post_class($style_class); ?>>
	<?php get_template_part('template-parts/blog/contents/format/standard', get_post_format()); ?>
</article>