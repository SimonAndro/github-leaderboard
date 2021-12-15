<?php
/**
 * Adds a box to the main column on the leaderboard edit screens.
 */
function github_leaderboard_metaboxes()
{

    add_meta_box(
        'github_leaderboard_',
        __('Add Leaderboard Options', 'github_leaderboard'),
        'github_leaderboard_metabox_forms',
        'github_leaderboard',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'github_leaderboard_metaboxes');

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function github_leaderboard_metabox_forms($post)
{

    // Add an nonce field so we can check for it later.
    wp_nonce_field('github_leaderboard_metabox_id', 'github_leaderboard_metabox_id_nonce');

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    $github_leaderboard_status = get_post_meta($post->ID, 'github_leaderboard_status', true);

    if (get_post_meta($post->ID, 'github_leaderboard_account', true)) {
        $github_leaderboard_account = get_post_meta($post->ID, 'github_leaderboard_account', true);
    }

    $github_leaderboard_account_id = get_post_meta($post->ID, 'github_leaderboard_account_id', true);
    $github_leaderboard_style = get_post_meta($post->ID, 'github_leaderboard_style', true);
    $github_leaderboard_ui = get_post_meta($post->ID, 'github_leaderboard_ui', true);
    $github_leaderboard_container_color_primary = get_post_meta($post->ID, 'github_leaderboard_container_color_primary', true);

    ?>
<?php if (($post->post_type == 'github_leaderboard') && isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {?>
<div class="github_leaderboard_short_code">
	<?php _e('Shortcode for this leaderboard is : <code>[github_leaderboard id="' . $post->ID . '"][/github_leaderboard]</code> (Insert it anywhere in your post/page and show your leaderboard)', 'github_leaderboard');?>
</div>
<?php }?>
<table class="form-table github_leaderboard_meta_table">
	<tr>
		<td><?php _e('Ranking Period', 'github_leaderboard');?></td>
		<td>
			<select class="widefat" id="github_leaderboard_status" name="github_leaderboard_status" value="" required>
				<option value="week"
					<?php if ($github_leaderboard_status == 'week') {
        echo esc_attr('selected', 'github_leaderboard');
    }
    ?>>
					@Week</option>
				<option value="month" disabled
					<?php if ($github_leaderboard_status == 'month') {
        echo esc_attr('disabled', 'github_leaderboard');
    }
    ?>>
					@Month (Premium Only)</option>
				<option value="year" disabled
					<?php if ($github_leaderboard_status == 'year') {
        echo esc_attr('disabled', 'github_leaderboard');
    }
    ?>>
					@Year (Premium Only)</option>
			</select>
		</td>
		<td style="float:left;margin-top: 8px;"><?php _e('leaderboard Style', 'github_leaderboard');?></td>
		<td style="float:left;">
			<select class="widefat" id="github_leaderboard_style" name="github_leaderboard_style" value="" required />
			<option value="list"
				<?php if ($github_leaderboard_style == 'list') {
        echo esc_attr('selected', 'github_leaderboard');
    }
    ?>>List
			</option>
			<option value="grid" disabled
				<?php if ($github_leaderboard_style == 'grid') {
        echo esc_attr('selected', 'github_leaderboard');
    }
    ?>>Grid (Premium Only)
			</option>
			</select>
		</td>
	</tr>

	<tr>

	</tr>

	<tr>
		<td><?php _e('Background Gradient:', 'github_leaderboard');?></td>
		<td>
			<div style="padding-bottom:5px;">Primary Color</div>
			<input type="text" class="widefat it_epoll_color-field"
				name="github_leaderboard_container_color_primary" value="<?php echo $github_leaderboard_container_color_primary; ?>" placeholder="Primary Color" />
		</td>
		<td>
			<div>Secondary Color<span class="github_leaderboardadmin_pro_badge" style="top: 28px;right: 103px;position: relative;"><i class="dashicons dashicons-star-empty"></i> Premium Only</span></div>
			<div style="display: inline-block !important;">
				<input type="text" class="widefat "
					name="github_leaderboard_container_color_secondary" disabled
					 ">
			</div>
		</td>
	</tr>

	<tr>
		<td><?php _e('Card Style', 'github_leaderboard');?></td>
		<td colspan="3">
			<table class="widefat">
				<tr>
					<td colspan="4" class="github_leaderboard_pro_alert_col"><a target="_blank"
							href="https://u-byte.com/product/ghLeaderboard-pro/">Get Pro Version to Active this and other
							Features &nbsp;&nbsp;
							<span class="github_leaderboardadmin_pro_badge"><i
									class="dashicons dashicons-star-empty"></i> Premium Only</span></a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<input type="radio" name="github_leaderboard_card_style" id="github_leaderboard_card_style"
							value="orange" checked /><br>
						<img src="<?php echo plugins_url('github-leaderboard'); ?>/assets/imgs/buttons/peach.png"><br>
						<img src="<?php echo plugins_url('github-leaderboard'); ?>/assets/imgs/buttons/peach-bar.png">
					</td>
					<td style="text-align: center;">
						<input type="radio" name="github_leaderboard_card_style" id="github_leaderboard_card_style"
							value="orange" disabled /><br>
						<img src="<?php echo plugins_url('github-leaderboard'); ?>/assets/imgs/buttons/purple.png"><br>
						<img src="<?php echo plugins_url('github-leaderboard'); ?>/assets/imgs/buttons/purple-bar.png">
					</td>
					<td style="text-align: center;">
						<input type="radio" name="github_leaderboard_card_style" id="github_leaderboard_card_style"
							value="orange" disabled /><br>
						<img src="<?php echo plugins_url('github-leaderboard'); ?>/assets/imgs/buttons/aqua.png"><br>
						<img src="<?php echo plugins_url('github-leaderboard'); ?>/assets/imgs/buttons/aqua-bar.png">
					</td>
					<td style="text-align: center;">
						<input type="radio" name="github_leaderboard_card_style" id="github_leaderboard_card_style"
							value="orange" disabled /><br>
						<img src="<?php echo plugins_url('github-leaderboard'); ?>/assets/imgs/buttons/blue.png"><br>
						<img src="<?php echo plugins_url('github-leaderboard'); ?>/assets/imgs/buttons/blue-bar.png">
					</td>
				</tr>

			</table>
		</td>
</table>

<table class="form-table" id="github_leaderboard_append_option_filed">
	<?php if (!empty($github_leaderboard_account)):
        $i = 0;
        foreach ($github_leaderboard_account as $github_leaderboard_opt):
        ?>
		<tr class="github_leaderboard_append_option_filed_tr">
			<td>
				<table class="form-table">
					<tr>
						<td><?php _e('github username', 'github_leaderboard');?></td>
						<td>
							<input type="text" class="widefat" id="github_leaderboard_account"
								name="github_leaderboard_account[]"
								value="<?php echo esc_attr($github_leaderboard_opt, 'github_leaderboard'); ?>" required />
						</td>
						<td>
							<input type="button" class="button" id="github_leaderboard_account_rm_btn"
								name="github_leaderboard_account_rm_btn" value="Remove This User">
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<?php
    $i++;
    endforeach;
    endif;?>
</table>

<table class="form-table">
	<tr>
		<td><button type="button" name="" class="button github_leaderboard_add_option_btn" id=""><i
					class="dashicons-before dashicons-plus-alt"></i>
				<?php _e('Add User', 'github_leaderboard');?></button></td>
	</tr>
</table>

<table class="form-table">
	<tr>
		<td class="github_leaderboard_short_code">
			<?php _e('Developed & Designed By <a href="http://www.u-byte.cn">U-byte Technologies.</a> | For Customization <a href="https://u-byte.cn/#contact">Hire Us Today</a> | <a href="http://u-byte.cn/products/plugins/github-leaderboard-system/#forum">Support / Live Chat</a> | <a href="http://u-byte.cn/products/plugins/github-leaderboard-system/#docs">Documentation</a>', 'github_leaderboard');?>
		</td>
	</tr>
</table>

<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function github_leaderboard_save_options($post_id)
{

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if (!isset($_POST['github_leaderboard_metabox_id_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['github_leaderboard_metabox_id_nonce'], 'github_leaderboard_metabox_id')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'github_leaderboard' == $_POST['post_type']) {

        if (!current_user_can('edit_page', $post_id)) {
            return;
        }

    } else {

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // Sanitize user input & Update the meta field in the database.

    //Updating leaderboard status
    if (isset($_POST['github_leaderboard_status'])) {
        $github_leaderboard_status = sanitize_text_field($_POST['github_leaderboard_status']);
        update_post_meta($post_id, 'github_leaderboard_status', $github_leaderboard_status);
    }

    //Updating leaderboard background layout style
    if (isset($_POST['github_leaderboard_style'])) {
        $github_leaderboard_style = sanitize_text_field($_POST['github_leaderboard_style']);
        update_post_meta($post_id, 'github_leaderboard_style', $github_leaderboard_style);
    }

    //Updating Poll Container Primary Color
    if (isset($_POST['github_leaderboard_container_color_primary'])) {
        $github_leaderboard_container_color_primary = sanitize_text_field($_POST['github_leaderboard_container_color_primary']);
        update_post_meta($post_id, 'github_leaderboard_container_color_primary', $github_leaderboard_container_color_primary);
    }

    //Updating leaderboard Card style

    //Update leaderboard Options Name
    if (isset($_POST['github_leaderboard_account'])) {
        $github_leaderboard_accounts = $_POST['github_leaderboard_account'];
        $github_leaderboard_account = array();
        foreach ($github_leaderboard_accounts as $github_leaderboard_opt_key) {
            if ($github_leaderboard_opt_key) {
                array_push($github_leaderboard_account, sanitize_text_field($github_leaderboard_opt_key));
            }
        }
        update_post_meta($post_id, 'github_leaderboard_account', $github_leaderboard_account);
    } else {
        update_post_meta($post_id, 'github_leaderboard_account', array());
        update_post_meta($post_id, 'github_leaderboard_account_img', array());
        update_post_meta($post_id, 'github_leaderboard_account_cover_img', array());
        update_post_meta($post_id, 'github_leaderboard_account_id', array());
    }

    //Update leaderboard Options Id
    if (isset($_POST['github_leaderboard_account_id'])) {
        $github_leaderboard_account_ids = $_POST['github_leaderboard_account_id'];
        $github_leaderboard_account_id = array();
        foreach ($github_leaderboard_account_ids as $github_leaderboard_account_id_key) {
            if ($github_leaderboard_account_id_key) {
                array_push($github_leaderboard_account_id, sanitize_text_field($github_leaderboard_account_id_key));
            }
        }
        update_post_meta($post_id, 'github_leaderboard_account_id', $github_leaderboard_account_id);
    }
}
add_action('save_post', 'github_leaderboard_save_options');