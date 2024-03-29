<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Book</title>
    <style>
        form label{
            display: block;
            margin-top: 8px;
        }
    </style>
</head>
<body>
<?php include("confs/config.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id"); $row = mysqli_fetch_assoc($result);
?>
<h1>Edit Book</h1>
<form action="book-update.php" method="post" enctype="multipart/form-data"> <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
  <label for="title">Book Title</label>
  <input type="text" name="title" id="title"
value="<?php echo $row['title'] ?>">
  <label for="author">Author</label>
  <input type="text" name="author" id="author"
value="<?php echo $row['author'] ?>"> <label for="sum">Summary</label>
<textarea name="summary" id="sum"><?php echo $row['summary'] ?></textarea>
  <label for="price">Price</label>
  <input type="text" name="price" id="price"
value="<?php echo $row['price'] ?>">
<label for="categories">Category</label>
  <select name="category_id" id="categories">
    <option value="0">-- Choose --</option>
<?php
$categories = mysqli_query($conn, "SELECT id, name FROM categories"); while($cat = mysqli_fetch_assoc($categories)):
?>
<option value="<?php echo $cat['id'] ?>"
<?php if($cat['id'] == $row['category_id']) echo "selected" ?> > <?php echo $cat['name'] ?>
</option>
<?php endwhile; ?> </select>
<br><br>
<img src="covers/<?php echo $row['cover'] ?>" alt="" height="150"> <label for="cover">Change Cover</label>
<input type="file" name="cover" id="cover">
<br><br>
<input type="submit" value="Update Book">
<a href="book-list.php">Back</a>
</form>
</body>
</html>