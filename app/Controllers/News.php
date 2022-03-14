<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
	public function index() {
		$model = model(NewsModel::class);

		$data = [
			'news' => $model->getNews(),
			'title' => 'News_archive'
		];

		echo view('templates/header', $data);
		echo view('news/overview', $data);
		echo view('templates/footer', $data);
	}

	public function view($slug = null) {
		$model = model(NewsModel::class);

		$data['news'] = $model->getNews($slug);

		if(empty($data['news'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
		}

		echo view('news/view', $data);
	}
}