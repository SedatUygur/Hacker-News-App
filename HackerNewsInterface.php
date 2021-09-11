<?php

//interface to ensure a contract is followed
interface HackerNewsInterface {


	public function get_top_stories_ids();

	public function get_item_data_by_id($item_id);

	public function get_user_data_by_id($user_id);


}