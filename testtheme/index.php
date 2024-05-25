<?php get_header(); ?>
<!-- title container  starts-->
<div class="title-container">
    <div class="title-wrapper">
        <h1>The Demo Blog</h1>
    </div>
</div>
<!-- title container ends-->
<!-- post grid container  starts-->
    <div class="grid-container">
        <div class="grid-wrapper">
        <?php $i = 1; ?>
        <?php while(have_posts()){
        the_post();
        $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');  // retrieve image path for featured image in each post
        $dm_grid_id = '';   //variable for grid class to maintain 2 rows 5 col grid structure in css grid-item-1 to 5
        $dm_grid_id .= 'grid-item-' . $i;
        $i++;
        // print_r($imagepath);
      ?>
            <div class="grid-item <?php echo $dm_grid_id; ?>">
                <img src="<?php echo $imagepath[0]; ?>" alt="">
                <!-- <p><?php //echo $dm_grid_id; ?></p> -->
                <h4><?php  the_title(); ?></h4>
                <p><?php  the_excerpt(); ?></p>
                <a href="<?php echo get_permalink(); ?>" class="btn1">Read More...</a>
            </div>
        <?php } ?>
               
        </div>
        <div class="navi-style"><p><?php echo wp_pagenavi(); ?></p></div>
    </div>
<!-- post grid container  ends-->
<?php get_footer(); ?>


