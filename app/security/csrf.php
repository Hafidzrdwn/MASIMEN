<?php
require_once __DIR__ . '/../app/session.php';

function csrfField()
{
  return '<input type="hidden" name="csrf_token" value="' . getToken() . '">';
}

function checkCsrf()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT' || $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (!isset($_POST['csrf_token']) || !verifyToken($_POST['csrf_token'])) {
      die('Invalid CSRF Token!');
    }
  }
}
