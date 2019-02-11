<?php
session_start();
?>

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
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Messages</a></li>
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
                <div class="col-sm-3" id="leftWidth">
                    <div class="well">
                        <div class="well">
                            <p><a href="#">My Profile</a></p>
                            <img src="img/0.png" class="img-circle" height="65" width="65" alt="Avatar">
                        </div>
                        <div class="well">
                            <p><a href="#">Interests</a></p>
                            <p>
                                <span class="label label-default">News</span>
                                <span class="label label-primary">W3Schools</span>
                                <span class="label label-success">Labels</span>
                                <span class="label label-info">Football</span>
                                <span class="label label-warning">Gaming</span>
                                <span class="label label-danger">Friends</span>
                            </p>
                        </div>
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><strong>Ey!</strong></p>
                            People are looking at your profile. Find out who.
                        </div>
                        <p><a href="#">Link</a></p>
                        <p><a href="#">Link</a></p>
                        <p><a href="#">Link</a></p>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="well">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">Gender:</label>
                                <div class="col-sm-10 text-left">
                                    <label class="radio-inline"><input type="radio" name="gender">Male</label>
                                    <label class="radio-inline"><input type="radio" name="gender">Female</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">Birth:</label>
                                <div class="col-sm-10">
                                    <div class="col-sm-4">
                                        <select class="form-control" id="yyyy">
                                            <option>1990</option>
                                            <option>1991</option>
                                            <option>1992</option>
                                            <option>1993</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="mm">
                                            <option>Jan</option>
                                            <option>Feb</option>
                                            <option>Mar</option>
                                            <option>Apr</option>
                                            <option>May</option>
                                            <option>Jun</option>
                                            <option>Jul</option>
                                            <option>Aug</option>
                                            <option>Sep</option>
                                            <option>Oct</option>
                                            <option>Nov</option>
                                            <option>Dec</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="dd">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">Motto:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Motto">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10 text-left">
                                    <button type="submit" class="btn btn-default">Modify</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-sm-2" id="rightWidth">
                    <div class="well">
                        <div class="thumbnail">
                            <p>Upcoming Events:</p>
                            <img src="img/mig29.jpg" alt="Paris" width="400" height="300">
                            <p><strong>Paris</strong></p>
                            <p>Fri. 27 November 2015</p>
                            <button class="btn btn-primary">Info</button>
                        </div>

                        <div class="well">
                            <p>ADS</p>
                        </div>
                        <div class="well">
                            <p>ADS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>
    </body>
</html>