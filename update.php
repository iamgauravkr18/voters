<?php
include 'connection.php';

$id = $fname = $lname = $add1 = $add2 = $city = $state = $zip = $country = $phone = $email = $web = $fb = $insta = $yt = $x = $image = $file_name = $file_size = $file_tmp = $file_type = $comment = "";
$idErr = $fnameErr = $lnameErr = $add1Err = $add2Err = $cityErr = $stateErr = $zipErr = $countryErr = $phoneErr = $emailErr = $webErr = $fbErr = $instaErr = $ytErr = $xErr = $imageErr = $commentErr = "";

if (isset($_POST['update'])) {


  if (empty($_POST["fname"])) {
    $fnameErr = " first Name is required";
  } else {
    $fname = ($_POST["fname"]);

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["lname"])) {
    $lnameErr = "last Name is required";
  } else {
    $lname = ($_POST["lname"]);

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = ($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["Phone"])) {
    print_r($_POST);

    $phoneErr = "Mobile number is required";
  } else {
    $phone = $_POST["Phone"];

    if (!preg_match("/^[1-9][0-9]*$/", $phone)) {
      $phoneErr = "Invalid mobile number format";
    } else if (strlen($phone) != 10) {
      $phoneErr = "must be 10 digits";
    }

  }
  if (empty($_POST["web"])) {
    $webErr = "";
  } else {
    $web = ($_POST["web"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $web)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = ($_POST["comment"]);
  }

  $add1 = $_POST['Add1'];
  $add2 = $_POST['Add2'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $country = $_POST['countary'];
  $web = $_POST['web'];
  $fb = $_POST['fb'];
  $insta = $_POST['insta'];
  $yt = $_POST['yt'];
  $x = $_POST['x'];


  if ($_FILES['photo']['size'] > 0) {
    $image = $_FILES["photo"];
    $file_name = $_FILES["photo"]["name"];
    $file_size = $_FILES["photo"]["size"];
    $file_tmp = $_FILES["photo"]["tmp_name"];
    $file_type = $_FILES["photo"]["type"];

    move_uploaded_file($file_tmp, "img/" . $file_name);
  } else {
    $file_name = $_POST['old-image'];
  }

  $id_u = $_POST['get-id'];

  $querry = "UPDATE `voters` SET `fname`='$fname',`lname`='$lname',`add1`='$add1',`add2`='$add2',`city`='$city',`state`='$state',`zip`='$zip',`country`='$country',`phone`='$phone',`email`= '$email',`web`='$web',`fb`='$fb',`insta`='$insta',`yt`='$yt',`x`='$x',`image`='$file_name',`comment`='$comment' WHERE id= $id_u ";

  $result = mysqli_query($conn, $querry);

  if ($result) {
    header('location:thankyou.php');
    echo "data inserted";
  } else {
    echo "not inserted";
  }

}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Header</title>
  <link rel="stylesheet" href="./css/heaader.css" />
  <link rel="stylesheet" href="./css/form.css">
</head>

<body>
  <?php
  $id = $_GET['id'];

  $querry = "SELECT * FROM voters WHERE id = $id";
  $result = $conn->query($querry);
  while ($row = $result->fetch_assoc()) {

    ?>

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

    <div class="wrapper">

      <div class="body">
        <div class="body-right">
          <div>LOCAL OFFICIALS</div>
          <div class="LOCAL">LOCAL OFFICIALS</div>
          <div>Voting</div>
        </div>
        <div class="body-left">
          <div class="h3">
            <h3>update officials</h3>
          </div>
          <div class="left-content">

            <div class="container-form">

              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="get-id" value="<?php echo $row['id']; ?>">
                <div class="row-">
                  <div class="row">
                    <div class="input-box">
                      First name* <input type="text" name="fname" value="<?php echo $row['fname']; ?>">

                    </div>
                    <div class=" input-box">
                      Last Name* <input type="text" name="lname" value="<?php echo $row['lname']; ?>">
                    </div>
                  </div>
                  <div class=" row">
                    <div class="input-box">
                      Adress1* <input type="text" name="Add1" value="<?php echo $row['add1']; ?>">
                    </div>
                    <div class=" input-box">
                      Adress2* <input type="text" name="Add2" value="<?php echo $row['add2']; ?>">
                    </div>
                  </div>
                  <div class=" row">
                    <div class="input-box">
                      City* <input type="text" name="city" value="<?php echo $row['city']; ?>">
                    </div>
                    <div class="input-box">
                      State* <select name="state" id="" name="state">
                        <option value="option" disabled>state</option>
                        <option value="Bihar" <?php if ($row['state'] == 'Bihar') {
                          echo 'selected';
                        } ?>">Bihar</option>
                        <option value="delhi" <?php if ($row['state'] == 'delhi') {
                          echo 'selected';
                        } ?>">Delhi</option>
                        <option value="karnataka" <?php if ($row['state'] == 'karnataka') {
                          echo 'selected';
                        } ?>">karnataka</option>
                        <option value=" Gujrat" <?php if ($row['state'] == 'Gujrat') {
                          echo 'selected';
                        } ?>">Gujrat</option>
                      </select>
                    </div>
                    <div class="input-box">
                      Zip Code* <input type="tel" name="zip" value="<?php echo $row['zip']; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-box">
                      countary* <select name="countary" value="<?php echo $row['countary']; ?>">
                        <option value="" disabled>countary</option>
                        <option value="India">India</option>
                        <option value="Usa">Usa</option>
                        <option value="Russiya">Russiya</option>
                        <option value="Chaina ">Chaina</option>
                      </select>
                    </div>
                    <div class="input-box">
                      Phone* <input type="tel" name="Phone" value="<?php echo $row['phone']; ?> ">
                    </div>
                  </div>
                  <div class=" row">
                    <div class="input-box">
                      Email <input type="email" name="email" value="<?php echo $row['email']; ?>">

                    </div>
                    <div class="input-box">
                      Website <input type="url" name="web" value="<?php echo $row['web']; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-box">
                      facebook <input type="url" name="fb" value="<?php echo $row['fb']; ?>">
                    </div>
                    <div class="input-box">
                      Instagram <input type="url" name="insta" value="<?php echo $row['insta']; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-box">
                      Youtube <input type="url" name="yt" value="<?php echo $row['yt']; ?>">
                    </div>
                    <div class="input-box">
                      X(Tweeter) <input type="url" name="x" value="<?php echo $row['x']; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-box">
                      <label>Image upload</label>
                      <i class="bi bi-upload"></i>
                      <input type="file" name="photo" id="upload" value="<?php echo $row['image']; ?>">
                      <input type="hidden" name="old-image" id="old-img" value="<?php echo $row['image']; ?>">
                      <img src="./img/<?php echo $row['image']; ?>" id="old-img-preview" alt=""
                        style="width: 50px; height:50px;">
                      <?php {
                        echo "<button id='remove-img'>Remove</button>";
                      } ?>

                      <script>
                        document.getElementById('remove-img').addEventListener('click', function (e) {
                          e.preventDefault();
                          let old_img = document.getElementById('old-img');
                          let old_img_preview = document.getElementById('old-img-preview');
                          old_img_preview.src = "";
                          old_img.value = "";
                          this.style.display = "none";
                        });
                      </script>
                    </div>

                    <div class="input-box">
                      comment <textarea name="comment"><?php echo $row['comment']; ?></textarea>
                    </div>
                  </div>
                  <div class="btnn">
                    <input type="submit" value="Update" name="update">
                    <div class="input"><button><a href="index.php">cancel</a></button </div>
                    </div>
                    <?php
  }
  ?>
            </form>
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