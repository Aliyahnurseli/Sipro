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
                    <h2>Data konsumen</h2>
                    <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah konsumen</button></div> 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Alamat</th>
                          <th>No Telepon</th>
                          <th width="18.5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($konsumens as $konsumen)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$konsumen->nama}}</td>
                            <td>{{$konsumen->alamat}}</td>
                            <td>{{$konsumen->no_hp}}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$konsumen->nama}}" " >Edit</button>
                                <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#" >Detail</button>
                                <div style="float:right;">
                                <form action="{{route('konsumen.destroy', $konsumen->nama)}}" method="POST">
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
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah konsumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
              <form action="{{route('konsumen.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" required pattern="[0-9]{16}" title="Masukkan nama dengan angka dan 16 karakter">
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">        
                        <input type="text" name="username" class="form-control" required pattern="[A-Za-z\s]{3,255}" title="Masukkan Nama konsumen hanya dengan huruf, Min 3 dan Max 255">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Masukkan Password dengan huruf besar dan kecil, Min 8 Karakter">
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">        
                        <input type="text" name="alamat" class="form-control" required pattern="[A-Za-z\s]{3,255}" title="Masukkan Alamat dengan huruf, Min 3 dan Max 255">
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">No_Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_telepon" class="form-control" required pattern="[0-9]{11,13}" title="Masukkan No HP dengan angka, Min 11 dan Max 13">
                    </div>
                </div>
                
               
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah konsumen</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($konsumens as $konsumen)
<!-- Modal Ubah Data  -->
<div id="edit{{$konsumen->nama}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit konsumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('konsumen.update', $konsumen->nama)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">        
                        <input type="text" name="alamat" class="form-control" required pattern="[A-Za-z\s]{3,255}" title="Masukkan Alamat dengan huruf, Min 3 dan Max 255">
                    </div>
                </div>
                
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Edit konsumen</button>
                </div>   
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
@endsection