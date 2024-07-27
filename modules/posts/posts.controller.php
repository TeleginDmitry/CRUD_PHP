<?php

require "posts.service.php";

$request_method = $_SERVER["REQUEST_METHOD"];
$url = $_SERVER["REQUEST_URI"];

$regx = '/^\/posts\/[0-9]+$/';


if ($request_method === 'GET') {
  getPosts();
} elseif ($request_method === 'POST') {
  createPost();
} elseif ($request_method === 'GET' && preg_match($regx, $url)) {
  $id = explode('/', $url)[2];
  getPost($id);
} elseif ($request_method === 'PUT' && preg_match($regx, $url)) {
  $id = explode('/', $url)[2];
  updatePost($id);
} elseif ($request_method === 'DELETE' && preg_match($regx, $url)) {
  $id = explode('/', $url)[2];
  deletePost($id);
} else {
  header("HTTP/1.1 404 Not Found");
}
