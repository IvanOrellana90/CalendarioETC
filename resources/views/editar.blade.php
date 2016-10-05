@extends('layouts.master')

@section('titleWeb')
    SistemaCDDOC
@endsection

@section('content')
    @if(Auth::user()->tipo == 'Admin')
    <div class="informacionEvento">
        <div class="table-responsive">
            <div class="contenidoMenu">
                <div class="row">
                    <div class="col-md-2">
                        @include('includes.menuEditar')
                    </div>
                    <div class="col-md-10">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="usuario" class="tab-pane fade in active">
                                @include('includes.tablasEditar.tablaUsuario')
                            </div>
                            <div id="evento" class="tab-pane fade">
                                @include('includes.tablasEditar.tablaEvento')
                            </div>
                            <div id="curso" class="tab-pane fade">
                                @include('includes.tablasEditar.tablaCurso')
                            </div>
                            <div id="campus" class="tab-pane fade">
                                @include('includes.tablasEditar.tablaCampus')
                            </div>
                            <div id="facultad" class="tab-pane fade">
                                @include('includes.tablasEditar.tablaFacultad')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endif
@endsection