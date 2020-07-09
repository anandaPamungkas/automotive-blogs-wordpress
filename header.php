<html lang="en" style="margin-top: 0px !important;">
<!--Layout file for the header-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Spotter</title>

    <?php wp_head()//let wordpress include it function here?>
</head>
<body>
    <header class="site-header">
        <?php
        $args = array(
            'theme_location' => 'primary', //select the menu location that will be displayed
        );
        ?>
        <nav class="site-nav">
            <?php wp_nav_menu($args); //display the selected menu in the array above here
            ?>
        </nav>
    </header>
    <div class="container">