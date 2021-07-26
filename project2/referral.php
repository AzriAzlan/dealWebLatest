<?php

session_start();

require_once "pdo.php";

$deal = $_GET['deal'];
$refer =$_GET['refer'];
$sharer = $_SESSION['user_id'];

$referLink = "localhost/dealWebLatest/project2/referral.php?refer=$sharer%26deal=$deal";

$stmts = $pdo->query("SELECT * FROM deal d WHERE d.deal_id='$deal'");
$dealresults = $stmts->fetchAll(PDO::FETCH_ASSOC);

$stmts = $pdo->query("SELECT * FROM users u WHERE u.user_id='$refer'");
$userresults = $stmts->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dealresults as $row) {
    foreach($userresults as $user) {
    echo'<h1 style="color:black; text-align:center; font-size:50px; text-transform: uppercase;">'. htmlentities($row['deal_name']) . '</h1>
                <div class="row" style="border-top-style:solid; border-bottom-style:solid;">
                    <p class="col-lg-6" style="text-align:left;">Promo code: <strong>'. htmlentities($row['promo_code']) . '</strong></p>
                    <p class="col-lg-6" style="text-align:right;"> Expired: '. htmlentities($row['validity']) . '</p>
                </div>
                <h5>Shared by:</h5>
                <ul>'. htmlentities($user['user_name']) . '</ul>
                <h5>Description:</h5>
                <ul>'. htmlentities($row['description']) . '</ul>
                <h5>Tagline:</h5>
                <ul>'. htmlentities($row['tagline']) . '</ul>
                <h5>Reward Redeem:</h5>
                <ul>'. htmlentities($row['reward']). htmlentities($row['reward_unit']) . '</ul>
                <h5>Address:</h5>
                <ul>'. htmlentities($row['company_address']).'</br>'. htmlentities($row['company_postcode']) .'</br>'. htmlentities($row['company_country']) .'</ul>';
            
                //redeem
               echo'<form method="POST">
                <button name="redeem" class="btn btn-info col-lg-12" style="margin-bottom:20px">Redeem</button>
                </form>';

                //trigger modal
                echo'<div class=" imagesdeal" data-toggle="modal" data-target="#'.htmlentities($row['deal_id']).'">
                        <button class="btn btn-info col-lg-12" style="margin-bottom:20px">Share</button>';
                //modal
                echo
                '<div id="'.htmlentities($row['deal_id']).'" class="modal fade" role="dialog">
                    <div class="modal-dialog">';
                //modal content
                echo

                        '<div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">'.htmlentities($row['deal_name']).'</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <h1 style="font-size:30px">Tagline:</h1>
                                <p class="card-text">'. htmlentities($row['tagline']) . '</p>
                                <h1 style="font-size:30px">Description:</h1>
                                <p class="card-text">'. htmlentities($row['description']) . '</p>
                                <h1 style="font-size:30px">Reward:</h1>
                                <p class="card-text">'. htmlentities($row['reward']). htmlentities($row['reward_unit']) . '</p>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <div data-href="http://localhost/deal%20application/homepage.php" data-layout="button" data-size="large">
                                    <a target="_blank"
                                        href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fdeal%2520application%2Fhomepage.php&amp;src=sdkpreparse"
                                        class="fb-xfbml-parse-ignore"><img src="../savedDeal/Icon/fb.png" style="height:50px; margin:10px"></a>
                                </div>
                                <a href="http://www.twitter.com/share?url=http://localhost/deal%20application/dealshare.php"><img src="../savedDeal/Icon/twittericon.png" style="height:50px; margin:10px"></a>
                                <a href="whatsapp://send?text='.$referLink.'" data-action="share/whatsapp/share"><img src="../savedDeal/Icon/wa.png" style="height:50px; margin:10px"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


}
}
if(isset($_POST['redeem'])) {
        $stmt = $pdo->prepare('INSERT INTO referrals (deal_id,sender_id,receiver_id) VALUES ('.$deal.','.$refer.','.$sharer.')');
        $stmt->execute();
        echo "Sucess";
}
?>
<!DOCTYPE html>
<html>
<head>
	    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="mycss.css">
    <!-- Load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<title>Landing</title>
</head>
<body>



</body>
</html>