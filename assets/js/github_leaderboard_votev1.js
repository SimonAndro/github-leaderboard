jQuery(document).ready(function() {
	jQuery('.github_leaderboard_survey-item').each(function(){
		var github_leaderboard_item = jQuery(this);
		jQuery(this).find('#github_leaderboard_survey-vote-button').click(function(){
		
			
			jQuery(github_leaderboard_item).parent().find('.github_leaderboard_survey-item').each(function(){
				
					jQuery(this).find('#github_leaderboard_survey-vote-button').val('...');
					jQuery(this).find('#github_leaderboard_survey-vote-button').attr('disabled','yes');
				
			});

			var github_leaderboard_btn  = jQuery(this);	
			jQuery(github_leaderboard_item).find('.github_leaderboard_spinner').fadeIn();
			//console.log(github_leaderboard_item);

			var data = {
				'action': 'github_leaderboard_vote',
				'option_id': jQuery(github_leaderboard_item).find('#github_leaderboard_survey-item-id').val(),
				'poll_id': jQuery(github_leaderboard_item).find('#github_leaderboard_poll-id').val() // We pass php values differently!
			};
	
		// We can also pass the url value separately from ajaxurl for front end AJAX implementations
			jQuery.post(github_leaderboard_ajax_obj.ajax_url, data, function(response) {
				
				var github_leaderboard_json = jQuery.parseJSON(response);
		        
		        jQuery(github_leaderboard_item).parent().find('.github_leaderboard_survey-item').each(function(){
		        	 jQuery(this).find('#github_leaderboard_survey-vote-button').addClass('github_leaderboard_scale_hide');	
		    	});

				jQuery(github_leaderboard_item).find('.github_leaderboard_survey-progress-fg').attr('style','width:'+github_leaderboard_json.total_vote_percentage+'%');
				jQuery(github_leaderboard_item).find('.github_leaderboard_survey-progress-label').text(github_leaderboard_json.total_vote_percentage+'%');
				jQuery(github_leaderboard_item).find('.github_leaderboard_survey-completes').text(github_leaderboard_json.total_opt_vote_count+' / '+github_leaderboard_json.total_vote_count);		
				
				setTimeout(function(){
					jQuery(github_leaderboard_btn).addClass('github_leaderboard_scale_show');
					jQuery(github_leaderboard_btn).val("Voted");
					jQuery(github_leaderboard_btn).toggleClass("github_leaderboard_green_gradient");
					jQuery(github_leaderboard_item).find('.github_leaderboard_spinner').toggleClass("github_leaderboard_spinner_stop");	
					jQuery(github_leaderboard_item).find('.github_leaderboard_spinner').toggleClass("github_leaderboard_drawn");
				},300);

				
			});
	
		});

	});

	jQuery('.github_leaderboard_pop_close').click(function(){
		jQuery('.github_leaderboard_pop_container').fadeOut();
	});

});