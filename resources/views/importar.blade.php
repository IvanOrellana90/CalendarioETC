@extends('layouts.master')

@section('titleWeb')
    SistemaCDDOC
@endsection

@section('content')
    <div class="informacionEvento">
        <div class="table-responsive">
            @if(Session::has('success'))
                <div class="alert-box success">
                    <h2>{!! Session::get('success') !!}</h2>
                </div>
            @endif
            {!! Form::open(array('url'=>'importar/upload','method'=>'POST', 'files'=>true)) !!}
                <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
                <div class="fileUpload btn btn-default">
                    <span>Examinar</span>
                    <input id="uploadBtn" name="archivo" type="file" class="upload" />
                </div>
            {!! Form::submit('Ingresar', array('class'=>'btn btn-primary')) !!}
            {!! Form::close() !!}
            <div>
            </div>
        </div>
    </div>
    <br>
    @if(count($detalles) > 0)
        <div class="row errorow">
            <div class="col-md-12">
                <div class='row alert alert-warning'>
                    <ul>
                        @foreach($detalles as $detalle)
                            <li>{{$detalle}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endsection