<?php
namespace Models;
use Silex\Application;

class Index {

	public function home(Application $app) {
		$data = array(
			'title' => 'PM Canal 5',
			'page' => array(),
			'posts' => array()
		);

		return $app['twig']->render('index.html', $data);
	}

	public function getPage(Application $app, $page) {
		//$data = $this->data->getPage($page);
		$template = $this->data->hasOwn?"template-page-$data->title.html":'template-page.html';

		$data = array(
			'title' => $data->title,
			'page' => $page,
			'description' => $data->description,
		);

		return $app['twig']->render($template, $data);
	}

	public function getSingle(Application $app, $page, $post) {
		$data = array(
			'title' => $page,
			'page' => $page,
			'post' => $post
		);

		return $app['twig']->render('template-single.html', $data);
	}

}