(function() {
   tinymce.create('tinymce.plugins.github_leaderboard', {
      init : function(ed, url) {
         ed.addButton('github_leaderboard', {
            title : 'Insert leaderboard',
            image : url+'/ghleaderboard.png',
            onclick : function() {
               var leaderboard_id = prompt("Enter leaderboard ID", "");

                  if (leaderboard_id != null && leaderboard_id != ''){
                     ed.execCommand('mceInsertContent', false, '[github_leaderboard id="'+leaderboard_id+'"][/github_leaderboard]');
                  }else{
                     ed.execCommand('mceInsertContent', false, '[github_leaderboard id="1"][/github_leaderboard]');
               }
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "github_leaderboard WP VOTING",
            author : 'InfoTheme',
            authorurl : 'http://www.infotheme.in',
            infourl : 'http://infotheme.in/products/plugins/ghleaderboard-wp-voting-system/',
            version : "2.0"
         };
      }
   });
   tinymce.PluginManager.add('github_leaderboard', tinymce.plugins.github_leaderboard);
})();