<nav class="navbar navbar-expand-md navbar-light bg-white">
    <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menu-primary-navigation" aria-controls="menu-primary-navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="menu-primary-navigation">
        <?php do_action('magnetic_menu', 'primary_navigation', 'navbar-nav ml-auto'); ?>
    </div>
</nav>