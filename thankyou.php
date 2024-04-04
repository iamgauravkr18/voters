<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Header</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/heaader.css" />
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container h1 {

            justify-content: center;
            text-align: center;
            color: blue;
        }

        h4 {
            justify-content: center;
            text-align: center;
            color: goldenrod;
        }

        .container button a {
            justify-content: center;
            color: white;
            text-align: center;
            text-decoration: none;

        }

        .container button {

            background-color: blueviolet;
            justify-content: center;
            align-items: center;
        }

        .container {
            margin-top: 210px;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
    </style>
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
                <div><a href="index.php">LOCAL OFFICIALS</a></div>
                <div class="LOCAL"><a href="index.php">LOCAL OFFICIALS</a></div>
                <div>Voting</div>
            </div>
            <div class="body-left">
                <div class="h3">
                    <!-- <h3>loacl offical</h3> -->
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
                    </div> -->
                <!-- <div><button id="Add"> <a href="form.php">Add New</a></button></div> -->
                <div class="left-content">
                    <div class="container">
                        <!-- <button><a href="index.php">HOME</a></button> -->
                        <h1>Thank you!</h1>
                        <h4>The new official has been added successfully.</h4>
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