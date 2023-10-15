<div id="assistant-welcome-panel" class="dashboard-column dashboard-column4 welcome-panel assistant-dashboard-panel">
    <div class="dashboard-row">
	    <?php One_And_One_Assistant_View::load_template( 'dashboard/branded-wp-column' ); ?>
        <div class="dashboard-column dashboard-column1 assistant-preview-text">
            <div class="inside">
                <h2>
	                <?php _e( 'Welcome to WordPress!', '1and1-wordpress-wizard' ); ?>
                </h2>
                <p class="about-description">
					<?php _e( 'setup_assistant_type_title', '1and1-wordpress-wizard' ); ?>
                </p>
                <p class="introduction">
					<?php _e( 'setup_assistant_type_description', '1and1-wordpress-wizard' ); ?>
                </p>
                <a href="<?php echo esc_url( admin_url( 'admin.php?page=1and1-wordpress-wizard' ) ); ?>" class="button button-primary button-hero assistant-get-started-website">
					<?php esc_html_e( 'dashboard_widget_start', '1and1-wordpress-wizard' ); ?>
                </a>
                <br>
                <a href="<?php echo esc_url( admin_url( 'admin.php?page=1and1-wordpress-wizard&setup_type=eshop' ) ); ?>" class="button button-primary button-hero assistant-get-started-eshop">
					<?php esc_html_e( 'dashboard_widget_shop_start', '1and1-wordpress-wizard' ); ?>
                </a>
            </div>
        </div>
    </div>
</div>