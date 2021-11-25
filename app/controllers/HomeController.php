<?php 

namespace App\controllers;

use App\QueryBuilder;
use League\Plates\Engine;

class HomeController{
	
	private $templates;
	private $db;

	public function __construct(){

		$this->templates = new Engine('../app/views');
		$this->db = new QueryBuilder;
	}

	public function index($vars)
	{

		$posts = $this->db->getAll('test');
		echo $this->templates->render('homepage', ['postsInViews' => $posts]);
	}

	public function about($vars)
	{
		$post = $this->db->getOne('test', implode('', $vars));
		echo $this->templates->render('about', ['userInViews' => $post]);
	}

	public function delete($vars)
	{

		$post = $this->db->delete('test', implode('', $vars));
		return $post;
	}
}