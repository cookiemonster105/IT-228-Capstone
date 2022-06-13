<!DOCTYPE html>
<html lang="en">

<head>
  <title id="top_title">ROR Room</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/room_styles.css">
</head>

<body>
  <?php
            include('credentials.php');
            if(isset($_GET['id'])){
                $id = (int)$_GET['id'];
                                }
                else{
                        header('Location:index.php');
                    }


                        $sql = 'SELECT * FROM room WHERE id = '.$id. '';

                        $iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or                     die(myError(__FILE__,__LINE__,mysqli_connect_error()));

                        $result = mysqli_query($iConn, $sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

                        if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $room_name = stripslashes($row['room_name']);
                                    $venue_name = stripslashes($row['venue_name']);
                                    $price_daily  = stripslashes($row['price_daily']);
                                    $price_hourly = stripslashes($row['price_hourly']);
                                    $theatre_total = stripslashes($row['theatre_total']);
                                    $ushape_total = stripslashes($row['ushape_total']);
                                    $banquettotal = stripslashes($row['banquettotal']);
                                    $classroom_total = stripslashes($row['classroom_total']);
                                    $room_total = stripslashes($row['room_total']);
                                    $ada = stripslashes($row['ada']);
                                    $budg_type = stripslashes($row['budg_type']);
                                    $r = stripslashes($row['r']);
                                    $street = stripslashes($row['street']);
                                    $city = stripslashes($row['city']);
                                    $state = stripslashes($row['state']);
                                    $zip = stripslashes($row['zip']);
                                    $about = stripslashes($row['about']);
                                    $length = stripslashes($row['length']);
                                    $width = stripslashes($row['width']);
                                    $height = stripslashes($row['height']);
                                    $amenties = stripslashes($row['amenties']);
                                    $feedback = '';
                                }//closing while loop

            }//Closing if(mysqli_num_rows($result)>0) 
            else{
                    $feedback = 'we have a problem';

                }//close else

        $sqft = $width * $length
    ?>

  <header>
      <a href="index.php"><img src="images/logo.png" alt="logo" id="logo"></a>
      <h1 id="header_title">ROR Project</h1>
  </header>

  <div id="side">
            <?php echo '<img id="detail_photo" src="images/room'.$id.'.jpg"> '?>

                         <h3> Address</h3>

                        <?php
                            echo '<p>'.$street.'</p>
                            <p>'.$city.', '.$state. '<p>
                            <p>'.$zip.'</p>'
                        ?>

  </div>


  <div id="main">
    
      <div class="title">
        <?php
                            echo '<h2 id="venue_title" >'.$room_name.'</h2>'
                        ?>

                        <hr>
      </div>

      

      <div id="room_info">
            <div id="room">
                            <?php
                                echo 
                                '<p>'.$about.' </p>
                                <h3>'.$venue_name.'</h3>
                                <p>'.$about_venue.' </p>'
                            ?>
                <h3>Pricing</h3>
                            <?php
                            echo ' <p>Price Hourly $' .$price_daily. ' | Price Daily $' .$price_hourly.'</p>'
                            ?>

                            <h3>Capacity</h3>
                            <?php
                            echo ' <p>RoomTotal '.$room_total. ' | Theatre ' .$theatre_total. ' | U Shape ' .$ushape_total.' | Banquet ' .$banquettotal .' | Classroom ' .$classroom_total. '</p>'
                            ?>
                        
                            <?php echo '<h3>ADA</h3> <p> '.$ada.'</p>
                        
                            <h3>Building Type</h3> <p> '.$budg_type.'</p>' ?>
                        
                            <h3>Amenities</h3>
                            <?php echo '<p>' .$amenties. '</p>' ?>
                            <h3> Room Details</h3>
                            <?php
                                echo '<p> Lenght '.$length.' | Width '.$width.' | Height '.$height.' | SqFt ' .$sqft. '</p>'
                            
                            ?>
                            
                        
                            <button type="button" onclick="alert('Your message is one its way. We will get back to you soon.')">Contact!</button>
                            <br>
                            <b><h3> <a href="index.php">Venues</a></h3></b>            

            </div>
       </div >
    

        <div class="other_rooms">
            <?php echo '<h2 class ="other_title_1" >Other Rooms At The '.$venue_name.'</h2>' ?>
                                <?php
                            
                            
                                    $sql = "SELECT * FROM room WHERE venue_name LIKE '$venue_name' AND NOT room_name='$room_name' ";
                                

                                    
                                    $iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

                                    $result = mysqli_query($iConn, $sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));
                                    
                                    if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result))
                                        {
                                            echo'
                                            <hr id="other_hr">
                                            <div class="display-box">
                                                <a href="index_detail.php?id='.$row['id'].'"><h2> '.$row['room_name'].' </h2></a> 

                                                <div class="other_room_photo">
                                            
                                                    <img class="photo_of_other_room" src="images/room'.$row['id'].'.jpg">    
                                                </div> 

                                            <div class="other_room_text">
                                                <h3>'.$row['venue_name'].' </h3>
                                                Total Guests '.$row['room_total'].' </p>
                                                <p>'.$row['city'].' , '.$row['state']. '</p>
                                                <p> Hourly $'.$row['price_hourly']. ' | Daily $' .$row['price_daily']. '</p>
                                                <a href="index_detail.php?id='.$row['id'].'">Room</a>
                                                </div> 
                                                <div id="room_box">
                                                    
                                                </div>  
                                                <div style="clear: both;"></div>
                                                </div>'        
                                                ;


                                        }   //close while loop
                                    }//Close If Statement

                                ?>

                                              
                                                                    


        </div>

        <div class="other_venues">

              <?php echo '<h2 class ="other_title_2" >Other Rooms In '.$city.'</h2>' ?>
                                <?php
                            
                            
                                    $sql = "SELECT * FROM room WHERE city LIKE '$city' AND NOT room_name='$room_name' AND NOT venue_name='$venue_name'";
                                

                                    
                                    $iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

                                    $result = mysqli_query($iConn, $sql) or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));
                                    
                                    if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result))
                                        {
                                            echo'
                                            <hr id="other_hr">
                                            <div class="venue_display-box">
                                                <a href="index_detail.php?id='.$row['id'].'"><h2> '.$row['room_name'].' </h2></a> 

                                                <div class="other_venue_photo">
                                            
                                                    <img class="photo_of_other_venue" src="images/room'.$row['id'].'.jpg">    
                                                </div> 

                                            <div class="other__venue_text">
                                                <h3>'.$row['venue_name'].' </h3>
                                                Total Guests '.$row['room_total'].' </p>
                                                <p>'.$row['city'].' , '.$row['state']. '</p>
                                                <p> Hourly $'.$row['price_hourly']. ' | Daily $' .$row['price_daily']. '</p>
                                                <a href="index_detail.php?id='.$row['id'].'">Room</a>
                                                </div> 
                                                <div id="room_box">
                                                    
                                                </div>  
                                                <div style="clear: both;"></div>
                                                </div>'        
                                                ;


                                        }   //close while loop
                                    }//Close If Statement

                                ?>

                                              
                                                                    


                                </div>
     
      
    </div>
  
  <footer>
    <p>Footer</p>
  </footer>

</body>

</html>
