<?php
// show.php

require_once 'model.php';

// get 'id' from GET parameters
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$post = get_one_post_by_id($id);

require 'templates/show.php';
