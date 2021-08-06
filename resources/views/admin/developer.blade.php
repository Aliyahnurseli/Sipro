@extends('admin.template.layout')
@section('tittle','dashboard-admin')
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"aria-label="close">
                        <span aria-hidden= "true"></span>
                    </button>
                    <div>
                        @foreach ($errors->all() as $error)
                            {{$error}} <br>
                            @endforeach
                    </div>
                </div>
                @endif  
                <h3>Users</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Developer</h2>
                    <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Developer</button></div> 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th >No</th>
                          <th>Nama Developer</th>
                          <th>username</th>
                          <th>Password</th>
                          <th>Alamat</th>
                          <th>No_Telepon</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($developers as $developer)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$developer->nama developer}}</td>
                            <td>{{$developer->username}}</td>
                            <td>{{$developer->password}}</td>
                            <td>{{$developer->alamat}}</td>
                            <td>{{$developer->no_telepon}}</td>
                            <td>{{$developer->status}}</td>
                            <td>{{$developer->keterangan}}</td>
                            <td><img width="50 px" src="{{URL::to('/')}}/logo/{{$developer->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$developer->logo}}" ></td></td>
                            <td>
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$developer->id_developer}}" >Edit</button>
                              <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$developer->id_developer}}" >Detail</button>
                              <div style="float:right;">
                                <form form action="{{route('developer.destroy', $developer->id_developer)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                </form>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<!-- Modal tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah developer</h5>
               
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>        
            </div>
   
            <!-- body modal -->
            <div class="modal-body">
            @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
              <form action="{{route('developer.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                
      
               
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" required pattern="[0-9]{7,12}" title="Format harus berupa huruf, min 3 dan max 25">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">        
                        <input type="text" name="username" class="form-control" required pattern="[A-Za-z\s]{,255}" title="Masukkan Nama developer hanya dengan huruf">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Masukkan Password dengan huruf besar dan kecil, Min 8 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" required pattern=".{,255}" title="Alamat Max 255 Karakter">
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">No_Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_telepon" class="form-control" required pattern=".{,255}" title="Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" name="status" class="form-control" required pattern=".{,255}" title="Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Keterangan </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="keterangan" type="text" required pattern=".{,255}" title="Keterangan Max 255 Karakter"></textarea>
                    </div>
                </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah developer</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($developers as $developer)
<!-- Modal Ubah Data  -->
<div id="edit{{$developer->id_developer}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit developer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('developer.update', $developer->id_developer)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" required pattern="[0-9]{7,12}" title="Format harus berupa huruf, min 3 dan max 25" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">        
                        <input type="text" name="username" class="form-control" required pattern="[A-Za-z\s]{,255}" title="Masukkan Nama developer hanya dengan huruf" readonly>
                    </div>
                </div>

                <!-- <<div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Masukkan Password dengan huruf besar dan kecil, Min 8 Karakter">
                    </div>
                </div>-->

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" required pattern=".{,255}" title="Alamat Max 255 Karakter" readonly>
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">No_Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_telepon" class="form-control" required pattern=".{,255}" title="Max 255 Karakter" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                        <input type="status" name="status" class="form-control" required pattern=".{,255}" title="Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Keterangan </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="keterangan" type="text" required pattern=".{,255}" title="Keterangan Max 255 Karakter"></textarea>
                    </div>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach

@foreach ($developers as $developer)
<!-- Modal Ubah Data  -->
<div id="detail{{$developer->id_developer}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <img  align:center; src="{{URL::to('/')}}/logo/{{$developer->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$developer->logo}}" >
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('developer.update', $developer->id_developer)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
            <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" required pattern="[0-9]{7,12}" title="Format harus berupa huruf, min 3 dan max 25">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">        
                        <input type="text" name="username" class="form-control" required pattern="[A-Za-z\s]{,255}" title="Masukkan Nama developer hanya dengan huruf">
                    </div>
                </div>

                <!-- <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Masukkan Password dengan huruf besar dan kecil, Min 8 Karakter">
                    </div>
                </div> -->

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" required pattern=".{,255}" title="Alamat Max 255 Karakter">
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">No_Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_telepon" class="form-control" required pattern=".{,255}" title="Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                        <input type="status" name="status" class="form-control" required pattern=".{,255}" title="Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Keterangan </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="keterangan" type="text" required pattern=".{,255}" title="Keterangan Max 255 Karakter"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach

@endsection