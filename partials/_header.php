<?php 
session_start();


echo '<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fs-2 fw-bolder" href="/forum">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bolder" aria-current="page" href="/forum">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder" href="/forum/about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bolder" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

                    $sql = "SELECT categorie_name, categorie_id FROM `categories`";
                    $result = mysqli_query($conn, $sql); 
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<li><a class="dropdown-item" href="threadlist.php?catid='. $row['categorie_id']. '">' . $row['categorie_name']. '</a></li>';
                         }
                echo'</ul>
                </li>
                <li class="nav-item fw-bolder">
                <a class="nav-link" href="/forum/article.php">Articles</a>
                <li class="nav-item fw-bolder">
                    <a class="nav-link" href="/forum/contact.php">Contact</a>
                </li>
            </li>
            </ul>';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                echo '
                <p class="text-info my-1 mx-2 fw-bolder fs-3">Welcome "'. $_SESSION['useremail']. '" </p>
                <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                  <a href="partials/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
                  </form>';
            }
            else{
                echo '
                <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    <nav class="navbar navbar-dark bg-dark">
                    <a href="partials/index.html" class="btn btn-info">Join now!</a>
                    </nav>
                </form>';
            }
        echo '</div>
            </div>
            </nav>';
?>

<?php
  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You can now login!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
?>