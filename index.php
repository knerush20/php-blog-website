<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  Bootstrap      -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!--    Fontawesome-->
    <script src="https://kit.fontawesome.com/4811f92f9b.js" crossorigin="anonymous"></script>

    <!--    Custom Styling-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>My blog</title>
</head>
<body>

<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="/">My Blog</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="#">Home</a>  </li>
                    <li><a href="#">About</a> </li>
                    <li><a href="#">Services</a> </li>

                    <li>
                        <a href="#">
                            <i class="fa-regular fa-user"></i>
                            Login
                        </a>
                        <ul>
                            <li><a href="#">Admin panel</a></li>
                            <li><a href="#">Exit</a> </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!--Carousel START-->
<div class=" container ">
    <div class="row">
        <h2 class="slider-title"> Top posts </h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner " style="">
            <div class="carousel-item active ">
                <img src="images/img4.jpeg" class="cover d-block w-100 " alt="Slider Image">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="#">First slide label</a> </h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/img6.jpg" class="cover d-block w-100" alt="Slider Image">
                <div class=" carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="#">First slide label</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/img5.jpg" class="cover d-block w-100" alt="Slider Image">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href="#">First slide label</a>l</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!--Carousel END-->
<!-- MAIN -->

<div class="container">
    <div class="content row">
        <!--    MAIN CONTENT-->
        <div class="main-content col-md-9">
            <h2>Latest posts </h2>

            <div class="post row ">
                <div class="img col-12 col-md-4">
                    <img src="images/img2.png" alt="Post" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Post about dynamic website</a>
                    </h3>
                    <span><i class="fa-regular fa-user"></i> Writer Name  </span>
                    <span><i class="fa-solid fa-calendar-days"></i> May 11, 2019 </span>
                    <p class="preview-text">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>

                </div>
                </div>
            <div class="post row ">
                <div class="img col-12 col-md-4">
                    <img src="images/img2.png" alt="Post" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Post about dynamic website</a>
                    </h3>
                    <span><i class="fa-regular fa-user">  </i> Writer Name</span>
                    <span><i class="fa-solid fa-calendar-days"></i> May 11, 2019 </span>
                    <p class="preview-text">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>

                </div>
                </div>

            </div>
        <!--    SIDEBAR CONTENT-->
        <div class="sidebar col-md-3">

            <div class="section search">
                <h3> Search</h3>
                    <form action="/" method="post" >
                        <input type="text" name="search-term" class="text-input"  placeholder="Search">
                    </form>

            </div>

            <div class="section topics">
                <h3>Topics</h3>
                <ul>
                    <li><a href="#">Poems</a></li>
                    <li><a href="#">Quotes</a></li>
                    <li><a href="#">Fiction</a></li>
                    <li><a href="#">Biography</a></li>
                    <li><a href="#">Motivation</a></li>
                    <li><a href="#">Inspiration</a></li>
                    <li><a href="#">Life Lessons</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- END MAIN -->

<!--FOOTER-->
<div class="footer container-fluid">
    <div class="footer-container container">
        <div class="row">
            <div class="footer-section about col-md-4 col-12">
                <h3 class="logo-text">My Blog</h3>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                <div class="contact">
                    <span><i class="fa-solid fa-phone"> </i>&nbsp; 123-456-789 </span>
                    <span><i class="fa-solid fa-envelope"></i>&nbsp; info@myblog.com </span>
                </div>
                <div class="socials ">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-section links col-md-4 col-12">
                <h3>Quick links</h3>
                <br>
                <ul>
                    <a href="#">
                        <li>Actions</li>
                    </a>
                    <a href="#">
                        <li>Command</li>
                    </a>
                    <a href="#">
                        <li>Exercise</li>
                    </a>
                    <a href="#">
                        <li>Gallery</li>
                    </a>
                    <a href="#">
                        <li>All</li>
                    </a>
                </ul>
            </div>

            <div class="footer-section contact-form col-md-4 col-12">
                <h3>Contacts</h3>
                <br>
                <form action="/" method="post">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Email address">
                    <textarea name="message" cols="30" rows="4" class="text-input contact-input" placeholder="Message"></textarea>
                    <button type="submit" class="btn btn-big contact-btn">
                        <i class="fa-solid fa-envelope"></i>
                        Send
                    </button>
                </form>
            </div>

        </div>

        <div class="footer-bottom">
            &copy; myblog.com | Designed by ME
        </div>
    </div>
</div>
<!--END FOOTER-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>