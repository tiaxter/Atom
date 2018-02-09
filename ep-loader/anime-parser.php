<?php
require_once ('../php/db_manage.php');
require_once ('../library/simple_html_dom.php');

$Connection = new db_manage();
$shortname = $_POST['shortname'];
$url = $_POST['url'];

$html = new simple_html_dom();
$source = file_get_contents("$url");
$html->load($source);
$template_table = $html->find()