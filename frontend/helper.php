<?php
require_once  dirname(__FILE__).'/../includes/phpQuery/phpQuery.php'; //require php query

function fetch_rank_contributions($github_leaderboard_account_names)
{
/**
 * get github user contributions, avatar and nickname
 */

// github user names (samples)
    $userNames = [
        "simonandro",
        "admin368",
        "ironmann250",
        "Franck225-coder",
        "coachsteveee",
        "turinaf",
        "HelloNush",
        "agnessgeorge",
        "Ozymandias",
        "Negus25",
        "MabiJ",
        "teshe1221",
        "anothermorena",
    ];

    $userNames = $github_leaderboard_account_names;

    $gitHubUsers = [];

//create an array of github user home page urls
    $url = "https://github.com/";
    $urls = array();
    foreach ($userNames as $u) {
        array_push($urls, $url . $u);
    }

/**
 * Makes parallel curl requests at once
 */
    if (!function_exists('multiple_threads_request')) {

        function multiple_threads_request($nodes)
        {
            $mh = curl_multi_init();
            $curl_array = array();
            foreach ($nodes as $i => $url) {
                $curl_array[$i] = curl_init($url);
                curl_setopt($curl_array[$i], CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl_array[$i], CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl_array[$i], CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl_array[$i], CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl_array[$i], CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl_array[$i], CURLOPT_COOKIEFILE, "/tmp/cookie.txt");
                curl_setopt($curl_array[$i], CURLOPT_COOKIEJAR, "/tmp/cookie.txt");
                curl_multi_add_handle($mh, $curl_array[$i]);
            }
            $running = null;
            do {
                usleep(10000);
                curl_multi_exec($mh, $running);
            } while ($running > 0);

            $res = array();
            foreach ($nodes as $i => $url) {
                $res[$url] = curl_multi_getcontent($curl_array[$i]);
            }

            foreach ($nodes as $i => $url) {
                curl_multi_remove_handle($mh, $curl_array[$i]);
            }
            curl_multi_close($mh);
            return $res;
        }
    }

    $res = multiple_threads_request($urls);

    foreach ($urls as $url) {

        $markup = $res[$url]; // get user homepage markup

        $doc = phpQuery::newDocumentHTML($markup); // create php query document

        $avatar = pq(".avatar-user")->slice(-1)->attr("src"); // get github user avatar
        $nickname = trim(pq(".p-nickname")->html()); // get github username

        $contributions = pq(".js-calendar-graph-svg g g")->slice(-1)->find("rect"); //get contributions in current week
        $contributions_this_week = array("0" => 0, "1" => 0, "2" => 0, "3" => 0, "4" => 0, "5" => 0, "6" => 0); //["S","M","T","W","T","F","S"];
        $count = 0;

        foreach ($contributions as $c) {
            $contributions_this_week[$count++] = pq($c)->attr("data-count");
        }

        $gitHubUser["avatar"] = $avatar;
        $gitHubUser["nickname"] = $nickname;
        $gitHubUser["contributions"] = $contributions_this_week;
        $gitHubUser["totalContributions"] = array_sum(array_column($gitHubUser["contributions"], null));
        $gitHubUser["url"] = $url;
        $gitHubUsers[] = $gitHubUser;
    }

    $total_contributions = array_column($gitHubUsers, 'totalContributions');
    array_multisort($total_contributions, SORT_DESC, $gitHubUsers);
    
    return $gitHubUsers;
}

function includeWithVariables($filePath, $variables = array(), $print = true)
{
    $output = NULL;
    if(file_exists($filePath)){
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        echo $output;
    }
    return $output;

}