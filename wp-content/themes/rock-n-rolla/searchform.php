<form method="get" class="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
    <label>
        <input type="text" class="search-top"
            placeholder="<?php esc_attr_e( 'Busca aquí..', 'rock-n-rolla' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php esc_attr_e( 'Busqueda:', 'rock-n-rolla' ) ?>" />
    </label>
    <input type="submit" class="Search"
        value="<?php esc_attr_e( 'Buscar', 'rock-n-rolla' ) ?>" />
</form>