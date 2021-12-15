<?php if(isset($_REQUEST['view'])){?>
<div class="wrap" style="position: relative;">
<h1>Voting Results <sub style="color:orange">PRO</sub></h1>
<?php if($_REQUEST['view'] == 'voter_details'){?>
<div class="github_leaderboard_system_upgrade_pro">
	<div class="github_leaderboard_system_upgrade_pro_dotted_line"></div>
	<div class="dashicons dashicons-unlock github_leaderboard_system_upgrade_pro_icon"></div>
	<a href="https://infotheme.net/product/epoll-pro/" class="it_edb_submit github_leaderboard_system_upgrade_pro_btn">Upgrade to Pro for all Features</a>
</div>
<table class="wp-table widefat fixed striped posts">
	<thead>
		<tr>
			<th>
				<a href="<?php echo admin_url('admin.php?page=github_leaderboard_system&view=results&id=1');?>" class=""><i class="dashicons dashicons-arrow-left-alt"></i> Go Back</a>
			</th>
			<th style="text-align: center;">
				<a href="<?php echo admin_url('post-new.php?post_type=github_leaderboard');?>" class=""><i class="dashicons dashicons-chart-pie"></i> Create New Poll</a>
			</th>
			<th style="text-align: right;">
				<a href="https://infotheme.in/#support" class=""><i class="dashicons dashicons-sos"></i> Get Support</a>
			</th>
		</tr>
	</thead>
</table>
<table class="wp-table widefat fixed striped posts github_leaderboard_sys_show_voter_table">
	<thead>
		<tr>
			<th>
				Voter Name
			</th>
			<th>
				Contact Details
			</th>
			<th>
				Status
			</th>
			<th>
				Action
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				John test
			</td>
			<td>
				<table class="wp-table github_leaderboard_sys_show_voter">
					<tr>
						<th>Email :</th>
						<th>test@test.com</th>
					</tr>
					<tr style="display: none;">
						<th>Phone</th>
						<th>0123456789</th>
					</tr>
					<tr style="display: none;">
						<th>Address</th>
						<th>Test House, Road, City, USA.</th>
					</tr>
					<tr style="display: none;">
						<th>Gender</th>
						<th>Male</th>
					</tr>
					<tr style="display: none;">
						<th>Date Of Birth</th>
						<th>04/04/1995</th>
					</tr>
				</table>
			</td>
			<th>
				Verified Voter
			</td>
			<td>
				<button type="button" class="button button-secondary github_leaderboard_sys_show_voter_btn">View Full Contact Details</button>
			</td>
		</tr>
		<tr class="github_leaderboard_system_upgrade_pro_blur">
			<td>
				Ziyan test
			</td>
			<td>
				<table class="wp-table github_leaderboard_sys_show_voter">
					<tr>
						<th>Email :</th>
						<th>testziyan@test.com</th>
					</tr>
					<tr style="display: none;">
						<th>Phone</th>
						<th>0123456789</th>
					</tr>
					<tr style="display: none;">
						<th>Address</th>
						<th>Test House, Road, City, USA.</th>
					</tr>
					<tr style="display: none;">
						<th>Gender</th>
						<th>Male</th>
					</tr>
					<tr style="display: none;">
						<th>Date Of Birth</th>
						<th>04/04/1995</th>
					</tr>
				</table>
			</td>
			<th>
				Unverified Voter
			</td>
			<td>
				<button type="button" class="button button-secondary github_leaderboard_sys_show_voter_btn">View Full Contact Details</button>
			</td>
		</tr>
	</tbody>
</table>
<?php }else{?>
<div class="github_leaderboard_system_upgrade_pro">
	<div class="github_leaderboard_system_upgrade_pro_dotted_line"></div>
	<div class="dashicons dashicons-unlock github_leaderboard_system_upgrade_pro_icon"></div>
	<a href="https://infotheme.net/product/epoll-pro/" class="it_edb_submit github_leaderboard_system_upgrade_pro_btn">Upgrade to Pro for all Features</a>
</div>
<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
			<th>
				<a href="<?php echo admin_url('admin.php?page=github_leaderboard_system');?>" class=""><i class="dashicons dashicons-arrow-left-alt"></i> Go Back</a>
			</th>
			<th style="text-align: center;">
				<a href="<?php echo admin_url('post-new.php?post_type=github_leaderboard');?>" class=""><i class="dashicons dashicons-chart-pie"></i> Create New Poll</a>
			</th>
			<th style="text-align: right;">
				<a href="https://infotheme.in" class=""><i class="dashicons dashicons-sos"></i> Get Support</a>
			</th>
		</tr>
	</thead>
</table>
<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
			<th>
				Canidate / Option Name
			</th>
			<th>
				Total Votes
			</th>
			<th>
				Votes in (x/x)
			</th>
			<th>
				Live Result
			</th>
			<th>
				Voter Details
			</th>
		</tr>

		<tr>
			<th>
				Option 1
			</th>
			<th>
				20
			</th>
			<th>
				20/60
			</th>
			<th>
				<span style="color:green;font-weight: bold;">Winner</span> <sup style="background: #F44336;
    border-radius: 4px;
    padding: 0;
    width: 32px;
    text-align: center;
    display: inline-block;
    color: #fff;;">Now</sup>
			</th>
			<th>
				<a href="<?php echo admin_url('admin.php?page=github_leaderboard_system&view=voter_details&id='.get_the_id());?>" class="button button-secondary">View</a>		
			</th>
		</tr>
		<tr class="github_leaderboard_system_upgrade_pro_blur">
			<th>
				Option 1
			</th>
			<th>
				10
			</th>
			<th>
				10/60
			</th>
			<th>
				<span style="color:orange;font-weight: bold;">Leading</span> <sup style="background: #F44336;
    border-radius: 4px;
    padding: 0;
    width: 32px;
    text-align: center;
    display: inline-block;
    color: #fff;;">Now</sup>
			</th>
			<th>
				<a href="<?php echo admin_url('admin.php?page=github_leaderboard_system&view=voter_details&id='.get_the_id());?>" class="button button-secondary">View</a>		
			</th>
		</tr>
		<tr  class="github_leaderboard_system_upgrade_pro_blur">
			<th>
				Option 1
			</th>
			<th>
				10
			</th>
			<th>
				10/60
			</th>
			<th>
				<span style="color:orange;font-weight: bold;">Leading</span> <sup style="background: #F44336;
    border-radius: 4px;
    padding: 0;
    width: 32px;
    text-align: center;
    display: inline-block;
    color: #fff;;">Now</sup>
			</th>
			<th>
				<a href="<?php echo admin_url('admin.php?page=github_leaderboard_system&view=voter_details&id='.get_the_id());?>" class="button button-secondary">View</a>		
			</th>
		</tr>
	</thead>
</table>
<?php }?>
<?php }else{?>
<div class="wrap" style="position: relative;">
<h1>Voting Results <sub style="color:orange">PRO</sub></h1>

<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
			<th>
				<a href="<?php echo admin_url('admin.php?page=github_leaderboard_system&section=github_leaderboard_settings');?>" class=""><i class="dashicons dashicons-hammer"></i> Change Settings</a>
			</th>
			<th style="text-align: center;">
				<a href="<?php echo admin_url('post-new.php?post_type=github_leaderboard');?>" class=""><i class="dashicons dashicons-chart-pie"></i> Create New Poll</a>
			</th>
			<th style="text-align: right;">
				<a href="https://infotheme.in/#support" class=""><i class="dashicons dashicons-sos"></i> Get Support</a>
			</th>
		</tr>
	</thead>
</table>
<table class="wp-table widefat">
	<thead>
		<tr>
			<th>
			ID
			</th>
		<th>
			Voting / Poll Name
		</th>
		<th>
			Status
		</th>
		<th>
			Total Votes
		</th>
		<th>
			Total Candidates / Options
		</th>
		<th>
			Action
		</th>
	</tr>
	</thead>
	<tbody>
		<?php
				// WP_Query arguments
				$itepollBackednqueryargs = array(
					'post_type'              => array( 'github_leaderboard' ),
					'post_status'            => array( 'publish' ),
					'nopaging'               => false,
					'paged'                  => '0',
					'posts_per_page'         => '20',
					'order'                  => 'DESC',
				);

				// The Query
				$itepollBackednquery = new WP_Query( $itepollBackednqueryargs );

				// The Loop
				$i=1;
				if ( $itepollBackednquery->have_posts() ) {
					while ( $itepollBackednquery->have_posts() ) {
						$itepollBackednquery->the_post();?>
						
							<tr>
							<td class="has-row-actions column-primary">
								<?php the_id();?>

							</td>
							<td>
								<?php the_title();?>
							</td>
							<td>
								<?php echo get_post_meta(get_the_id(),'github_leaderboard_status',true);?>
							</td>
							<td>
								<?php 
								if(get_post_meta(get_the_id(),'github_leaderboard_vote_total_count',true)) echo get_post_meta(get_the_id(),'github_leaderboard_vote_total_count',true); else echo 0;?>
							</td>
							<td>
								<?php 
									if(get_post_meta(get_the_id(),'github_leaderboard_account',true)){

										echo sizeof(get_post_meta(get_the_id(),'github_leaderboard_account',true));	
										}else{
											echo '0';
										}
								?>
							</td>
							<td>
								<a href="<?php echo admin_url('admin.php?page=github_leaderboard_system&view=results&id='.get_the_id());?>" class="button button-secondary">View</a>
							</td>
						</tr>
				<?php $i++;	}
				} else {?>
					<tr>
						<td colspan="6" style="text-align: center;">
							<h2>OOPS! You have no poll created yet!</h2>
						</td>
					</tr>
					<tr>
						<td colspan="6" style="text-align: center;">
							<a href="<?php echo admin_url('post-new.php?post_type=github_leaderboard');?>" class="button button-secondary"><i class="dashicons dashicons-chart-pie"></i> Create New Poll</a>
						</td>
					</tr>
					<tr>
						<td colspan="6" style="text-align: center;">
							
						</td>
					</tr>
				<?php }

				// Restore original Post Data
				wp_reset_postdata();
				?>
	</tbody>
</table>
</div>
<?php }?>