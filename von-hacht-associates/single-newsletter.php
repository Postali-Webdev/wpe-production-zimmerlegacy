<?php


remove_action('genesis_loop', 'genesis_do_loop');
remove_action('genesis_sidebar', 'genesis_do_sidebar');
add_action('genesis_sidebar', 'custom_sidebar'); // Add custom sidebar
add_action('genesis_loop', 'custom_entry_content'); // Add custom loop
add_action('genesis_after_header', 'genesischild_top_wrap_widgets');

function genesischild_top_wrap_widgets()
{
    $hero_url = get_the_post_thumbnail_url(get_the_ID(), 'full_hd'); ?>
    <?php if ($hero_url): ?>
    <section class="banner banner-single-post">
        <div class="banner__rotate bg-cover white" style="background-image: url(<?php echo $hero_url ?>);">
            <div class="banner__content">

                <h1 class="banner__title"><?php the_title() ?></h1>

                <?php if ($item2 = get_field('position')): ?>
                    <h3><?php echo $item2 ?></h3>
                <?php endif; ?>
                <?php if ($link = get_field('contact_link')): ?>
                    <div class="button__container">
                        <a class="button button--tranperent" href="<?php echo $link['url']; ?>"
                           target="<?php if ($link['target']) {
                               echo $link['target'];
                           } else {
                               echo '_parent';
                           } ?>"><?php echo $link['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php }

function custom_entry_content()
{ 
        
    ?>
    <div id="main_container">
        <div class="default-page-container ">
            <div class="grid-container">
                <div class="grid-x grid-margin-x list-decor">
                    <div class="cell">
                        <?php get_template_part('parts/core/breadcrumbs', null); ?>
                    </div>

                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); 
                        $postID = get_the_ID(); 
                        $image = get_field('image', $postID); ?>
                            <div class="cell article">
                                <h2><?php the_field('title', $postID); ?></h2>
                                <?php if ($image): ?>
                                    <div class="article-image">
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </div>
                                <?php endif; ?>
                                <p class="entry-meta">
                                    <time datetime="<?php echo get_the_date('c', $postID); ?>" class="entry-time"><?php echo get_the_date('', $postID); ?></time>
                                </p>
                                <p><?php the_field('copy', $postID); ?></p>
                                <a class="more-link button" href="<?php the_field('pdf_link', $postID); ?>" target="_blank">Read More</a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
<?php  wp_reset_postdata(); }


function custom_sidebar()
{
    if ($sidebar_form = get_field('sidebar_form', 'options')) : ?>
        <div class="sidebar-form" id="footer-form">
            <?php echo $sidebar_form; ?>
        </div>
    <?php endif; ?>
    <?php if ($sidebar_testimonial_show = get_field('sidebar_testimonial_show', 'options')): ?>
    <div class="sidebar-testimonial">
        <?php if ($testimonials_heading = get_field('sidebar_testimonial_heading', 'options')): ?>
            <h2 class="sidebar-testimonial__heading"><?php echo $testimonials_heading ?></h2>
        <?php endif; ?>
        <?php foreach ($sidebar_testimonial_show as $post):
            setup_postdata($post); ?>
            <div class="sidebar-testimonial__text">
                <?php echo mb_strimwidth(get_the_content(), 0, 300, '...');
                ?>
            </div>
        <?php endforeach; ?>
        <?php if ($testimonials_all_link = get_field('testimonials_all_link', 'options')): ?>
            <div class="sidebar-testimonial__all text-center">
                <a class="button" href="<?php echo $testimonials_all_link['url']; ?>"
                   target="<?php $testimonials_all_link['target'] ?: '_self'; ?>"><?php echo $testimonials_all_link['title']; ?></a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php }

genesis();
?>
