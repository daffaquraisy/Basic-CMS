<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- MyCSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

  <title>Landing</title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">Exam</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Pricing</a>
          <a class="nav-item nav-link" href="#">Features</a>
          <a class="nav-item nav-link" href="#">About</a>
          <a class="nav-item btn btn-primary tombol" href="#">Join Us</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- NavbarEnd -->

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Get work done <span>faster</span> <br> and <span>better</span> with us</h1>
      <a href="" class="btn btn-primary tombol">Our Work</a>
    </div>
  </div>
  <!-- JumbotronEnd -->

  <!-- Container -->
  <div class="container">


    <!-- InfoPanel -->
    <div class="row justify-content-center">
      <div class="col-10 info-panel">
        <div class="row">

          @foreach ($data['informations'] as $information)
          <div class="col-lg">
          <img src="https://drive.google.com/uc?export=view&id={{$information->image}}" class="float-left">
            <h4>{{$information->title}}</h4>
            <p>{{$information->description}}</p>
          </div>
          @endforeach

        </div>
      </div>
    </div>
    <!-- InfoPanelEnd -->

    <!-- WorkingSpace -->
    <div class="row workingspace">
      <div class="col-lg-6">
        <img src="https://drive.google.com/uc?export=view&id=10JrhRmVyqDidWt_B8PFMk5-G1h4aW0n_" class="img-fluid">
      </div>
      <div class="col-lg-5">
        <h3>You <span>learn</span> like at <span>home</span></h3>
        <p>Belajar dengan suasana hati yang lebih asik dan mempelajari hal baru setiap hari nya.</p>
        <a href="" class="btn btn-primary tombol">Gallery</a>
      </div>
    </div>
    <!-- WorkingSpaceEnd -->

    <!-- Testi -->
    <section class="testimonial">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h5>Our Team.</h5>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-6 justify-content-center d-flex">

          @foreach ($data['teams'] as $team)
          <figure class="figure">
          <img src="https://drive.google.com/uc?export=view&id={{$team->image}}"
              class="figure-img img-fluid rounded-circle utama">
            <figcaption class="figure-caption">
              <h5>{{$team->name}}</h5>
              <p>{{$team->jobs->career}}</p>   
            </figcaption>
          </figure>
          @endforeach

        </div>
      </div>
    </section>
    <!-- TestiEnd -->

    <!-- Footer -->
    <div class="row footer">
      <div class="col text-center">
        <p>2019 All Rights Reserved by RPL.</p>
      </div>
    </div>
    <!-- FooterEnd -->


  </div>
  <!-- ContainerEnd -->










  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>