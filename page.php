<?php

//layout file for pages

get_header(); //include the header.php

if (have_posts()) :
    while (have_posts()) : the_post(); 
        //display the content of the page
    ?>    
        <div class="page-card">
            <div class="grid-title">
                <h2><?php the_title() ?></h2>
            </div>
            <div class="grid-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="grid-content">
                <p><?php the_content() ?></p>
            </div>

        </div>

<?php
    endwhile;

else :

    echo '<p>no content found</p>';

endif;

get_footer(); //include footer.php

?>