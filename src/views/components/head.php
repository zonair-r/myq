<!-- <?php require('../../db.php'); ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/dropzone.css">
    <title>MyQ</title>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top pt-2 my-0">
        <a class="navbar-brand" href="index.php">LOGO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
       <form action="" class="form-inline w-75 d-none d-sm-block align-middle">
       <div class="input-group w-100 mb-3 ">
            <input type="text" class="form-control" placeholder="Categories">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="button-addon2">Search</button>
            </div>
        </div>
       </form>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active px-2">
                    <a  class="nav-link" data-toggle="modal" data-target="#uploadMediaModal">
                        <i class="fas fa-plus-circle text-primary fa-2x"></i></a></li>
                <li class="nav-item active px-2">
                    <a  class="nav-link" data-toggle="modal" data-target="#notificationsModal">
                        <i class="fas fa-bell text-primary fa-2x"></i>
                    </a>
                </li>
                <li class="nav-item active px-2">
                    <a  class="nav-link" data-toggle="modal" data-target="#loginModal">
                        <i class="fas fa-user-circle text-primary fa-2x"></i>
                    </a>
                </li>
            </ul>
        </div>
</nav>