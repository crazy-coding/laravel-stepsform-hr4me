@extends('layouts.app')

@section('content')
<div class="container center mt__70">
    <img src="img/logo-png.png" alt="Logo">
    <div class="clearfix"> </div>
    
    <ul class="navigacija">
        <li><a href="create"><i class="far fa-file-alt"></i> Kreiraj novi dokument</a></li>
        <li><a href="drafts"><i class="far fa-save"></i> Nacrti dokumenata</a></li>
        <li><a href="history" class="aktivno"><i class="fas fa-history"></i> Istorija</a></li>
        <li><a href="profile"><i class="far fa-user-circle"></i> Profil</a></li>
        <li><a href="logout" class="odjava" onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Odjava</a></li>
    </ul>
    
    <div class="clearfix"> </div>
    
    <h2 class="mt__70">Istorija kreiranih dokumenata</h2>

    <table class="tabela">
        @foreach($docs as $key => $value)
            <tr title="{{ $value->content }}">
                <td>Naslov dokumenta</td>
                <td>{{ $value->doc_name }}</td>
                <td>{{ date("d.m.Y. / H:i", strtotime($value->date)) }}</td>
                <td class="tab-dgm ikn"><button type="button" class="btn btn-primary dugme" onclick="{{ 'window.open("'.url('topdf/'.$value->id).'");' }}"><i class="far fa-file-pdf"></i></button></td>
                <td class="tab-dgm ikn"><button type="button" class="btn btn-primary dugme" onclick="{{ 'window.open("'.url('todoc/'.$value->id).'");' }}"><i class="far fa-file-word"></i></button></td>
                <td class="tab-dgm ikn"><button type="button" class="btn btn-primary dugme" onclick="{{ 'window.open("'.url('toemail/'.$value->id).'");' }}"><i class="far fa-envelope"></i></button></td>
                <td class="tab-dgm ikn"><button type="button" class="btn btn-primary dugme" onclick="{{ 'window.open("'.url('toprint/'.$value->id).'");' }}"><i class="fas fa-print"></i></button></td>
            </tr>
        @endforeach
    </table>

</div>
@endsection