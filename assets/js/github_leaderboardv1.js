/*github_leaderboard_js*/
jQuery.noConflict();
jQuery(document).ready(function($) {

	jQuery('.github_leaderboard_sys_show_user_table tr').each(function(){
		var github_leaderboard_tbl = jQuery(this).find('.github_leaderboard_sys_show_user');
		jQuery(this).find('.github_leaderboard_sys_show_user_btn').on('click',function(){
			jQuery(github_leaderboard_tbl+' tr').each(function(){
				jQuery(this).slideToggle();
			});
		});
	});

	jQuery('.github_leaderboard_color-field').wpColorPicker();
	jQuery('#github_leaderboard_append_option_filed .github_leaderboard_append_option_filed_tr').each(function(){
		var it_ele_container = jQuery(this);
		jQuery(this).find('#github_leaderboard_account_rm_btn').click(function() {
			jQuery(it_ele_container).remove();
		});
	});	
	jQuery('.github_leaderboard_add_option_btn').click(function()
	{	
		var date = new Date();
		var components = [
			date.getYear(),
			date.getMonth(),
			date.getDate(),
			date.getHours(),
			date.getMinutes(),
			date.getSeconds(),
			date.getMilliseconds()
		];

		var uniqid = components.join("");
		
		jQuery('#github_leaderboard_append_option_filed').append('<tr class="github_leaderboard_append_option_filed_tr"><td><table class="form-table"><tr><td>Github Username</td><td><input type="text" class="widefat" id="github_leaderboard_account" name="github_leaderboard_account[]" required/></td><td ><input type="button" class="button" id="github_leaderboard_account_rm_btn" name="github_leaderboard_account_rm_btn" value="Remove This User"></td></tr></table></td></tr>');
		jQuery('#github_leaderboard_append_option_filed .github_leaderboard_append_option_filed_tr').each(function(){
		var it_ele_container = jQuery(this);
			jQuery(this).find('#github_leaderboard_account_rm_btn').click(function() {
				jQuery(it_ele_container).remove();
			});
		});	
		jQuery('#github_leaderboard_append_option_filed .github_leaderboard_append_option_filed_tr').each(function(){
	
		jQuery(this).find('#github_leaderboard_account_btn').click(function(e) {

			var img_val = jQuery(this).parent().parent().find('#github_leaderboard_account_img');
			var image = wp.media({ 
				title: 'Upload Image',
				// mutiple: true if you want to upload multiple files at once
				multiple: false
			}).open()
			.on('select', function(e){
				// This will return the selected image from the Media Uploader, the result is an object
				var uploaded_image = image.state().get('selection').first();
				// We convert uploaded_image to a JSON object to make accessing it easier
				// Output to the console uploaded_image
		 
				var image_url = uploaded_image.toJSON().url;
				// Let's assign the url value to the input field
				//console.log(img_val);
				
				img_val.val(image_url);
			});
		});


		jQuery(this).find('#github_leaderboard_account_ci_btn').click(function(e) {
			var img_val = jQuery(this).parent().parent().find('#github_leaderboard_account_cover_img');
			var image = wp.media({ 
				title: 'Upload Image',
				// mutiple: true if you want to upload multiple files at once
				multiple: false
			}).open()
			.on('select', function(e){
				// This will return the selected image from the Media Uploader, the result is an object
				var uploaded_image = image.state().get('selection').first();
				// We convert uploaded_image to a JSON object to make accessing it easier
				// Output to the console uploaded_image
		 
				var image_url = uploaded_image.toJSON().url;
				// Let's assign the url value to the input field
				//console.log(img_val);
				
				img_val.val(image_url);
			});
		});
	});
	});



		jQuery('#github_leaderboard_append_option_filed .github_leaderboard_append_option_filed_tr').each(function(){
	
		jQuery(this).find('#github_leaderboard_account_btn').click(function(e) {

			var img_val = jQuery(this).parent().parent().find('#github_leaderboard_account_img');
			var image = wp.media({ 
				title: 'Upload Image',
				// mutiple: true if you want to upload multiple files at once
				multiple: false
			}).open()
			.on('select', function(e){
				// This will return the selected image from the Media Uploader, the result is an object
				var uploaded_image = image.state().get('selection').first();
				// We convert uploaded_image to a JSON object to make accessing it easier
				// Output to the console uploaded_image
		 
				var image_url = uploaded_image.toJSON().url;
				// Let's assign the url value to the input field
				//console.log(img_val);
				
				img_val.val(image_url);
			});
		});


		jQuery(this).find('#github_leaderboard_account_ci_btn').click(function(e) {
			var img_val = jQuery(this).parent().parent().find('#github_leaderboard_account_cover_img');
			var image = wp.media({ 
				title: 'Upload Image',
				// mutiple: true if you want to upload multiple files at once
				multiple: false
			}).open()
			.on('select', function(e){
				// This will return the selected image from the Media Uploader, the result is an object
				var uploaded_image = image.state().get('selection').first();
				// We convert uploaded_image to a JSON object to make accessing it easier
				// Output to the console uploaded_image
		 
				var image_url = uploaded_image.toJSON().url;
				// Let's assign the url value to the input field
				//console.log(img_val);
				
				img_val.val(image_url);
			});
		});
	});
});
