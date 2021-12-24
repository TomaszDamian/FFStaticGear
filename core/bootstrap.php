<?php

use App\Core\App;

require 'core/helper.php';

App::bind('config',require 'config.php');

App::bind('database', new QueryBuilder(
	Connection::Make(App::get('config')['database'])
));