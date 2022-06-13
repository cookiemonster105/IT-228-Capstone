<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>ROR Venues</title>
  <link href="styles/venue_styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php
include('credentials.php');
$sql = 'SELECT * FROM room';
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));


?>


<body>

  <div class="angry-grid">
    <div id="header">
      <img id="logo" src="images/logo.png" alt="logo" id="logo">
      <h1 id="title">ROR Project</h1>
    </div>
  
    

    <div id="side"> </div>
    
  <div id=main>
        <?php

        $sql = 'SELECT * FROM room';
        $iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

        $result = mysqli_query($iConn, $sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));
        
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                echo'
               
        <div id="loop_container">
            <div id="display-box">
                        
            <img id="photo" src="images/room'.$row['id'].'.jpg">
            </div>
            
            <div id="room_box">
                    <a href="index_detail.php?id='.$row['id'].'"><h2> '.$row['room_name'].' </h2></a> 
                <p>'.$row['venue_name'].' | Total Guests '.$row['room_total'].' </p>

                <p>'.$row['city'].' , '.$row['state'].' </p>
                <p> Hourly $'.$row['price_hourly']. ' | Daily $' .$row['price_daily']. '</p>

                <p>'.$row['about_venue'].' </p>
             </div>
             <div style="clear: both;"></div>
        
        </div>'        
        ;


                }//close while loop
            }//Close If Statement

            ?>
            </div>
</div>
    </div>
    
  <div id="footer"></div>
</body>

</html>