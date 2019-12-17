@extends('layouts.app')

@section('content')
<div class="container center mt__70">
    <img src="img/logo-png.png" alt="Logo">
    <div class="clearfix"> </div>
    
    <ul class="navigacija">
        <li><a href="create"><i class="far fa-file-alt"></i> Kreiraj novi dokument</a></li>
        <li><a href="drafts"><i class="far fa-save"></i> Nacrti dokumenata</a></li>
        <li><a href="history"><i class="fas fa-history"></i> Istorija</a></li>
        <li><a href="profile" class="aktivno"><i class="far fa-user-circle"></i> Profil</a></li>
        <li><a href="logout" class="odjava" onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Odjava</a></li>
    </ul>
    
    <div class="clearfix"> </div>
    
    <h2 class="mt__70">Pregled i izmena profila</h2>

    <div class="container profile">
        <div class="row justify-content-md-center">
        <div class="col-9">
                <div class="row justify-content-md-center">
                <div class="col-sm">
                    <label>Korisničko ime <span class="required">*</span></label>
                    <input type="text" placeholder="Unesite Vaš e-mail" value="mladen.radic" class="unos" disabled>
                </div>
                <div class="col-sm">
                    <label>Lozinka <span class="required">*</span></label>
                    <input type="text" placeholder="*************" value="*************" class="unos">
                </div>
                <div class="col-sm">
                    <label>E-mail <span class="required">*</span></label>
                    <input type="text" value="mladen.radic@6s.rs" class="unos">
                </div>
                </div>
                
                <div class="row justify-content-md-center">
                <div class="col-sm">
                    <label>Ime i prezime <span class="required">*</span></label>
                    <input type="text" class="unos" value="Mladen Radić">
                </div>
                <div class="col-sm">
                    <label>Kompanija</label>
                    <input type="text" value="Sixth Sense" class="unos">
                </div>
                <div class="col-sm">
                    <label>Adresa</label>
                    <input type="text" value="Veljka Dugoševića 27j" class="unos">
                </div>
                </div>
                
                <div class="row justify-content-md-center">
                <div class="col-sm">
                    <label>Telefon <span class="required">*</span></label>
                    <input type="text" value="0642222324" class="unos">
                </div>
                <div class="col-sm">
                    <label>Autentifikacioni kod <span class="required">*</span></label>
                    <input type="text" value="[c(57vV^)Y@[.6PNZpJZ%+>u_M5vB3zxJMp5Dd?.[x5-h9FH" class="unos">
                </div>
                <div class="col-sm">
    
                </div>
                </div>
        </div>
            <div class="col-3">
                    <img src="img/profile.png" class="img-fluid circle">
        </div>
        </div>
        
        <div class="row justify-content-md-center">
            <button type="button" class="btn btn-primary dugme standard-dugme">Sačuvaj</button>&nbsp;&nbsp;<button type="button" class="btn btn-primary dugme standard-dugme plavo">Odustani</button>
        </div>

        
    </div>

</div>
@endsection