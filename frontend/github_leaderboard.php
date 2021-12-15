<?php

require_once  dirname(__FILE__).'./helper.php'; //require helper for this file

add_shortcode('github_leaderboard','github_leaderboard_add_shortcode');
function github_leaderboard_add_shortcode($atts, $content = null){
	$a = shortcode_atts( array(
		'id' => '1',
		'type' => '',
		'use_in' => 'post'
	), $atts );

$gh_leaderboard_shortcode_args = array (
	'post_type'              => array( 'github_leaderboard' ),
	'post_status'            => array( 'publish' ),
	'nopaging'               => true,
	'order'                  => 'DESC',
	'orderby'                => 'date',
	'p'                      => $a['id']
);


// The Query
$github_leaderboard_post_query = new WP_Query( $gh_leaderboard_shortcode_args );
// The Loop
ob_start();
if ( $github_leaderboard_post_query->have_posts()) {

	while ( $github_leaderboard_post_query->have_posts() ) : $github_leaderboard_post_query->the_post();

			$github_leaderboard_account_names = array();
			if(get_post_meta( get_the_id(), 'github_leaderboard_account', true )){
				$github_leaderboard_account_names = get_post_meta( get_the_id(), 'github_leaderboard_account', true );
			}

			$github_leaderboard_status = get_post_meta( get_the_id(), 'github_leaderboard_status', true );
			$github_leaderboard_account_id = get_post_meta( get_the_id(), 'github_leaderboard_account_id', true );
			if($a['type']){
				$github_leaderboard_style = $a['type'];
			}else{
				$github_leaderboard_style = get_post_meta( get_the_id(), 'github_leaderboard_style', true );
			}
		
			$github_leaderboard_container_color_primary = get_post_meta( get_the_id(), 'github_leaderboard_container_color_primary', true );?>
<div class="github_leaderboard_container"
	<?php if($github_leaderboard_container_color_primary){echo "style='background: -webkit-linear-gradient(40deg,#eee, $github_leaderboard_container_color_primary; )!important;
	background: -o-linear-gradient(40deg,#eee,$github_leaderboard_container_color_primary !important;
	background: linear-gradient(40deg,#eee,$github_leaderboard_container_color_primary !important;'";}?>>
	<h1 class="github_leaderboard_title">
		<span class="github_leaderboard_title_exact"><?php the_title();?></span>
		<span class="github_leaderboard_survey-stage">
			<span class="github_leaderboard_stage github_leaderboard_live github_leaderboard_active"
				<?php if($github_leaderboard_status !== 'week') echo 'style="display:none;"';?>>@Week</span>
			<span class="github_leaderboard_stage github_leaderboard_live github_leaderboard_active"
				<?php if($github_leaderboard_status !== 'month') echo 'style="display:none;"';?>>@Month</span>
			<span class="github_leaderboard_stage github_leaderboard_live github_leaderboard_active"
				<?php if($github_leaderboard_status !== 'year') echo 'style="display:none;"';?>>@Year</span>
		</span>
	</h1>
	<div class="github_leaderboard_inner">
		<ul
			class="github_leaderboard_surveys <?php if($github_leaderboard_style == 'list') echo 'github_leaderboard_list'; else echo 'github_leaderboard_grid';?>">
			<?php 
				if($github_leaderboard_account_names){ 
					$gitHubUsers = fetch_rank_contributions($github_leaderboard_account_names);
                    $position=0;
                    foreach ($gitHubUsers as $user){
                        $position++;
						includeWithVariables(dirname(__FILE__).'./card-template.php',["user"=>$user,"position"=>$position],true);
					}
				}else{
					if( current_user_can('author') || current_user_can('editor') || current_user_can('administrator') ){
						_e('<p class="github_leaderboard_short_code">Please add some github accounts.</p><br><a href="'.get_edit_post_link(get_the_id()).'" class="github_leaderboard_survey-notfound-button" style="width:auto;max-width:100%;">Edit This leaderboard</a>','github_leaderboard');
					}else{
						_e('<p class="github_leaderboard_short_code">This leaderboard is not yet ready contact site administrator</p>','github_leaderboard');
					}				
				}
			?>
		</ul> 
		<div style="clear:both;"></div>	
	</div>
	<div class="github_leaderboard_powered_by">
		<a href="https://u-byte.cn/plugins/github-leaderboard/" target="_blank" rel="nofollow">Via WP Github Leaderboard
			System</a>
	</div>
</div>
<?php endwhile;
}else{

}

$output = ob_get_contents();
ob_end_clean();
return $output;
// Restore original Post Data
wp_reset_postdata();

}
add_filter('widget_text', 'do_shortcode');
add_filter('content', 'do_shortcode');