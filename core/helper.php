<?php
function redirect($path){
	header("Location: {$path}");
}

function view($viewLocation, $data = []){
	extract($data);
	require "app/views/$viewLocation.view.php";
}