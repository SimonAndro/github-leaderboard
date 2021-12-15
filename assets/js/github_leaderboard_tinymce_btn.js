(function() {
   tinymce.create('tinymce.plugins.github_leaderboard', {
      init : function(ed, url) {
         ed.addButton('github_leaderboard', {
            title : 'Insert Poll',
            image : url+'/ghleaderboard.png',
            onclick : function() {
               var poll_id = prompt("Enter Poll ID", "");

                  if (poll_id != null && poll_id != ''){
                     ed.execCommand('mceInsertContent', false, '[github_leaderboard id="'+poll_id+'"][/github_leaderboard]');
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
            infourl : 'http://infotheme.in/products/plugins/epoll-wp-voting-system/',
            version : "2.0"
         };
      }
   });
   tinymce.PluginManager.add('github_leaderboard', tinymce.plugins.github_leaderboard);
})();