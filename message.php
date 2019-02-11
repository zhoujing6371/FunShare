<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Fun Share</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Fun Share</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="#">Messages</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group input-group">
                            <input type="text" class="form-control" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container text-center" style="margin-top:70px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default text-left">
                        <div class="panel-body">
                            <div class="form-group">
                                <textarea name="Moment" placeholder="Write Your Message Here" class="form-control"></textarea>
                            </div>
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary btn-sm">Send</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="well">
                        <div class="row">
                            <?php
                            $from_id = $_GET["from_id"];
                            ?>
                            <div class="col-sm-2">
                                <img src="img/0.png" class="img-circle" height="65" width="65" alt="Avatar">
                            </div>
                            <div class="col-sm-10">
                                <p class="text-left"><a href="#">User 3</a></p>
                                <p class="text-left">Last Message from User 3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="well">
                        <div class="row">
                            <div class="col-sm-10">
                                <p class="text-right"><a href="#">User 2</a></p>
                                <p class="text-right">Message from User 2</p>
                            </div>
                            <div class="col-sm-2">
                                <img src="img/0.png" class="img-circle" height="65" width="65" alt="Avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>