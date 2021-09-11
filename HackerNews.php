<?php 

require 'vendor/autoload.php';

require_once('HackerNewsInterface.php');

class HackerNews implements HackerNewsInterface {



	    /*
	     * Get Top 100 Hacker News Stories 
	     * @return Array of IDs
	     */

		public function get_top_stories_ids() {

			$client = new GuzzleHttp\Client();

			$res = $client->get('https://hacker-news.firebaseio.com/v0/topstories.json');

			$data =  $res->json();

			return $data;
		}


 		/*
	     * Get Item Data for a Story using ID
	     * @return Array of Item Data
	     */

		public function get_item_data_by_id($item_id) {

			$client =  new GuzzleHttp\Client();

			$item_resource = "https://hacker-news.firebaseio.com/v0/item/" . $item_id . ".json";

			$res = $client->get($item_resource);

			$data = $res->json();

			return $data;

		}

		/*
	     * Get User data for a User using ID
	     * @return Array of User Data
	     */


		public function get_user_data_by_id($user_id) {

			$client =  new GuzzleHttp\Client();

			$user_resource = "https://hacker-news.firebaseio.com/v0/user/" . $user_id . ".json";

			$res = $client->get($user_resource);

			$data = $res->json();

			return $data;

		}

}