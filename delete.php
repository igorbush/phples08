<?php
require_once 'functions.php';
if (!empty($_GET['test'])) {
$file_dir = "tests/";
$test_name = $_GET['test'];
if(!empty($_REQUEST['test']) && is_file($file_dir . $_REQUEST['test'] . '.json')) {
        unlink($file_dir . $_REQUEST['test'] . '.json');
    }
    redirect('list');
}