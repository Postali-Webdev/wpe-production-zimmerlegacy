<div class="magnet__item">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail(); ?>
    </a>
    <div class="magnet__item-text">
        <h2><?php the_title(); ?></h2>
        <?php $subtitle = get_field("magnet_sub_title"); ?>
        <?php if ($subtitle): ?>
            <h3><?php echo $subtitle; ?></h3>
        <?php endif; ?>
        <?php $content = get_extended(get_post_field('post_content')); ?>
        <p class="magnet__content "><?php echo $content['extended'] ? $content['main'] : wp_trim_words(get_the_content(), 30) ?></p>
        <a href="<?php the_permalink(); ?>"
           class="button"><?php _e('Download Here') ?></a>
    </div>

</div>