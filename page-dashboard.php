<?php
/** Template Name: Client Dashboard (Project Hub) */

get_header(); ?>

<div class="container container-wide">
    <?php if ( is_user_logged_in() ) :
        // ... (The user and project query remains the same) ...
        $current_user = wp_get_current_user(); $user_id = $current_user->ID;
        $args = ['post_type' => 'client_project', 'posts_per_page' => 1, 'meta_query' => [['key' => 'assigned_client', 'value' => $user_id]]];
        $project_query = new WP_Query( $args );

        if ( $project_query->have_posts() ) : while ( $project_query->have_posts() ) : $project_query->the_post(); ?>

            <header class="dash-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-12);">
                <div>
                    <h1 class="section-heading" style="text-align: left; margin-bottom: 0;"><?php the_title(); ?></h1>
                    <p class="text-secondary">Welcome to your project hub, <?php echo esc_html( $current_user->display_name ); ?>.</p>
                </div>
                <?php $client_logo = get_field('client_logo'); if ($client_logo): ?>
                    <div class="client-logo"><img src="<?php echo esc_url($client_logo); ?>" alt="Client Logo" style="max-height: 50px; max-width: 180px;"></div>
                <?php endif; ?>
            </header>

            <div class="hub-grid" style="display: grid; grid-template-columns: 1fr 320px; gap: var(--spacing-grid); align-items: start;">
                
                <!-- Main Content: Activity Feed -->
                <div class="hub-main-content card">
                    <h3 class="card-title">Recent Activity</h3>
                    <div class="activity-feed" style="display: flex; flex-direction: column; gap: var(--space-6);">
                        <?php if( have_rows('activity_feed') ): ?>
                            <?php while( have_rows('activity_feed') ): the_row(); 
                                $type = get_sub_field('activity_type');
                                $date = get_sub_field('activity_date');
                                $desc = get_sub_field('activity_description');
                                $file = get_sub_field('activity_file');
                                $icon = '💬'; // Default: Message
                                if ($type === 'file_upload') $icon = '📎';
                                if ($type === 'milestone') $icon = '🏆';
                                ?>
                                <div class="activity-item" style="display: flex; gap: var(--space-4);">
                                    <div class="activity-icon" style="font-size: 1.5rem; margin-top: -4px;"><?php echo $icon; ?></div>
                                    <div class="activity-content">
                                        <p style="margin: 0; font-weight: 600; color: var(--color-text-primary);"><?php echo esc_html(ucwords(str_replace('_', ' ', $type))); ?> <span style="color: var(--color-text-muted); font-weight: 400; font-size: var(--fs-sm);">&mdash; <?php echo esc_html(wp_date('F j, Y', strtotime($date))); ?></span></p>
                                        <div class="text-secondary" style="font-size: var(--fs-base);"><?php echo wpautop($desc); ?></div>
                                        <?php if ($type === 'file_upload' && $file): ?>
                                            <a href="<?php echo esc_url($file['url']); ?>" class="btn btn-secondary" style="margin-top: var(--space-3);" download>Download "<?php echo esc_html($file['title']); ?>"</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p class="text-secondary">No project activity has been logged yet.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sidebar: At-a-Glance Info -->
                <div class="hub-sidebar" style="display: flex; flex-direction: column; gap: var(--spacing-grid); position: sticky; top: 120px;">
                    
                    <div class="card">
                        <h3 class="card-title">Project Progress</h3>
                        <?php $progress = get_field('project_progress'); ?>
                        <div class="progress-bar-wrapper" style="background: var(--color-bg-surface); border-radius: var(--ui-radius-full); padding: 4px; position: relative; text-align: center;">
                            <div class="progress-bar-inner" style="background: var(--color-primary); width: <?php echo esc_attr($progress); ?>%; height: 24px; border-radius: var(--ui-radius-full);"></div>
                            <span style="position: absolute; inset: 0; line-height: 24px; font-weight: 600; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);"><?php echo esc_html($progress); ?>% Complete</span>
                        </div>
                    </div>

                    <div class="card">
                        <h3 class="card-title">Your Action Items</h3>
                        <?php if( have_rows('action_items') ): ?>
                            <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: var(--space-2);">
                            <?php while( have_rows('action_items') ): the_row(); $is_complete = get_sub_field('is_complete'); ?>
                                <li style="<?php if($is_complete) echo 'text-decoration: line-through; opacity: 0.6;'; ?>">
                                    <input type="checkbox" <?php if($is_complete) echo 'checked'; ?> disabled style="margin-right: 8px;"> <?php echo esc_html(get_sub_field('task')); ?>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                        <?php else: ?><p class="text-secondary">No tasks are pending your review.</p><?php endif; ?>
                    </div>
                    
                    <div class="card">
                        <h3 class="card-title">Important Links</h3>
                        <?php if( have_rows('quick_links') ): ?>
                            <ul style="list-style: none; padding: 0;">
                                <?php while( have_rows('quick_links') ): the_row(); ?>
                                    <li style="border-bottom: 1px solid var(--glass-border-subtle);"><a href="<?php echo esc_url(get_sub_field('link_url')); ?>" target="_blank" style="display: block; padding: var(--space-2) 0;"><?php echo esc_html(get_sub_field('link_label')); ?> →</a></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php else: ?><p class="text-secondary">No links have been added yet.</p><?php endif; ?>
                    </div>
                    
                    <div class="card">
                         <h3 class="card-title">Invoices</h3>
                        <?php if( have_rows('invoices') ): ?>
                            <ul style="list-style: none; padding: 0;">
                                <?php while( have_rows('invoices') ): the_row(); $file = get_sub_field('invoice_file'); ?>
                                     <li style="border-bottom: 1px solid var(--glass-border-subtle);"><a href="<?php echo esc_url($file['url']); ?>" download style="display: flex; justify-content: space-between; padding: var(--space-2) 0;"><span><?php echo esc_html(wp_date('F j, Y', strtotime(get_sub_field('invoice_date')))); ?></span> <span style="font-weight: 600; color: var(--color-primary);"><?php echo esc_html(get_sub_field('invoice_status')); ?></span></a></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php else: ?><p class="text-secondary">No invoices to display.</p><?php endif; ?>
                    </div>

                </div>

            </div> <!-- .hub-grid -->

        <?php endwhile; wp_reset_postdata(); else: ?>
            <div class="card"><h1 class="section-heading">Welcome!</h1><p class="text-secondary">Your dashboard is being set up.</p></div>
        <?php endif; ?>
    <?php else: wp_redirect(home_url('/wp-login.php')); exit; endif; ?>
</div>

<?php get_footer(); ?>