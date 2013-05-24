<?php
/**
 * Plugin Name: wpwhatchanged
 * Plugin URI: http://www.dixpix.de
 * Description: Have the latest changes at your posts and pages right on your dashboard.
 * Version: 0.1
 * Author: Marc Dix
 * Author URI: http://www.dixpix.de
 */

function wpwhatchangedOutput() {
    echo '<table class="wp-list-table widefat dashboard" cellspacing="0">
    <thead>
        <tr>
            <th scope="col" style="">Name</th>
            <th scope="col" style="">Type</th>
            <th scope="col" style="">Modified</th>
            <th scope="col" style="">Status</th>
            <th scope="col" style="">Link</th>
        </tr>
    </thead>
    <tbody>';
    $recentlyChangedPosts = getRecentlyChangedPosts();
    foreach ($recentlyChangedPosts as $postObj) {
        echo '<tr>
                  <td>' . $postObj->post_name . '</td>
                  <td>' . $postObj->post_type . '</td>
                  <td>' . date("d.m.Y", strtotime($postObj->post_modified)) . '</td>
                  <td>' . $postObj->post_status . '</td>
                  <td><a href="' . getEditLink($postObj->guid) . '">Edit</a></td>
              </tr>';
    }
    echo '</tbody></table>';
} 

function getRecentlyChangedPosts() {
    global $wpdb;
    $tablePrefix = $wpdb->prefix;
    $recentlyChangedPosts = $wpdb->get_results( "SELECT `" . $tablePrefix . "posts`.post_name, post_title, post_modified, guid, post_type, post_status
								   FROM wp_posts 
								   WHERE (post_type='post' OR post_type='page') AND post_title!='Auto Draft' 
								   ORDER BY post_modified DESC LIMIT 0,30" );
	return $recentlyChangedPosts;
}

function getEditLink($guid) {
    $pageParam  = strrchr($guid, '=');
    $pageId     = str_replace('=', '', $pageParam);
	// Post and page share the same edit link
    $editLink   = 'post.php?post=' . $pageId .  '&action=edit';
    return $editLink;
}

function wpwhatchangedAddToDashboard() {
    wp_add_dashboard_widget('wpwhatchanged_widget', 'Latest Changes (wpwhatchanged)', 'wpwhatchangedOutput');   
} 
add_action('wp_dashboard_setup', 'wpwhatchangedAddToDashboard'); 