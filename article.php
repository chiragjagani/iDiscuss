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

    <title>iDiscuss - Coding Forums</title>

    <style>
    body {
        background-image: url('img/2.jpg');
        background-size: cover;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
</head>



<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
                $article_title = $_POST['atitle'];
                $article_desc = $_POST['adesc'];
                $sno = $_POST['sno'];
                $sql = "INSERT INTO `articles` (`article_title`, `article_desc`, `article_by`, `posted`) VALUES ('$article_title', '$article_desc', '$sno', current_timestamp());";
                $result = mysqli_query($conn, $sql);
                $showAlert = true;
            if($showAlert){
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your aerticle has been added!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> ';
            }
        }





    ?>

    <?php

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){    
       echo '<div class="container fw-normal">
            <h1 class="py-3 fw-bolder">Articles<p class="fs-6">(invention and ideas)</p>
            </h1>
            <form class="mt-1" action=" '. $_SERVER['REQUEST_URI'] .'" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                    <label for="exampleInputEmail1" class="form-label">Article Title</label>
                    <input type="text" class="form-control" id="atitle" name="atitle" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text mb-2">Keep your title as short and crisp as possible</div>

                </div>
                <label for="exampleFormControlTextarea1">Article Description</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="adesc" name="adesc"
                        style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Write your ideas and articales to here!</label>
                </div>
                <button type="submit" class="btn btn-success mb-3" name="but_upload">Post Articale</button>
            </form>
        </div>';
    }else{
        echo'
        <div class="container fw-normal mt-3">
            <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Login First!</h4>
            <p>You are not able to post article. You are not logged in!</p>
            </div>
        </div>';
    }
?>
    <div class="container">
        <h1 class="my-4 fw-bolder">Reading Articles</h1>
    </div>

    <?php
    $sql="SELECT * FROM `articles`";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $title=$row['article_title'];
        $desc=$row['article_desc'];
        $posted=$row['posted'];
        $article_by=$row['article_by'];
        $sql2 = "SELECT user_name FROM `users` WHERE sno= $article_by";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
   

    echo'<div class="container">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">'. $row2['user_name'] .'</strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="#">'. $title .'</a>
                </h3>
                <div class="mb-1 text-muted">'. $posted .'</div>
                <p class="card-text mb-auto">'. $desc .'</p>
            </div>
        </div>
    </div>';
}
if($noResult){
    echo ' 
    <div class="container">
    <div class="card my-3">
    <div class="card-header">
    Nothing
    </div>
    <div class="card-body bg-dark">
      <h5 class="card-title text-success">No Article Found</h5>
      <p class="card-text text-success">Be the first person to post a article.</p>
    </div>
  </div> 
  </div>';
}
?>

    <?php include 'partials/_footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->



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