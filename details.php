<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Header</title>
  <link rel="stylesheet" href="./css/heaader.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
  <header>
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="left">
            <div class="img">
              <img src="./css/logo.png" alt="" style="width: 210px; height: 65px" />
            </div>
          </div>

          <div class="right">
            <nav>
              <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">VOTE</a></li>
                <li><a href="#">ELACTED OFFICIALS</a></li>
                <li><a href="#">RACE</a></li>
                <li>
                  <a href="#">EVENTS</a>
                </li>
                <li><a href="#" id="even">DONATE</a></li>
                <li><a href="#">LOGIN</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="wrapper">
    <div class="body">
      <div class="body-right">
        <div class="LOCAL"><a href="index.php">Loacl offical</a></div>

        <div>Voting</div>
      </div>
      <div class="body-left">
        <div class="h3">
          <h3> Offical Info</h3>
        </div>
        <!-- <div class="body-row">
          <div class="filter">
            <input type="text" name="filter" id="" placeholder="filter" />
          </div>
          <div class="starting">
            <select name="starting" id="selec">
              <option value="starting" selected disabled>starting</option>
              <option value="search by name">search by name</option>
            </select>
          </div>
          <div><button id="Add"> <a href="demo.php">Add New</a></button></div>
        </div> -->
        <div class="left-content-">
          <?php
          include 'connection.php';
          $id = $_GET['id'];
          $querry = "SELECT * FROM `voters` WHERE id = $id";

          $result = $conn->query($querry);
          $row = $result->fetch_assoc();
          ?>
          <div class="details-card">
            <div class="card-det-left">
              <?php
              if ($row['image'] != "") { ?>
                <img src="./img/<?php echo $row['image'] ?>" style="width:250px; height:250px;">
              <?php } else { ?>
                <img src="./man.png" alt="" style="width:250px; height:250px;">
              <?php } ?>
              <div class="icon">
                <a href="<?php echo $row['insta'] ?>" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $row['fb'] ?>"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $row['x'] ?>"><i class="bi bi-twitter-x"></i></a>
                <a href="<?php echo $row['yt'] ?>"><i class="bi bi-youtube"></i></a>
                <a href="<?php echo $row['web'] ?>"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <div class="card-det-right">
              <h2>
                <?php echo $row['fname'] ?>
                <?php echo $row['lname'] ?>
              </h2>
              <div> <i class="bi bi-geo-fill"></i>
                <?php echo $row['add1'] ?>
                <?php echo $row['add2'] ?>

              </div>


              <div> <i class="bi bi-telephone"></i>
                <?php echo $row['phone'] ?>
              </div>
              <div><i class="bi bi-envelope"></i>
                <?php echo $row['email'] ?>
              </div>
              <div> <i class="bi bi-info-lg"></i>
                <?php echo $row['comment'] ?>
              </div>

            </div>
          </div>



        </div>
      </div>
    </div>
    <footer>
      <div class="foot">
        <div class="copyright">
          <div class="section">
            <div class="row-align-item">
              <div class="allright">ALL right reserved by @2024</div>
              <div class="Virginia-Beach">
                <img src="./css/logo-fot.svg" alt="#" />
                <a href="#" id="veg">verganiya repubalication party</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
</body>


</html>