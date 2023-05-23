<nav class="main-navigation">
    <div class="inner">
        <?php wp_nav_menu([
        'theme_location' => 'left-menu',
        'container' => false,
        'menu_class' => '',
        ]);?>
        <?php wp_nav_menu([
            'theme_location' => 'right-menu',
            'container' => false,
            'menu_class' => '',
        ]);?>
    </div>
    <button type="button" class="btn-menu-close"></button>
</nav>