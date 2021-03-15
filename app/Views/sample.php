<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <title>Books List</title>
</head>

<body>
  <div class="container">
    <h1 class="center">Books List</h1>
    <table class="table table-striped">
      <thead>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
      </thead>
      <tbody>
        <?php foreach ($books as $book) : ?>
          <td><?= $book['title'] ?></td>
          <td><?= $book['author'] ?></td>
          <td><?= $book['description'] ?></td>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>