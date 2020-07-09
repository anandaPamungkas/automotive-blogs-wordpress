<?php

//this file is layout for detail of every posts

get_header(); //include the header

if (have_posts()) :
    while (have_posts()) :
        the_post();
        //display the detail of the post
?>
        <div class="single-card <?php if (has_post_thumbnail()) { ?> has-thumbnail<?php }  ?>">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
            <div class="single-card-content">
                <h4><?php the_title() ?></h4>
                <p class="post-info"><?php the_time('F jS, Y g: i a'); ?> | Posted in <?php $categories = the_category(', '); ?></p>
                <div class="paragraph"><?php the_content(); ?></div>
            </div>
        </div>

        </article>
        <?php
        /*related post*/
        $activePost = $post->ID;
        $args = array(
            'category__in' => wp_get_post_categories($activePost), //search posts with related category
            'posts_per_page' => 3, //select the latest 3 posts
            'post__not_in' => array($activePost) //exclude this post in related post column
        );
        $relatedpost = get_posts($args);

        if ($relatedpost) {
            setup_postdata($post);
        ?>
            <div class="related-post-title">
                <h3>Related Posts</h3>
            </div>
            <?php
            foreach ($relatedpost as $post) {
                //display the related posts
            ?>
                <div class="card">
                    <div class="image pull-left">
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                    </div>
                    <div class="content pull-left">
                        <h4>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p class="post-info"><?php the_time('F jS, Y g: i a'); ?> | Posted in <?php $categories = the_category(', '); ?></p>
                            <p> <?php the_excerpt(); ?> <a clas="read-more" href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
                            <br>
                    </div>
                    <div class="clearfix">

                    </div>
                </div>
            <?php } ?>

<?php
        }

        wp_reset_postdata(); //reset the query

    endwhile;
endif;
get_footer(); //get the footer
?>