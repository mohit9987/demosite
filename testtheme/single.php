<?php get_header(); ?>
<!-- title container  starts-->
<div class="title-container">
    <div class="title-wrapper">
    <h2><?php the_title(); ?></h2>
    </div>
</div>
<!-- title container ends-->
<!-- post container  starts-->
<div class="post-container">
    <div class="post-wrapper">
        <div class="post-item">
        <img class="img-fluid rounded" src="<?php the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="..." />
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<!-- post container  ends-->
<?php get_footer(); ?>