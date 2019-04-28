<?php 
if(!isset($_COOKIE['loggedin'])){
header('Location: login.php');	
}
$data = json_decode($_COOKIE['dataSiswa'], true);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smanitra Election</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="css/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="login-page">
<section class="content">
<div class="row">
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Pilihan 1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<img src="images/1.jpg" class="img-responsive" alt="Cinque Terre">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		
		        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Pilihan 2</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<img src="images/2.jpg" class="img-responsive" alt="Cinque Terre">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Pilihan 3</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<img src="images/3.jpg" class="img-responsive" alt="Cinque Terre">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
	        <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i> Selamat datang <?php echo $data['Nama'];?></h3>
        </div>
        <div class="box-body">
Pilihlah 1 diantara 3 kandidat diatas.
<br>
<input type="radio" name="rbnNumber" value="1" /> Pilihan 1<br/>
<input type="radio" name="rbnNumber" value="2" /> Pilihan 2<br/>
<input type="radio" name="rbnNumber" value="3" /> Pilihan 3<br/>
<br/>
<input class="btn btn-primary btn-flat" type="button" id="btnGetValue" Value="Pilih" />
<p></p>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
	  </section>

<!-- /.login-box -->
<!-- jQuery 2.2.0 -->
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<!-- Bootstrap 3.3.6 -->
<!-- iCheck -->
<script>
  
  $('#btnGetValue').click(function(event){
	  event.preventDefault();
	  
	  $('#btnGetValue').prop('disabled', true);
	  
	  
	  var selValue = $('input[name=rbnNumber]:checked').val(); 
	  $.ajax({
		  type: "POST", 
		  url: "input.php",
		  data: "id="+selValue,
		  success: function (html){
			  if(html == 'true'){
				  window.location="login.php"
			  } else if(html == 'false') {
				  alert('Selamat anda golput!');
			  }
		  }
	  });
  });
</script>
</body>
</html>
