<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/img/favicon.png" rel="icon">

    <title>Daftar</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
  @if($errors->any())
		<!-- <div class="alert alert-success">success</div> -->
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach  
			</ul>  
		</div> 
	@endif
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
        
          <section class="login_content">
          <form action="{{route('daftar.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
            @csrf
              <h1>DAFTAR</h1>
                <input type="text" class="form-control" name="nama" placeholder="nama" title="Masukkan nama Anda">
                <input type="text" class="form-control" name="username" placeholder="Username"  title="Masukkan Usernmae Anda">
                <input type="password" class="form-control" name="password" placeholder="Password"  title="Masukkan Password dengan huruf besar dan kecil, Min 8 Karakter">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" title="Masukkan Alamat Anda">
                
                <!-- <input type="text" class="form-control" name="enmail address" placeholder="Email Address"  title="Masukkan name Masyarakat hanya dengan huruf, Min 3 dan Max 255"> -->
                <input type="text" class="form-control" name="no_telepon" placeholder="No_telepon"  title="Masukkan No HP dengan angka, Min 11 dan Max 13">
                
                <!-- <input type="file" class="form-control" name="foto" required> -->
                <br>
                <button type="submit" class="btn btn-successt">Daftar</button>
                <p>Jika Anda sudah memiliki akun silahkan <a href="{{URL('/login')}}">login disini</a></p>
              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br>
                <div>
                  <h1>Property</h1>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>