@extends('layouts.app')

@section('content')
<div class="container center mt__70">
    <img src="img/logo-png.png" alt="Logo">
    <div class="clearfix"> </div>
    
    <ul class="navigacija">
        <li><a href="create" class="aktivno"><i class="far fa-file-alt"></i> Kreiraj novi dokument</a></li>
        <li><a href="drafts"><i class="far fa-save"></i> Nacrti dokumenata</a></li>
        <li><a href="history"><i class="fas fa-history"></i> Istorija</a></li>
        <li><a href="profile"><i class="far fa-user-circle"></i> Profil</a></li>
        <li><a href="logout" class="odjava" onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Odjava</a></li>
    </ul>
    
    <div class="clearfix"> </div>
    
    <form class="form-horizontal" method="POST" action="{{ route('create') }}">
        {{ csrf_field() }}
        <div class="tab" id="tab1">
            <!-- <input type="hidden" name="doc_type"/> -->
            <h2 class="mt__70">Izaberi dokument</h2>
            <select class="form-control" name="doc_type">
                <option>Irease</option>
                @foreach(\App\Func::get_rows_by_table('docs_type') as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->doc_name }}</option>
                @endforeach
            </select>
            <!-- <div class="">
                <button class=""s>
                    Izaberi
                </button>
                <div class="dropdown-content dropdown-menu" id="dropdownMenu">
                @foreach(\App\Func::get_rows_by_table('docs_type') as $key => $value)
                    <a class="dropdown-item" href="javascript: next_step(2, {{ $value->id }}, '{{ $value->doc_name }}')">{{ $value->doc_name }}</a>
                @endforeach
                </div>
            </div> -->
        </div>

        <div class="tab row" id="tab2">
            <h2 class="mt__70">Selected_document: <b>Employment Agreement</b></h2>
            <div class="col-md-6">
                <div>
                Earning And Benefits
                </div>
                <br>
                <div>
                    <p>Insert Amount of Monthly Payment</p>
                    <div class="">
                        <input type="text" class="float-left form-control col-md-6" name="ins_amount">
                        <select class="d-inline form-control col-md-5 col-md-pull-1" name="ins_currency">
                            @foreach(\App\Func::get_rows_by_table('currencies') as $key => $value)
                                <option value="{{ $value->type }}">{{ $value->cur_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div>
                    <p>increase or decrease of payment</p>
                    <div class="">
                        <input type="text" class="float-left form-control col-md-6" name="pay_rate">
                    </div>
                </div>
                <br class="clearfix">
                <div>
                    <p>Food allowance</p>
                    <div class="">
                        <input type="text" class="float-left form-control col-md-6" name="food_allow_amt">
                        <select class="d-inline form-control col-md-5 col-md-pull-1" name="food_allow_unit">
                            @foreach(\App\Func::get_rows_by_table('units') as $key => $value)
                                <option value="{{ $value->type }}">{{ $value->unit_name }}</option>
                            @endforeach
                        </select>
                        <br><input type="checkbox" class="float-left form-control com-md-1" name="food_allow_reg"><span class="small col-md-11"> Regulated by employer's cost</span>
                    </div>
                </div>
                <br>
                <div>
                    <p>Allowance for annual vacation</p>
                    <div class="">
                        <input type="text" class="float-left form-control col-md-6" name="annual_amt">
                        <select class="d-inline form-control col-md-5 col-md-pull-1" name="annual_unit">
                            @foreach(\App\Func::get_rows_by_table('units') as $key => $value)
                                <option value="{{ $value->type }}">{{ $value->unit_name }}</option>
                            @endforeach
                        </select>
                        <br><input type="checkbox" class="float-left form-control com-md-1" name="annual_reg"><span class="small col-md-11"> Regulated by employer's cost</span>
                    </div>
                </div>
                <br>
                <div>
                    <p>Date for paying</p>
                    <div class="">
                        <input type="text" class="float-left form-control col-md-6" name="date_paying">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-6">
                <div>
                    Rest and Absence
                </div>
                <br>
                <div>
                    <p>Vaccation</p>
                    <div class="">
                        <input type="text" class="float-left form-control col-md-6" name="vaccation_amt">
                        <br><input type="checkbox" class="float-left form-control com-md-1" name="vaccation_reg"><span class="small col-md-11"> Regulated by employer's cost</span>
                    </div>
                </div>
                </div>
                <div class="action" style="width:100%">
                    <button class="float-left col-md-3 btn btn-primary dugme mt__15" type="button" onclick="next_step(1)">Back</button>
                    <button class="float-right col-md-3 btn btn-primary dugme mt__15" type="button" onclick="next_step(3)">Next</button>
                </div>
        </div>

        <div class="tab" id="tab3">
        <h2 class="mt__70">Selected_document: <b>Employment Agreement</b></h2>
            <div class="note">
                <textarea class="wy5" name="content">wefwefwefwefwefwefwe</textarea>
            </div>
            <div class="action" style="width:100%">
                    <button class="float-left col-md-3 btn btn-primary dugme mt__15" type="button" onclick="next_step(2)">Back</button>
                    <button type="submit" class="float-right col-md-3 btn btn-primary dugme mt__15" type="button" >Save</button>
                </div>
        </div>
    </form>
</div>
@endsection

@section('bottom-script')
<script>
    function next_step (tab, type = null, content = null) {
        $(".tab").hide();
        if(type) {
            $("input[name=doc_type]").val(type);
            $(".tab h2 b").val(content);
        }
        $("#tab"+tab).show();
    }

    $(document).ready(function () {
        $(".dropbtn").click(function () {
            $("#"+$(this).attr("target")).show();
        });

        $("select[name=doc_type]").change(function () {
            var type = $(this).val();
            var content = $(this).text();
            next_step(2, type, content);
        })
    })
</script>
@endsection