<?php

namespace App\Controllers;

use App\Models\BookModel;

class BookController extends BaseController
{
  protected $bookModel;

  public function __construct()
  {

  $this->bookModel = new BookModel();
  }

  public function test()
  {
    return $this->response->setStatusCode(200)
                          ->setBody("success!");
  }

  public function getBook($slug = false)
  {
    
    $retrievedBooks = $this->bookModel->getBook($slug);

    return $this->response->setStatusCode(200)
                          ->setJSON($retrievedBooks);
  }

  public function createBook()
  {
    $newBook = $this->request->getJSON(true);

    $titleAuthor = "{$newBook['author']} {$newBook['title']}";

    $newBook['slug'] = url_title($titleAuthor, "-", true);
    
    $this->bookModel->insert($newBook);

    return $this->response->setStatusCode(200)
                          ->setJSON($newBook);
  }

  public function updateBook()
  {
    $updatedBook = $this->request->getJSON(true);

    $titleAuthor = "{$updatedBook['author']} {$updatedBook['title']}";

    $updatedBook['slug'] = url_title($titleAuthor, "-", true);

    $this->bookModel->update($updatedBook['id'], $updatedBook);

    return $this->response->setStatusCode(200)
                          ->setJSON($updatedBook);
  }

  public function deleteBook()
  {
    $deletedBook = $this->request->getJSON(true);

    $this->bookModel->delete($deletedBook['id']);

    return $this->response->setStatusCode(200)
                          ->setBody("Deleted Book with ID {$deletedBook['id']}");
  }
}