<?php

namespace App\Controllers;

use App\Models\BookModel;

class Home extends BaseController
{
	public function index()
	{
		$bookModel = new BookModel();

		$data = [ 'books' => $bookModel->getBook()];

		return view('sample', $data);
	}
}
