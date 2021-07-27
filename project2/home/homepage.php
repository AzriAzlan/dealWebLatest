<?php
session_start();
?>

<html>

<head>
    <!-- Latest compiled and minified CSS -->
<!--     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
     	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/	css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="mycss.css">
    <!-- Load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="home.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
</head>

<body class="bg">

    <!--navigation-->
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">DealShare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../newDeal/userIntReg1.php">Register Deal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../savedDeal/dealShare.php">Saved Deals</a>
                </li>
                 <li class="nav-item">
                    <a href="../profile/profilePage.php"><img width=35; src="https://icon-library.com/images/profile-icon-white/profile-icon-white-3.jpg"></a>
                </li>
            </ul>
    </nav>


<header class="page-header header container-fluid">

	<div class="description">
    <h1>DealShare</h1>
    <p>Browse , Share & Earn Points <span id="datetime"></span></p>

      <form style="display:inline-block;" class="form-inline my-2 my-lg-0" method="POST">
                <input style="width: 50vw;" class="form-control mr-sm-2" type="search" placeholder="Search for a deal" aria-label="Search"
                    name="dealID">
                <button class="btn my-2 my-sm-0" type="submit"
                    style="border-radius:10px; height:35px; background-color:white"><i class="fa fa-search"></i></button>
            </form>

</div>
	
</header>

<?php
    ?>
    <!--Content-->
                <?php
                    if(isset($_POST['dealID'])){

        $search = $_POST['dealID'];
        echo "<h2 style='margin-top:35; text-align:center;'>Search results for ".htmlentities($search)."</h2>"; 
     
                     
        echo'<!--navigation-->
        <nav class="navbar navbar-expand-md navbar-light bg-light" id="navdetailspage">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active fs-5 fw-bold" aria-current="page" href="homepage.php">Home</a>
                  <div class="align-self-center"><img src="https://image.flaticon.com/icons/png/512/271/271228.png" style="width: 15px; height: 15px;"/></div>
                  <a class="nav-link active fs-5 fw-bold" aria-current="page" href="#">'.htmlentities($search).'</a>
                     
                </div>
            </div>
            </div>
        </nav>';

                     include "../savedDeal/dealsharelogic.php";

                    }
                    else{

                    $name=$_SESSION['username'];
                    echo "<h2 style='margin-top:35; text-align:center;'>Welcome , $name!</h2>"; 
                    echo "<p style='text-align:center;'>Here are some deals to look at today</p>"; 

                        echo'   
                        <div id="contenthome" class="container-fluid">
                        <div class="d-flex justify-content-center">         
                        <div class="row d-flex justify-content-start" style="width:90%">
                        <div class="dropdown col-lg-12 d-flex justify-content-end" style="margin-top:5px;">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by:
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form method="POST">
                                    <input type="submit" class="dropdown-item" name="DealName" value="Name"></input>
                                    <input type="submit" class="dropdown-item" name="DealID" value="ID"></input>
                                </form>
                            </div>
                        </div>';
                        include "homepagelogic.php";

                    }
                ?>
            </div>
        </div>
    </div>

<script type="text/javascript">

$(document).ready(function(){
    $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 50);
            return false;
        });
});


</script>

</body>

</html>