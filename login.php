<?php 
if($_COOKIE['loggedin'] == true){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smanitra Election | Log In</title>
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
<div class="login-box">
  <div class="login-logo">
<b>Smanitra</b> Election
  </div>
  <div id="warning-alert">

	</div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  
    <p class="login-box-msg">Masukkan Kode</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Kode" name="strCode" id="strCode">
        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="btn-login" id="btn-login" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
    <strong>Copyright &copy; 2017 <a href="https://instagram.com/junhoch">Junho Choi</a></strong>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 2.2.0 -->
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<!-- Bootstrap 3.3.6 -->
<!-- iCheck -->
<script>
  $('#btn-login').click(function(event){
	  event.preventDefault();
	  
	  $('#warning-alert').hide();
	  
	  var unm = $('#strCode').val();
	  $.ajax({
		  type: "POST", 
		  url: "loginprocess.php",
		  data: "strCode="+unm,
		  success: function (html){
			  if(html == 'true'){
				  window.location="index.php"
			  } else if(html == 'false') {
				  $('#warning-alert').html('<div id="wrong-alert" class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Kode anda salah!</h4>masukkan kode yang benar.</div>');
				  $('#warning-alert').show("normal");
			  }else if(html == 'voted') {
				  $('#warning-alert').html('<div id="wrong-alert" class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Anda sudah memilih!</h4>anda hanya dapat memilih satu kali.</div>');
				  $('#warning-alert').show("normal");
			  }else if(html == 'loggedin') {
				  $('#warning-alert').html('<div id="wrong-alert" class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Anda sudah masuk!</h4>dilarang masuk di lebih dari 1 tempat.</div>');
				  $('#warning-alert').show("normal");
			  }
		  }
	  });
  });
</script>
</body>
</html>
