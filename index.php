<?php
require_once 'classes/DatabaseConnect.php';
require_once 'classes/Publication.php';
require_once 'classes/Article.php';
require_once 'classes/News.php';
require_once 'classes/PublicationsViewer.php';

if (isset($_POST['publication'])) {
    $text = new PublicationsViewer($_POST['publication']);
} else {
    $text = new PublicationsViewer('news');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>homework 14</title>
</head>
<body>
<div class="container">
    <div id="header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </nav>
        <form method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Publications</label>
                <select class="form-control" id="exampleFormControlSelect1" name="publication">
                    <option value="news">news</option>
                    <option value="article">articles</option>
                </select>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>

    <div id="content">
        <?php foreach ($text->write() as $key) : ?>
            <?= $key; ?>
            <br><br><br><br>
        <?php endforeach ?>
    </div>
    <div id="footer">
        <h3>Hillel hw_14_Hales</h3>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
