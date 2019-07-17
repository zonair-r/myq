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
    <!-- <link rel="stylesheet" href="../../css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="../../css/typeahead.css"> -->
    <title>MyQ</title>
    
    <!--  this is the styling done for the tags multi select auto complete input field  -->
    <style>
        body{ font-family:calibri;}
        .twitter-typeahead { display:initial !important; }
        .bootstrap-tagsinput {line-height:40px;display:block !important;}
        .bootstrap-tagsinput .tag {background:#09F;padding:5px;border-radius:4px;}
        .tt-hint {top:2px !important;}
        .tt-input{vertical-align:baseline !important;}
        .typeahead { border: 1px solid #CCCCCC;border-radius: 4px;padding: 8px 12px;width: 300px;font-size:1.5em;}
        .tt-menu { width:300px; }
        span.twitter-typeahead .tt-suggestion {padding: 10px 20px;	border-bottom:#CCC 1px solid;cursor:pointer;}
        span.twitter-typeahead .tt-suggestion:last-child { border-bottom:0px; }
        .demo-label {font-size:1.5em;color: #686868;font-weight: 500;}
        .bgcolor {max-width: 440px;height: 200px;background-color: #c3e8cb;padding: 40px 70px;border-radius:4px;margin:20px 0px;}
	
	</style>
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