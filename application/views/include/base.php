<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{TITTLE}</title>
  {CSS}
</head>
<body class="fixed-sn white-skin">
<!-- <body class="white-skin"> -->
    <!--Double navigation-->
    {HEADER}
    <!--/.Double navigation-->

    <!--Main Layout-->
    <main>
      <div class="container-fluid">
        {CONTENT}
      </div>


      <!-- Side Modal Top Right -->
      <div class="modal fade right" id="sideModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-side modal-top-right" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h4 class="modal-title w-100" id="myModalLabel">Informaci&oacute;n</h4> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {HELP_INFO}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Side Modal Top Right -->

    </main>
    <!--Main Layout-->
    <!-- Footer -->
    {FOOTER}
    <!-- Footer -->
    <!-- SCRIPTS -->
    {SCRIPTS}
    <!-- SCRIPTS -->
  
  <script type="text/javascript">
    // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(sideNavScrollbar);

  </script>
</body>
</html>