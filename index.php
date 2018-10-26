<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SERVE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

    <link rel="stylesheet" href="./style/serveStyles.css" >
</head>

<body>
    <div class="container-fluid" style="padding: 0px;">
        <nav class="navbar-default navbar-expand-lg navbar-light bg-light">
            <div class="row col-sm-12" style="margin: 0px; ">
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <a href="index.html" class="navbar-brand logo" id="brandName">SERVE</a>

                    <button class="navbar-toggler mt-4" type="button" data-toggle="collapse" data-target="#navbar-container"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" style=" float: right;">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse row col-sm-12 col-md-12 col-lg-5" id="navbar-container">
                    <div class="col-sm-12" style="padding: 0px; width: 95%;">
                        <button class="btn btn-primary btn-lg authButton ml-3"><a href="login.php">Sign In</a></button>
                        <button class="btn btn-primary btn-lg authButton ml-3"><a href="">Sign Up</a></button>
                    </div>
                </div>
            </div>
        </nav>


        <div class="row" id="homeWelcomeDiv">
            <div id="homeWelcomeCarousel" class="carousel slide col-sm-12" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-fluid d-block w-100" src="images/justice-bar-resized.png" alt="First slide">
                    </div>
                </div>
            </div>
            <div class="col-sm-12" id="homeWelcome">
                <div class="row mt-5">
                    <div class="col-md-6 col-lg-6"></div>
                    <div class="col-sm-12 col-md-6 col-lg-6 text-center">
                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <h3 class="homeIntro">Choose A Service</h3>
                            </div>
                            <div class="col-sm-12 homeWelcomeServicesDiv mt-4">
                                <div class="row homeWelcomeServicesRow">
                                    <div class="col-sm-6">
                                        <a href="pay_fgn.php" class="homeWelcomeServices">
                                            <div class=" text-center">
                                                <i class="fas fa-university fa-3x" aria-hidden="true"></i>
                                                <p>Pay Federal Government</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="login.php" class="homeWelcomeServices">
                                            <div class=" text-center">
                                                <i class="fas fa-adjust fa-3x" aria-hidden="true"></i>
                                                <p>Access Payroll</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center mt-4">
                                <div class="form-group" style="width: 100%; ">
                                    <button class="btn btn-md btn-primary" style="color: white;">Explore All Services</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5" id="serviceRow">
            <div class="col-sm-12">
                <h1 class="mt-5">
                    <span>Why we created Serve</span>
                </h1>
                <hr>
            </div>

            <div class="col-sm-12 col-md-7 col-lg-7 whyListDiv">
                <div class="row" id="whyRowDiv">
                    <div class="iconDiv text-center col-sm-2"><i class="fas fa-university fa-2x" aria-hidden="true"></i></div>
                    <div class=" whyDiv col-sm-10 col-md-9">
                        <h6>Automate Payroll For Businesses</h6>
                        <p>Regardless of the number of employees present, Serve will automate your payroll
                            system
                            reducing human errors and delays</p>
                    </div>


                    <div class="iconDiv col-sm-2 text-center"><i class="fas fa-adjust fa-2x" aria-hidden="true"></i></div>
                    <div class="whyDiv col-sm-10">
                        <h6>Balance Financal And Judicial Activities</h6>
                        <p>Serve is built with the Judiciary system at heart, aiming to reduce the hassle
                            between
                            financial services and judicial activities </p>
                    </div>
                    <div class="iconDiv col-sm-2 text-center"><i class="fas fa-users fa-2x" aria-hidden="true"></i></div>
                    <div class="whyDiv col-sm-10">
                        <h6>Improve Financial Transactions Among Government Bodies </h6>
                        <p>Serve is designed to make transactions among government bodies fluid and seamless</p>
                    </div>
                    <div class="iconDiv col-sm-2 text-center"><i class="fas fa-credit-card fa-2x" aria-hidden="true"></i></div>
                    <div class="whyDiv col-sm-10">
                        <h6>Enable Seamless Financial Transactions For Everyone</h6>
                        <p>Serve creates an environment where money can be transfered and received by anybody
                            in a
                            seamless fashion</p>
                    </div>
                    <div class="iconDiv col-sm-2 text-center"><i class="fas fa-file-alt fa-2x" aria-hidden="true"></i></div>
                    <div class="whyDiv col-sm-10">
                        <h6>Invoice Creation</h6>
                        <p>Regardless of your reason Serve has the ability to produce an invoice on request for
                            any
                            purpose you require</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5"><img src="" alt="success"></div>
        </div>

        <div class="row" id="aboutServeRow" style="padding-right: 15px; padding-left: 15px;">
            <div class="col-sm-6 col-md-6" id="aboutContentImage" style="margin-right: 0px;">
                wdcicehjdcj
            </div>
            <div class="col-sm-6 col-md-6" id="aboutContent">
                <h3 class="text-center mb-4 mt-5">About SERVE</h3>
                <h4 class="mb-4 text-center">Serve is a sophisticated platform designed to ease financial
                    transactions
                    in Nigeria</h4>
                <p class="text-center">Regardless of your reason behind making a finanacial transaction Serve is
                    designed to fit your needs. Whether you represent a government organisation, business company
                    or
                    just looking to pay bills and support your
                    family, Serve will deliver for you on time and with clear accuracy.
                </p>
            </div>
        </div>
        <div class="row" id="contactServeRow">
            <div class="col-sm-12 mt-5" id="contactServeContainer">
                <div class="col-sm-12 text-center mb-5">
                    <h2>Got Any Questions? We Are Here For you</h2>
                    <h3>Contact Us</h3>
                </div>
                <div class="col-sm-12">
                    <div class="row" id="contactDetailsRow">
                        <div class=" contactIconDiv col-sm-2 col-md-5"><i class="fas fa-phone-volume fa-1x" aria-hidden="true"
                                style="float: right;"></i></div>
                        <div class="contactDetailsDiv col-sm-9 col-md-7">+234 70 3448 5980, +234 80 9327 7345</div>
                    </div>
                    <div class="row" id="contactDetailsRow">
                        <div class=" contactIconDiv col-sm-5"><i class="fas fa-envelope fa-1x " aria-hidden="true"
                                style="float: right;"></i></div>
                        <div class="contactDetailsDiv col-sm-7">supportgroup@serve.com</div>
                    </div>
                    <div class="row" id="contactDetailsRow">
                        <div class="contactIconDiv col-sm-5"><i class="fas fa-address-book fa-1x" aria-hidden="true"
                                style="float: right;"></i></div>
                        <div class="contactDetailsDiv col-sm-7">Flat 43, Bodelon Street, Ikoyi. Lagos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container-fluid mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-5 col-lg-3 mr-3 mt-5">
                                <h1 class="mt-5">
                                    <a href="index.html" class="footer-logo">SERVE</a>
                                </h1>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-2 mr-2 mt-5  list-div">
                                <h4> Resources</h4>
                                <ul>
                                    <li>
                                        <a href="#">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="#">Help Center</a>
                                    </li>
                                    <li>
                                        <a href="#">Report Abuse</a>
                                    </li>
                                    <li>
                                        <a href="#">Policy & Rules</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-2 mt-5 mr-1 list-div">
                                <h4>About</h4>
                                <ul>
                                    <li>
                                        <a href="#">Company Bio</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                    <li>
                                        <a href="#">Our team</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-4 mt-5 contactForm">
                                <form action="" method="" class="form-inline" style="float: right;">
                                    <div class="input-group mt-5">
                                        <input type="text" placeholder="Subscribe to emails" value="" name="" class="form-control" />
                                        <button class="btn btn-primary ml-2">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 text-center mt-5 socialMediaLogos">
                        <ul class="mt-3">
                            <li>
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </li>
                            <li>
                                <i class="fab fa-linkedin fa-2x"></i>
                            </li>
                            <li>
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </li>
                            <li>
                                <i class="fab fa-instagram fa-2x"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-12 mt-5 copyright">
                        <span>&COPY; 2018, Copyright AGTech </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>



</html>