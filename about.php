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

     <link rel="stylesheet" href="astyle.css" />

    <title>iDiscuss - Coding Forums</title>

    <style>
    body {
        background-image: url('img/bg1.jpg');
        background-size: cover;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
 

    <div class="about-section">
        <h1>About Us Page</h1>
       
       
    </div>

    <h2 style="text-align:center">Our Team</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <img src="img/chirag.jpeg"  style="width:100% hight:50%">
                <div class="container">
                    <h2>Jagani Chirag</h2>
                    <p class="title">Fullstack</p>
                    <p>jaganichirag912@gmail.com</p>
                    <p>  <a href="https://www.instagram.com/chiragjagani09/" class="social-icon"><button class="button" >Contact</button></p></a>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="img/umang.jpeg"  style="width:100%">
                <div class="container">
                    <h2>Gol Umang</h2>
                    <p class="title">Designer</p>
                    <p>golumang2004@gmail.com</p>
                    <p><a href="https://www.instagram.com/umang_50211/" class="social-icon"><button class="button">Contact</button></p></a>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="img/raj.jpg"  style="width:100%">
                <div class="container">
                    <h2>Govani Raj</h2>
                    <p class="title">Tester</p>
                    <p>govaniraj77@gmail.com</p>
                    <p><a href="https://www.instagram.com/govani_raj_patel/" class="social-icon"><button class="button">Contact</button></p></a>
                </div>
            </div>
        </div>
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