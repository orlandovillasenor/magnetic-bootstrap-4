<!doctype html>
<html <?php language_attributes(); ?>>
    
    <?php get_template_part('partials/head'); ?>
        
        <body <?php body_class(); ?>>
            
            <header class="header">            
                
                <?php get_template_part('partials/header'); ?>

            </header>
            
            <main class="main" role="document">
            
                <?php do_action('show_content'); ?>
                
            </main>

            <footer class="footer">
            
                <?php get_template_part('partials/footer'); ?>

            </footer>

            <?php wp_footer(); ?>
        
        </body>

</html>
