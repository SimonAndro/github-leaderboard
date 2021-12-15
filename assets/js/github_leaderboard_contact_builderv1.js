/*IT EPOLL CONTACT FOR BUILDER*/
jQuery.noConflict();
jQuery(document).ready(function($){
	var it_eplediprefx = '#iteditor_epoll_';
	//Action Tele Button
	jQuery(it_eplediprefx+'voter_tel_num').on('click',function(){
		var ele_val = prompt("Enter Label", "Your Mobile Number");
		jQuery('#github_leaderboard_contact_builder_textarea').append('[VOTER_TEL_NUM label="'+ele_val+'"]\n');
		jQuery('.github_leaderboard_contact_formbuilder_demo .github_leaderboard_contact_formbuilder_demo_content').append('<div class="it_edb_input_container"><label>'+ele_val+'</label><div class="it_edb_input"></div></div>');
	
	});
	//Action Name Button
	jQuery(it_eplediprefx+'voter_name').on('click',function(){
		var ele_val = prompt("Enter Label", "Your Name");
		jQuery('#github_leaderboard_contact_builder_textarea').append('[VOTER_NAME label="'+ele_val+'"]\n');
		jQuery('.github_leaderboard_contact_formbuilder_demo .github_leaderboard_contact_formbuilder_demo_content').append('<div class="it_edb_input_container"><label>'+ele_val+'</label><div class="it_edb_input"></div></div>');
	
	});
	//Action Email Button
	jQuery(it_eplediprefx+'voter_email').on('click',function(){
		var ele_val = prompt("Enter Label", "Your Email");
		jQuery('#github_leaderboard_contact_builder_textarea').append('[VOTER_EMAIL label="'+ele_val+'"]\n');
		jQuery('.github_leaderboard_contact_formbuilder_demo .github_leaderboard_contact_formbuilder_demo_content').append('<div class="it_edb_input_container"><label>'+ele_val+'</label><div class="it_edb_input"></div></div>');
	
	});
	//Action ADDRESS Button
	jQuery(it_eplediprefx+'voter_address').on('click',function(){
		var ele_val = prompt("Enter Label", "Your Address");
		jQuery('#github_leaderboard_contact_builder_textarea').append('[VOTER_ADDRESS label="'+ele_val+'"]\n');
		jQuery('.github_leaderboard_contact_formbuilder_demo .github_leaderboard_contact_formbuilder_demo_content').append('<div class="it_edb_input_container"><label>'+ele_val+'</label><div class="it_edb_input"></div></div>');
	
	});
	//Action CUSTOM TEXT
	jQuery(it_eplediprefx+'voter_custom_text').on('click',function(){
		var ele_val = prompt("Enter Label", "");
		jQuery('#github_leaderboard_contact_builder_textarea').append('[VOTER_CTEXT label="'+ele_val+'"]\n');
		jQuery('.github_leaderboard_contact_formbuilder_demo .github_leaderboard_contact_formbuilder_demo_content').append('<div class="it_edb_input_container"><label>'+ele_val+'</label><div class="it_edb_input"></div></div>');
	
	});
	//Action CUSTOM TEXTAREA
	jQuery(it_eplediprefx+'voter_custom_textarea').on('click',function(){
		var ele_val = prompt("Enter Label", "");
		jQuery('#github_leaderboard_contact_builder_textarea').append('[VOTER_CTEXTAREA label="'+ele_val+'"]\n');
		jQuery('.github_leaderboard_contact_formbuilder_demo .github_leaderboard_contact_formbuilder_demo_content').append('<div class="it_edb_input_container"><label>'+ele_val+'</label><div class="it_edb_textarea"></div></div>');
	
	});
	//Action CUSTOM TEXTAREA
	jQuery(it_eplediprefx+'voter_submit_btn').on('click',function(){
		var ele_val = prompt("Enter Label", "Vote Now");
		jQuery('#github_leaderboard_contact_builder_textarea').append('[VOTER_SUBMIT_BTN label="'+ele_val+'"]\n');
		jQuery('.github_leaderboard_contact_formbuilder_demo .github_leaderboard_contact_formbuilder_demo_content').append('<div class="it_edb_input_container"><div class="it_edb_submit">'+ele_val+'</div></div>');
	
	});

	jQuery('#github_leaderboard_contact_builder_textarea_reset').on('click',function(){
		jQuery('#github_leaderboard_contact_builder_textarea').text('');
		jQuery('.github_leaderboard_contact_formbuilder_demo .github_leaderboard_contact_formbuilder_demo_content').html('');
	});
});