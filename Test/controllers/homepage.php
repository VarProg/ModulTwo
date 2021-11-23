<?php 

echo "Homepage<hr>";


use App\QueryBuilder;

$db = new QueryBuilder;

$posts = $db->getAll('test');

echo "<pre>";
var_dump($posts);
echo "</pre>";

// $db->insert('test',
// 	['title' => 'New title from QueryFactory2'],
// 	 );

// $db->update('test',
// 	['title' => 'Update2'],
// 	15);

$db->delete('test', 16);