<?php
    $blog_url = One_And_One_Assistant_Config::get( 'blog_{market}', 'links', 'blog_US' );
    $cp_applications_url = One_And_One_Assistant_Config::get( 'control_panel_applications_{market}', 'links' );
?>

<div id="assistant-help-panel" class="dashboard-column dashboard-column4 welcome-panel assistant-dashboard-panel">
	<div class="dashboard-row">
		<?php One_And_One_Assistant_View::load_template( 'dashboard/branded-wp-column' ); ?>
        <div class="dashboard-column dashboard-column1 assistant-wordpress-help">
            <div class="inside">
                <h2><?php _e( 'Your WordPress is now ready to get going.', '1and1-wordpress-wizard' ); ?></h2>
                
                <div class="assistant-links">
                    <div class="assistant-links-start">
                        <h3><?php _e( 'Next Steps', '1and1-wordpress-wizard' ); ?></h3>
                        <ul>
                            <?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
                                <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">'.__( 'Edit your front page', '1and1-wordpress-wizard' ).'</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
                                <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">'.__( 'Add additional pages' ).'</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
                            <?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
                                <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">'.__( 'Edit your front page' ).'</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
                                <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">'.__( 'Add additional pages' ).'</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
                                <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">'.__( 'Add a blog post' ).'</a>', admin_url( 'post-new.php' ) ); ?></li>
                            <?php else : ?>
                                <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">'.__( 'Write your first blog post', '1and1-wordpress-wizard' ).'</a>', admin_url( 'post-new.php' ) ); ?></li>
                                <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">'.__( 'Add an About page', '1and1-wordpress-wizard' ).'</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
                            <?php endif; ?>
                            <li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">'.__( 'View your site' ).'</a>', home_url( '/' ) ); ?></li>
                        </ul>
                    </div>
                    <div class="assistant-links-advanced">
                        <h3><?php _e( 'More Actions' ); ?></h3>
                        <ul>
                            <?php if ( $blog_url ): ?>
                                <li>
                                    <a href="<?php echo $blog_url; ?>" target="_blank" class="welcome-icon welcome-learn-more">
                                        <?php esc_html_e( 'first_steps_community_link', '1and1-wordpress-wizard' ); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo wp_customize_url(); ?>" class="welcome-icon dashicons-admin-appearance">
                                    <?php _e( 'customize_theme_in_widget', '1and1-wordpress-wizard' ); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url( admin_url( 'plugins.php' ) ); ?>" class="welcome-icon dashicons-admin-plugins">
                                    <?php esc_html_e( 'dashboard_widget_plugins', '1and1-wordpress-wizard' ); ?>
                                </a>
                            </li>
                            <?php if ( isset( $is_product_domain ) && $is_product_domain === true ) : ?>
                                <li><?php printf( '<a href="%s" target="_blank" class="welcome-icon dashicons-admin-links">'.__( 'dashboard_change_domain', '1and1-wordpress-wizard' ).'</a>', $cp_applications_url ); ?></li>
                            <?php elseif ( ! is_ssl() ) : ?>
                                <li><?php printf( '<a href="%s" target="_blank" class="welcome-icon dashicons-lock">'.__( 'dashboard_activate_ssl', '1and1-wordpress-wizard' ).'</a>', $cp_applications_url ); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
