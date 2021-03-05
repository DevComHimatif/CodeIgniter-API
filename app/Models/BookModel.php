<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
  protected $table = 'book';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['title', 'author', 'description', 'slug'];

  public function getBook($slug = false)
  {
    if ($slug === false)
    {
      return $this->findAll();
    }

    else
    {
      return $this->where(['slug' => $slug])->first();
    }
  }

}

