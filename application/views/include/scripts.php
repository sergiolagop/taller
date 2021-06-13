

<!-- JQuery -->
<script type="text/javascript" src="http://45.236.129.159/~taller/assets/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="http://45.236.129.159/~taller/assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="http://45.236.129.159/~taller/assets/js/bootstrap.min.js"></script>
<!-- JQuery Validate -->
<script type="text/javascript" src="http://45.236.129.159/~taller/assets/js/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://45.236.129.159/~taller/assets/js/jquery-validation/localization/messages_es.js"></script>

<script type="text/javascript" src="http://45.236.129.159/~taller/assets/js/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
<!-- Moment -->
<script type="text/javascript" src="http://45.236.129.159/~taller/assets/js/vendor/fullcalendar-3.10.0/fullcalendar.min.js"></script>
<script type="text/javascript" src='http://45.236.129.159/~taller/assets/js/vendor/fullcalendar-3.10.0/locale/es.js'></script>
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="http://45.236.129.159/~taller/assets/js/addons/datatables.min.js"></script>


<!--Custom scripts-->
<!-- <script type="text/javascript" src='/assets/js/zingchart.min.js'></script> -->
<!-- <script src="https://www.amcharts.com/lib/version/4.9.24/core.js"></script>
<script src="https://www.amcharts.com/lib/version/4.9.24/charts.js"></script>
<script src="https://www.amcharts.com/lib/version/4.9.24/themes/material.js"></script>
<script src="https://www.amcharts.com/lib/version/4.9.24/lang/es_ES.js"></script> -->



<!-- LIBRARIES JavaScript -->
{js_files}
	<script src="{file}" /></script>
{/js_files}

<!-- MDB core JavaScript -->
<script type="text/javascript" src="http://45.236.129.159/~taller/assets/js/mdb.js"></script>

{js_script}



<script type="text/javascript">

	function markRead(id){
		var jqxhr = $.ajax({
			  url: "/notificaciones/markAsRead/"+id,
			  beforeSend: function( xhr ) {
			  	var loading = '';	
			  }
			})
	  .done(function(data) {
	  	refresh()
	  });
	}

	function refresh(){
		var jqxhr = $.ajax({
			  url: "/notificaciones/getNotificaciones",
			  beforeSend: function( xhr ) {
			  	$("#notif_container").html("Cargando...");
			  }
			})
	  .done(function(data) {
	  	var obj = JSON.parse(data);
	  	console.log(obj.length)
	  	if(obj.length > 0){
		  	$("#notif_number").html(obj[0].notif_number)
		  	$("#notif_container").html(obj[0].notificaciones_det)
	  	}else{
	  		$("#parent_notif").hide();
	  	}
	  	
	  	
	  });
	}
</script>