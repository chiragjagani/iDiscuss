<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
     <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>iDiscuss - Coding Forums</title>

    <style>
    body {
        background-image: url('img/bg3.jpg');
        background-size: cover;
    }
    </style>

</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        // Query the users table to find out the name of OP
        $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_name'];
    }
    
    ?>

    <?php 
            $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            $comment = $_POST['comment'];

            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment); 

            $sno = $_POST['sno']; 
            $sql = " INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp()); ";   
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert){
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your comment has been added!  
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> ';
            }
        }
    ?>

    <div class="container my-3 ">
        <div class="jumbotron border rounded-3 border border-dark rounded-lg">
            <h1 class="display-4 fw-bold"><?php echo $title; ?></h1>
            <p class="lead fw-normal"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p><b>Rules of this forum you must follow all rules.</b></P>
            <p>1). No Spam / Advertising / Self-promote in the forums, 2). Do not post copyright-infringing material,
                3).
                Do not post “offensive” posts, links or images, 4). Do not cross post questions, 5). Do not PM users
                asking for help, 6). Remain respectful of other members at all times.</p>
            <p><b>Posted by:- <em><?php echo $posted_by; ?></em></b></p>
        </div>
    </div>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo  '<div class="container fw-normal">
        <h1 class="py-2 fw-bolder">Post a Comment</h1>
        <form action="'. $_SERVER['REQUEST_URI'] .'" method="post" >
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment"
                    style="height: 100px" required></textarea>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                <label for="floatingTextarea2">Type your comment</label>
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>';
    }else{
        echo'
        <div class="container fw-normal">
            <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Login First!</h4>
            <p>You are not able to post comment. You are not logged in!</p>
            </div>
        </div>';
    }
?>

    <div class="container">
        <h1 class="my-4 fw-bolder">Discussions</h1>

        <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id=$id"; 
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $comment_time = $row['comment_time'];
                // $comment_time = date("F j, Y, g:i a");
                $thread_user_id = $row['comment_by'];

                echo '<ul class="list-unstyled">
                <li class="media my-3">
                <img src="img/avatar.png" class="mr-3" alt="avatar" hight="64px" width="64px">
                <div class="media-body">
                    <h6 class="mt-0 mb-1">'. $row2['user_name'] .' ('. $comment_time .')</h6>
                    <p class="my-0 font-weight-bold">'. $content .'</p>
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
            if($noResult){
                echo ' <div class="card my-3">
                <div class="card-header">
                  Nothing
                </div>
                <div class="card-body bg-dark">
                  <h5 class="card-title text-success">No Comments Found</h5>
                  <p class="card-text text-success">Be the first person to write a comment</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>