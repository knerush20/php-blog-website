

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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>My blog</title>
</head>
<body>

<?php include("app/include/header.php") ?>


<!-- MAIN -->

<div class="container">
    <div class="content row">
        <!--    MAIN CONTENT-->
        <div class="main-content col-md-9">
            <h2>The main text of the article</h2>

            <div class="single_post row ">
                <div class="img col-12">
                    <img src="assets/images/img2.png" alt="Post" class="img-thumbnail">
                </div>
                <div class="info">
                    <span><i class="fa-regular fa-user"></i> Writer Name  </span>
                    <span><i class="fa-solid fa-calendar-days"></i> May 11, 2019 </span>
                </div>
                <div class="single_post_text col-12">
                    <h3> Article name.</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the <a href="#">printing </a> and typesetting industry.
                    </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
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
                    <label>
                        <input type="text" name="search-term" class="text-input"  placeholder="Search">
                    </label>
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
<?php include("app/include/footer.php")?>
<!--END FOOTER-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>