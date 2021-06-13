<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Taller Login</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="http://45.236.129.159/~taller/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="http://45.236.129.159/~taller/assets/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <style>
    html,
    body,
    header,
    .view {
      height: 100%;
    }
    @media (min-width: 560px) and (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view  {
        height: 650px;
      }
    }
  </style>
</head>

<body class="login-page">

  <!-- Main Navigation -->
  <header>

    <!-- Intro Section -->
    <section class="view intro-2">
      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

              <!-- Form with header -->
              <?php echo form_open("auth/login");?>
              <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body">

                  <!-- Header -->
                  <div class="form-header ns-verde">
                    <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Acceso Administración</h3>
                  </div>

                  <!-- Body -->
                

                  <div class="md-form">
                    <i class="fas fa-envelope prefix white-text"></i>
                    <!-- <input type="text" id="orangeForm-email" class="form-control"> -->
                    <?php echo form_input($identity);?>
                    <label for="orangeForm-email">Email</label>
                  </div>

                  <div class="md-form">
                    <i class="fas fa-lock prefix white-text"></i>
                    <!-- <input type="password" id="orangeForm-pass" class="form-control"> -->
                    <?php echo form_input($password);?>
                    <label for="orangeForm-pass">Clave</label>
                  </div>

                  <div class="text-center">
                    <button class="btn ns-verde btn-lg">Ingresar</button>
                   
                  </div>
                  <div class="text-center">
                    <div id="infoMessage" style="color: red !important"><?php echo $message;?></div>
                  </div>

                </div>
              </div>
              <?php echo form_close();?>
              <!-- Form with header -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Intro Section -->

  </header>
  <!-- Main Navigation -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="/assets/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="/assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="/assets/js/mdb.js"></script>

  <!-- Custom scripts -->
  <script>

    // new WOW().init();

  </script>

</body>

</html>
