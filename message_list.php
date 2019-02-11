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
                    <div class="well">
                        <div class="row">

                            <?php
                            $servername = 'localhost';
                            $username = 'root';
                            $password = 'root';
                            $con = new mysqli($servername, $username, $password, "funsharenew");
                            if ($con->connect_error) {
                                die("Connection failed: " . $con->connect_error);
                            }
                            $user_id = $_SESSION[user_id];

                            if ($user_id != "") {
                                $query = "SELECT from_id, message_content FROM messages WHERE to_id= $user_id ORDER BY date_created LIMIT 1";
                                $response = @mysqli_query($con, $query);
                                

                                // If the query executed properly proceed
                                if ($response) {
                                    echo '<div class="col-sm-11">';
                                    // mysqli_fetch_array will return a row of data from the query
                                    // until no further data is available
                                    while ($row = mysqli_fetch_array($response)) {
                                        echo'<div class="col-sm-1"><img src="img/0.png" class="img-circle" height="65" width="65" alt="Avatar"></div> ';                                      
                                        echo '<p class="text-left"><a href="message.php?from_id="';
                                        echo '$row["from_id"]';
                                        echo '>' ;
                                                
                                        $row['from_id'] . '</a></p><p class="text-left">' .
                                        $row['message'] . '</td><td align="left">';
                                        echo '</tr>';
                                    }
                                    echo '</table></div>';
                                } else {
                                    echo "As You have no friend, you have no messages! <br />";
                                    echo mysqli_error($con);
                                }

                                // Close connection to the database
                                mysqli_close($con);
                            }
                            ?>
                            <p class="text-left"><a href="#">User 3</a></p>
                            <p class="text-left">Last Message from User 3</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</body>
</html>