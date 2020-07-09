<?php

//layout for comparison page

get_header(); //include the header
?>
<div class="page-title">
    <h1><?php echo single_post_title();  ?></h1>
</div>


<?php

$comparisonPosts = new WP_Query('cat=5&posts_per_page=6%&order=DESC'); //select the post with category of comparison
if ($comparisonPosts->have_posts()) :
    while ($comparisonPosts->have_posts()) : $comparisonPosts->the_post();
        //display the comparison post
?>
        <div class="card">
            <div class="image pull-left">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
            </div>
            <div class="content pull-left">
                <h4>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <p class="post-info"><?php the_time('F jS, Y g: i a'); ?> | Posted in <?php $categories = the_category(', '); ?></p>
                    <p> <?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
                    <br>
            </div>
            <div class="clearfix">

            </div>
        </div>
    <?php
    endwhile;
else :

    ?>
    <p>No comparison exist</p>
<?php
endif;
wp_reset_postdata(); //reset the query
echo paginate_links(); //display the pagination
get_footer(); //include the footer
?>

