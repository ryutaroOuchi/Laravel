<?php

namespace App;

use Jenssegers\Mongodb\Model as Eloquent;

class Mesh extends Eloquent { 
	protected $connection = 'mongodb';
	protected $collection = 'meshes';
}
