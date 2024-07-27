<?php
require "../database/db.php";

function getPosts()
{
  global $pdo;
  $sql = "SELECT * FROM posts";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $posts = $stmt->fetchAll();
  header('Content-Type: application/json');
  echo json_encode($posts);
}

function getPost($id)
{
  global $pdo;
  $sql = "SELECT * FROM posts WHERE id = $id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $post = $stmt->fetch();
  header('Content-Type: application/json');
  echo json_encode($post);
}

function createPost()
{
  global $pdo;
  $data = json_decode(file_get_contents('php://input'), true);
  $sql = "INSERT INTO posts (title, body) VALUES ($data[title], $data[body])";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  header('Content-Type: application/json');
  echo json_encode($stmt->fetchAll());
}

function updatePost($id)
{
  global $pdo;
  $data = json_decode(file_get_contents('php://input'), true);
  $sql = "UPDATE posts SET title = $data[title], body = $data[body] WHERE id = $id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  header('Content-Type: application/json');
  echo json_encode($stmt->fetchAll());
}

function deletePost($id)
{
  global $pdo;
  $sql = "DELETE FROM posts WHERE id = $id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  header('Content-Type: application/json');
  echo json_encode($stmt->fetchAll());
}
