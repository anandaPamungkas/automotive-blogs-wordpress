<div class="headline">
    <?php

    //layout file for the contet

    global $headlineId;

    $headline = new WP_Query('cat=7&posts_per_page=1%&order=DESC'); //search for latest post with headline category
    if ($headline->have_posts()) :
        while ($headline->have_posts()) : $headline->the_post();
            //show the latest headline if it exist
    ?>
            <div class="card">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                <div class="clearfix">
                </div>
                <div>
                    <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                    <p class="post-info"><?php the_time('F jS, Y g: i a');  ?></p>
                    <p class="content-paragraph"> <?php the_excerpt(); ?> <a class="read-more" href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
                </div>
            </div>
        <?php
        endwhile;
    else :
        ?>
        <p>No news exist</p>
    <?php
    endif;
    wp_reset_postdata(); //reset the query after use it
    ?>
</div>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
    //show all the post if there are post
?>      
        <div class="card">
            <div class="image pull-left">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
            </div>
            <div class="content pull-left">
                <h4>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <p class="post-info"><?php the_time('F jS, Y g: i a'); ?> | Posted in <?php $categories = the_category(', '); ?></p>
                    <?php the_excerpt(); ?> <a clas="read-more" href="<?php the_permalink(); ?>">Read more &raquo;</a>
                    <br>
            </div>
            <div class="clearfix">

            </div>
        </div>
<?php

    endwhile;
endif;
?>
<div class="pagination">
    <?php echo paginate_links(); //show the pagination?>
</div>