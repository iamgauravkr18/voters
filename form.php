<?php
include 'connection.php';

$id = $fname = $lname = $add1 = $add2 = $city = $state = $zip = $country = $phone = $email = $web = $fb = $insta = $yt = $x = $image = $file_type = $file_tmp = $file_size = $file_name = $doc_tpye = $comment = "";
$idErr = $fnameErr = $lnameErr = $add1Err = $add2Err = $cityErr = $stateErr = $zipErr = $countryErr = $phoneErr = $emailErr = $webErr = $fbErr = $instaErr = $ytErr = $xErr = $imageErr = $commentErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $phoneErr = "Mobile number is required";
  } else {
    $phone = $_POST["Phone"];

    if (!preg_match("/^[1-9][0-9]*$/", $phone)) {
      $phoneErr = "Invalid mobile number format";
    } else if (strlen($phone) != 10) {
      $phoneErr = "must be 10 digits";
    }

  }
  if (empty($_POST["zip"])) {
    $zipErr = "zip is required";
  } else {
    $zip = $_POST["zip"];

    if (!preg_match("/^[1-9][0-9]*$/", $phone)) {
      $zipErr = "Invalid zip format";
    } else if (strlen($phone) != 6) {
      $zipErr = "must be 6 digits";
    }

  }

  if (empty($_POST["web"])) {
    $webErr = "";
  } else {
    $web = ($_POST["web"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $web)) {
      $webErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = ($_POST["comment"]);
  }

  if (empty($_POST["add1"])) {
    $add1Err = "adress is required";
  } else {
    $add1 = ($_POST["add1"]);
  }
  if (empty($_POST["add2"])) {
    $add2Err = "adress is required";
  } else {
    $add2 = ($_POST["add2"]);
  }
  $city = $_POST['city'];
  if (empty($_POST["city"])) {
    $cityErr = "city is required";
  } else {
    $city = $_POST['city'];
  }
  $zip = $_POST['zip'];

  if (empty($_POST["country"])) {
    $countryErr = "country is required";
  } else {
    $country = $_POST['country'];
  }

  if (empty($_POST["state"])) {
    $stateErr = "State is required";
  } else {
    $state = $_POST['state'];
  }

  $fb = $_POST['fb'];
  $insta = $_POST['insta'];
  $yt = $_POST['YT'];
  $x = $_POST['x'];


  if (isset($_FILES['photo'])) {
    $image = $_FILES["photo"];
    $file_name = $_FILES["photo"]["name"];
    $file_size = $_FILES["photo"]["size"];
    $file_tmp = $_FILES["photo"]["tmp_name"];
    $file_type = $_FILES["photo"]["type"];

    move_uploaded_file($file_tmp, "img/" . $file_name);

    if (empty($fnameErr) && empty($lnameErr) && empty($add1Err) && empty($add2Err) && empty($phoneErr) && empty($emailErr) && empty($webErr) && empty($commentErr) && empty($stateErr) && empty($countryErr)) {
      $querry = "INSERT INTO `voters`( `fname`, `lname`, `add1`, `add2`, `city`, `state`, `zip`, `country`, `phone`, `email`, `web`, `fb`, `insta`, `yt`, `x`, `image`, `comment`) 
    VALUES ('$fname ','$lname','$add1','$add2','$city', '$state','$zip','$country','$phone','$email','$web','$fb','$insta','$yt','$x','$file_name','$comment')";
      $result = mysqli_query($conn, $querry);

      if ($result) {
        header('location:thankyou.php');
        echo "data inserted";
      } else {
        echo "not inserted";
      }
    }
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

  <div class="container">
    <div class="mid">
      <div class="body-right">
        <div class="LOCAL"><a href="index.php">LOCAL OFFICIALS</a></div>
        <div>Voting</div>
      </div>
      <div class="body-left">
        <div class="h3">
          <h3>Add officials</h3>
        </div>
        <div class="left-content">
          <div class="container-form">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="input-box">
                  First name* <input type="text" name="fname">
                  <span class="error">
                    <?php echo $fnameErr; ?>
                  </span>

                </div>
                <div class="input-box">
                  Last Name* <input type="text" name="lname">
                  <span class="error">
                    <?php echo $lnameErr; ?>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="input-box">
                  Adress1* <input type="text" name="add1">
                  <span class="error">
                    <?php echo $add1Err; ?>
                  </span>
                </div>
                <div class="input-box">
                  Adress2* <input type="text" name="add2">
                  <span class="error">
                    <?php echo $add2Err; ?>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="input-box">
                  City* <input type="text" name="city">
                  <span class="error">
                    <?php echo $cityErr; ?>
                  </span>
                </div>
                <div class="input-box">
                  State* <select name="state" id="sate" required>
                    <option value="option" selected disabled>state</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Bihar">Bihar</option>
                    <option value="karnataka">karnataka</option>
                    <option value="Gujrat">Gujrat</option>
                  </select>
                  <span class="error">
                    <?php echo $stateErr; ?>
                  </span>
                </div>
                <div class="input-box">
                  Zip Code* <input type="number" name="zip">
                  <span class="error">
                    <?php echo $zipErr; ?>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="input-box">
                  countary* <select name="country" id="country">
                    <option value="" selected disabled>countary</option>
                    <option value="india">India</option>
                    <option value="usa">Usa</option>
                    <option value="Russiya">Russiya</option>
                    <option value="chaina">Chaina</option>
                  </select>
                  <span class="error">
                    <?php echo $countryErr; ?>
                  </span>
                </div>
                <div class="input-box">
                  Phone* <input type="tel" name="Phone">
                  <span class="error">
                    <?php echo $phoneErr; ?>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="input-box">
                  Email* <input type="email" name="email">
                  <span class="error">
                    <?php echo $emailErr; ?>
                  </span>
                </div>
                <div class="input-box">
                  Website <input type="url" name="web">
                  <span class="error">
                    <?php echo $webErr; ?>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="input-box">
                  facebook <input type="url" name="fb">
                  <span class="error">
                    <?php echo $fbErr; ?>
                  </span>
                </div>
                <div class="input-box">
                  Instagram <input type="url" name="insta">
                  <span class="error">
                    <?php echo $instaErr; ?>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="input-box">
                  Youtube <input type="url" name="YT">
                  <span class="error">
                    <?php echo $ytErr; ?>
                  </span>
                </div>
                <div class="input-box">
                  X(Tweeter) <input type="url" name="x">
                  <span class="error">
                    <?php echo $xErr; ?>
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="input-box">
                  <label>Image upload</label>
                  <input type="file" name="photo" id="upload">
                  <span class="error">
                    <?php echo $imageErr; ?>
                  </span>
                </div>
                <div class="input-box">
                  comment <textarea name="comment">
                    </textarea>
                  <span class="error">
                    <?php echo $commentErr; ?>
                  </span>
                </div>
              </div>
              <div class="sinput-box">
                <input type="submit" name="done" id="inp">
                <div class="input"><button>cancel</button></div>
              </div>

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