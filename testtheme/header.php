<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <!-- header starts here -->
    <div class="header-container">
        <div class="header-wrapper">
            <div class="header-item header-logo">
            <h3><a class="navbar-brand" href="<?php echo home_url(); ?>"><span><i class="fa-solid fa-face-smile"></i> <span class="site-red">Site</span> LOGO</span></a></h3>
            </div>
            <div class="header-item header-menu">
            <nav class="navbar navbar-expand-lg navbar-custom py-1">
                <div class="container-fluid">
                  
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php   
                             rt_menu('main_menu');
                        ?>
                  </div>
                </div>
              </nav>
            </div>
        </div>
    </div>
    <!-- header ends here -->