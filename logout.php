<?php
require_once 'functions.php';
if (isAuthorized()) {
    logout();
}