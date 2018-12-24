<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['user_all'])==0)
  { 
header('location:index');
}
else{ 
include('db/config.php');
 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project Index</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Project Index</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
<!--
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
-->
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container " style="font-family: Times New Roman;">

      <!-- Page Heading -->
      <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
      </h1>

      <!-- Project One -->
      <div class="row">
        <div class="col-md-8">
          <div id="mycarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel" ></li>
                    <li data-slide-to="2" data-target="#mycarousel" ></li>
                  </ol>
               
                  <div class="carousel-item  active">
                      <img src="img/c.jpg" height="300" width="700" class="rounded">
                      <div class="carousel-caption ">
                        <h2 >Heading One</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry and
                        </p>
                        <a href="#" class="btn btn-danger">Read more</a>
                      </div>
                  </div>
                  <div class="carousel-item ">
                     <img src="img/b.jpg"  height="300" width="700" class="rounded">
                      <div class="carousel-caption ">
                        <h2 >Heading Two</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry 
                        </p>
                        <a href="#" class="btn btn-warning">Read more</a>
                      </div>
                  </div>
                  <div class="carousel-item  ">
                   <img src="img/a.jpg" height="300" width="700" class="rounded">
                      <div class="carousel-caption">
                        <h2 >Heading Three</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry
                        </p>
                        <a href="#" class="btn btn-primary">Read more</a>
                      </div>
                  </div>
                  <a href="#mycarousel" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        <div class="col-md-4" style="border-radius: 2px solid red; ">
          <div class="card ">
            <div class="card-body">
              <h3>Car Pool</h3><hr>
          <p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates </p>
          <a class="btn btn-outline-dark d-block" href="../car-booking/dashbord">Car Pool</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Two -->
 
      <div class="row">
        <div class="col-md-8">
          <div id="mycarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel1" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel1" ></li>
                    <li data-slide-to="2" data-target="#mycarousel1" ></li>
                  </ol>
               
                  <div class="carousel-item  active">
                      <img src="img/d.jpg" height="300" width="700" class="rounded">
                      <div class="carousel-caption ">
                        <h2 >Heading One</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry and
                        </p>
                        <a href="#" class="btn btn-danger">Read more</a>
                      </div>
                  </div>
                  <div class="carousel-item ">
                     <img src="img/e.jpg"  height="300" width="700" class="rounded">
                      <div class="carousel-caption ">
                        <h2 >Heading Two</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry 
                        </p>
                        <a href="#" class="btn btn-warning">Read more</a>
                      </div>
                  </div>
                  <div class="carousel-item  ">
                   <img src="img/n.jpg" height="300" width="700" class="rounded">
                      <div class="carousel-caption">
                        <h2 >Heading Three</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry
                        </p>
                        <a href="#" class="btn btn-primary">Read more</a>
                      </div>
                  </div>
                  <a href="#mycarousel1" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel1" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        <div class="col-md-4" style="border-radius: 2px solid red; ">
          <div class="card ">
            <div class="card-body">
              <h3>Project One</h3><hr>
          <p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates </p>
          <a class="btn btn-outline-dark d-block" href="#">View Project</a>
            </div>
          </div>
        </div>
      </div>

      <!-- /.row -->

      <hr>

      <!-- Project Three -->
      <div class="row">
        <div class="col-md-8">
          <div id="mycarousel2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel2" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel2" ></li>
                    <li data-slide-to="2" data-target="#mycarousel2" ></li>
                  </ol>
               
                  <div class="carousel-item  active">
                      <img src="img/g.jpg" height="300" width="700" class="rounded">
                      <div class="carousel-caption ">
                        <h2 >Heading One</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry and
                        </p>
                        <a href="#" class="btn btn-danger">Read more</a>
                      </div>
                  </div>
                  <div class="carousel-item ">
                     <img src="img/h.jpg"  height="300" width="700" class="rounded">
                      <div class="carousel-caption ">
                        <h2 >Heading Two</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry 
                        </p>
                        <a href="#" class="btn btn-warning">Read more</a>
                      </div>
                  </div>
                  <div class="carousel-item  ">
                   <img src="img/i.jpg" height="300" width="700" class="rounded">
                      <div class="carousel-caption">
                        <h2 >Heading Three</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry
                        </p>
                        <a href="#" class="btn btn-primary">Read more</a>
                      </div>
                  </div>
                  <a href="#mycarousel2" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel2" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        <div class="col-md-4" style="border-radius: 2px solid red; ">
          <div class="card ">
            <div class="card-body">
              <h3>Project One</h3><hr>
          <p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates </p>
          <a class="btn btn-outline-dark d-block" href="#">View Project</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Four -->
      <div class="row">
        <div class="col-md-8">
          <div id="mycarousel4" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#mycarousel4" class="active"></li>
                    <li data-slide-to="1" data-target="#mycarousel4" ></li>
                    <li data-slide-to="2" data-target="#mycarousel4" ></li>
                  </ol>
               
                  <div class="carousel-item  active">
                      <img src="img/j.jpg" height="300" width="700" class="rounded">
                      <div class="carousel-caption ">
                        <h2 >Heading One</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry and
                        </p>
                        <a href="#" class="btn btn-danger">Read more</a>
                      </div>
                  </div>
                  <div class="carousel-item ">
                     <img src="img/k.jpg"  height="300" width="700" class="rounded">
                      <div class="carousel-caption ">
                        <h2 >Heading Two</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry 
                        </p>
                        <a href="#" class="btn btn-warning">Read more</a>
                      </div>
                  </div>
                  <div class="carousel-item  ">
                   <img src="img/m.jpg" height="300" width="700" class="rounded">
                      <div class="carousel-caption">
                        <h2 >Heading Three</h2>
                        <p class="lead">
                          To pursue a highly challenging career in the IT 
                      industry
                        </p>
                        <a href="#" class="btn btn-primary">Read more</a>
                      </div>
                  </div>
                  <a href="#mycarousel4" class="carousel-control-prev" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">previse</span>
                </a>
                <a href="#mycarousel4" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">next</span>
                </a>
                </div>
                  </div>
        </div>
        <div class="col-md-4" style="border-radius: 2px solid red; ">
          <div class="card ">
            <div class="card-body">
              <h3>Project One</h3><hr>
          <p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates </p>
          <a class="btn btn-outline-dark d-block" href="">View Project</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
   <script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
  </body>

</html>

<?php } ?>
