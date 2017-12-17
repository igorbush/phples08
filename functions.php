<?php
session_start();
error_reporting( E_ERROR );
function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function login($login, $password)
{
    $user = getUser($login);
    if (!$user) {
        return false;
    }
    if ($user['password'] == md5($password)) {
        $_SESSION['user'] = $user;
        var_dump($_SESSION);
        return true;
    }
    return false;
}

function getParamPost($name)
{
    return isset($_POST[$name]) ? $_POST[$name] : null;
}

function getUsers()
{
    $jsonData = file_get_contents(__DIR__ . '/login.json');
    $data = json_decode($jsonData, true);
    if (!$data) {
        return [];
    }
    return $data;
}

function getUser($login)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['login'] == $login) {
            return $user;
        }
    }
    return null;
}

function getUsername($login)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['username'] == $login) {
            return $user;
        }
    }
    return null;
}

function isAuthorized()
{
    return !empty($_SESSION['user']);
}

function redirect($page) {
    header("Location: $page.php");
    die;
}

function logout()
{
    session_destroy();
    redirect('index');
}