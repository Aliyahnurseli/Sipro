@extends('user/template/layout')

@section('title', 'Maintenance ')

@section('content')
<div class="container">
    <div class="row mt-4 mb-4 pt-4 pb-4">

        <div class="col-sm-4">
            <div class="judul font-weight-bold" style="display: flex">
                <i class="fas fa-phone-alt fa-2x mr-2" style="color: red; display: inline-block;"></i><h2>Maintenance</h2>
            </div>
            <div class="bg-dark mt-2 mb-2" style="height: 2px; opacity: 0.5;"></div>

            <nav class="nav flex-column">
                <a class="nav-link text-muted mb-2" data-toggle="collapse" href="#satu" role="button" aria-expanded="false" aria-controls="satu">
                    <i class="fa fa-angle-right mr-2"></i>Sistem Property
                </a>
                <div class="bg-secondary" style="height: 1px; opacity: 0.2;"></div>
                <a class="nav-link text-muted mb-2" data-toggle="collapse" href="#dua" role="button" aria-expanded="false" aria-controls="dua">
                    <i class="fa fa-angle-right mr-2"></i>Bagian Pengajuan Property
                </a>
                <div class="bg-secondary" style="height: 1px; opacity: 0.2;"></div>
            </nav>
        </div>
        <div class="col-sm-8">
            <div class="collapsed" id="satu" >
                <h4>Penjualan Property</h4>
                <div class="bg-danger mt-2 mb-2" style="height: 2px; width: 35%; opacity: 0.5;"></div>
              <!--  <img alt="PMI-Im" src="img/Logo-PMI-im.png" height="200px" width="750px" />-->
                <p class="text-danger font-weight-bold">Alamat</p>
                <p></p>
                <p class="text-danger font-weight-bold">No. Telp / HP</p>
                <p></p>
                <p class="text-danger font-weight-bold">Layanan Pelanggan</p>
                <p>info@propertyindramayu.com</p>
                <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.5122194100513!2d108.32656876094683!3d-6.326530858574866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ebbfc20a2bb4b%3A0xd80a45ef9828e8e!2sKantor%20PMI%20Kab.%20Indramayu!5e0!3m2!1sid!2sid!4v1603315709695!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="bg-dark mt-2 mb-2" style="height: 2px; width: 100%; opacity: 0.2;"></div>-->
            </div>
            <div class="collapse" id="dua" >
            
                <p class="font-weight-bold">
                    Pelayanan Penjualan Property<br>
                    Hari Senin – Jum’at<br>
                    Pukul 08.00 – 20.00<br>
                </p>
            
            </div>
        </div>
    </div> 
</div>
@endsection