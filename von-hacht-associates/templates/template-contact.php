<?php

/**
 * Template Name: Contact page
 */

remove_action('genesis_loop', 'genesis_do_loop');
remove_action('genesis_sidebar', 'genesis_do_sidebar');

add_action('genesis_loop', 'custom_entry_content'); // Add custom loop


function custom_entry_content()
{ ?>
    <div class="page-breadcrumbs">
        <div class="page-breadcrumbs__container container">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
            ?>
        </div>
    </div>
    <section class="contact-hero">
        <div class="contact-hero__container">
            <div class="contact-hero__content" <?php bg(get_the_post_thumbnail_url()) ?>>
                <h1 class="contact-hero__title">
                    <?php the_title(); ?>
                </h1>
                <?php if (have_rows('hero_ctas')) : ?>
                    <div class="contact-hero__ctas">
                        <?php while (have_rows('hero_ctas')) : the_row(); ?>
                            <div class="contact-hero__item">
                                <div class="contact-hero__item-body">
                                    <?php if ($top_text = get_sub_field('top_text')) : ?>
                                        <div class="contact-hero__item-top">
                                            <?php echo $top_text ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($bottom_text = get_sub_field('bottom_text')) : ?>
                                        <div class="contact-hero__item-bottom">
                                            <?php echo $bottom_text ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="contact-hero__form" id="footer-form">
                <div class="social__form">
                    <div class="form-wrap js-form-wrap social__form-wrap">

                        <?php if ($hero_contact_form = get_field('hero_contact_form')): ?>
                            <?php echo $hero_contact_form ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-info">
        <div class="contact-info__container">
            <div class="contact-info__content">
                <?php if ($info_section_title = get_field('info_section_title')) : ?>
                    <h2 class="contact-info__title">
                        <?php echo $info_section_title; ?>
                    </h2>
                <?php endif; ?>
                <?php if ($contact_info = get_field('contact_info')) : ?>
                    <div class="contact-info__info">
                        <?php echo $contact_info; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($contact_map = get_field('contact_map')) : ?>
                <div class="contact-info__map">
                    <?php echo $contact_map; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="double-cta">
        <div class="double-cta__container">
            <?php if ($first_cta = get_field('first_cta')):
                if ($first_cta_bg = get_field('first_cta_bg')):?>
                    <div class="double-cta__col" <?php bg($first_cta_bg['url']) ?>>
                        <div class="double-cta__text">
                            <?php echo $first_cta ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($second_cta = get_field('second_cta')):
                if ($second_cta_bg = get_field('second_cta_bg')):?>
                    <div class="double-cta__col" <?php bg($second_cta_bg['url']) ?>>
                        <div class="double-cta__text">
                            <?php echo $second_cta ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
    <?php if (have_rows('badges_list')): ?>
    <section class="badges">
        <div class="badges__container container">
            <div class="badges__row">
                <?php while (have_rows('badges_list')) : the_row(); ?>
                    <?php if ($badge = get_sub_field('badge')):
                        if ($badge_link = get_sub_field('badge_link')): ?>
                            <a href="<?php echo $badge_link['url'] ?>" class="badges__item">
                                <?php echo wp_get_attachment_image($badge['id'], 'medium'); ?>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

    <?php
}

genesis();
?>
