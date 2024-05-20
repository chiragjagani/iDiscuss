<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <title>iDiscuss - Coding Forums</title>

    <style>
        body {
            background-image: url('img/bg2.jpg');
            background-size: cover;
        }
    </style>

</head>

<!-- INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`)
VALUES (NULL, 'How to install Python in windows', 'Unable to install Python', '2', '0', current_timestamp()); -->

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {

        // Insert into thread db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);


        $id = $_GET['catid'];
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`)
            VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your thread has been added! Please wait for community to respond 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> ';
        }
    }
    ?>


    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE categorie_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['categorie_name'];
        $catdesc = $row['categorie_description'];
    }

    ?>

    <!-- For img Upload -->

    <!-- <?php
            include("_dbconnect.php");

            if (isset($_POST['but_upload'])) {
                $name = $_FILES['file']['name'];
                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);

                // Select file type
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Valid file extensions
                $extensions_arr = array("jpg", "jpeg", "png", "gif");

                // Check extension
                if (in_array($imageFileType, $extensions_arr)) {
                    // Upload file
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
                        // Insert record
                        $query = "insert into threads(thread_img) values('" . $name . "')";
                        mysqli_query($conn, $query);
                    }
                }
            }
            ?> -->


    <div class="container my-3">
        <div class="jumbotron border rounded-3 border-dark rounded-lg">
            <h1 class="display-4 fw-bolder">Hello, Welcome to <?php echo $catname; ?> Forums</h1>
            <p class="lead fw-normal"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p><b>Rules of this forum you must follow all rules.</b></P>
            <p>1). No Spam / Advertising / Self-promote in the forums, 2). Do not post copyright-infringing material,
                3).
                Do not post “offensive” posts, links or images, 4). Do not cross post questions, 5). Do not PM users
                asking for help, 6). Remain respectful of other members at all times.</p>
            <a class="btn btn-primary btn-lg" href="https://en.wikipedia.org/wiki/<?php echo $catname; ?>_(programming_language)" role="button">Learn
                more about <?php echo $catname; ?></a>
        </div>
    </div>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container fw-normal">
            <h1 class="py-2 fw-bolder">Start a Discussion</h1>
            <form action=" ' . $_SERVER['REQUEST_URI'] . '" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
                    <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                    <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible</div>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="desc" name="desc"
                        style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Ellabortate Your Concern</label>
                </div>
                <button type="submit" class="btn btn-success" name="but_upload">Post Thread</button>
            </form>
        </div>';
    } else {
        echo '
        <div class="container fw-normal">
            <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Login First!</h4>
            <p>You are not able to post thread. You are not logged in!</p>
            </div>
        </div>';
    }
    ?>
    <div class="container">
        <h1 class="my-4 fw-bolder">Browse Questions</h1>

        <?php

        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $id = $row['thread_id'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_name FROM `users` WHERE sno= $thread_user_id";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);



            echo '<ul class="list-unstyled">
                <li class="media my-3">
                <img src="img/avatar.png" class="mr-3" alt="avatar" hight="64px" width="64px">
                <div class="media-body fw-normal">
                    <h6 class="mt-0 mb-1"> Asked by:- ' . $row2['user_name'] . ' at (' . $thread_time . ')</h6>   
                    <h5 class="mt-0 mb-1"><a href="thread.php?threadid=' . $id . ' ">' . $title . '</a></h5>
                    <p>' . $desc . '</p>
                </div>
                <a href="#"><button id="like" onclick="liked()">
                    <i class="fa fa-thumbs-up"></i>
                    <span class="icon">Like</span>
                </button></a>

                <script>
                    function liked(){
                        var element = document.getElementById("like");
                        element.classList.toggle("liked");
                    }
                 </script>
                </li>';
        }
        if ($noResult) {
            echo ' <div class="card my-3">
                <div class="card-header">
                Nothing
                </div>
                <div class="card-body bg-dark">
                  <h5 class="card-title text-success">No Threads Found</h5>
                  <p class="card-text text-success">Be the first person to ask a question</p>
                </div>
              </div> ';
        }
        ?>

        <!-- <li class="media my-4">
            <img src="img/avatar.png" class="mr-3" alt="avatar" hight="64px" width="64px">
            <div class="media-body">
                <h5 class="mt-0 mb-1">List-based media object</h5>
                <p>Maybe a reason why all the doors are closed. Cause once you’re mine, once you’re mine. Be your
                    teenage dream tonight. Heavy is the head that wears the crown. It's not even a holiday, nothing
                    to celebrate. A perfect storm, perfect storm.</p>
            </div>
            </li> -->
    </div>












    <?php include 'partials/_footer.php'; ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>