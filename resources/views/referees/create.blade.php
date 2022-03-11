@extends('layouts.app')

@section('title', 'Árbitro')

@section('content')

@include('sweetalert::alert')

<div id="event-create-container" class="col-md-12">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row">
            <h2><i class="fas fa-fist-raised"></i> Cadastrar árbitro</h2>
        </div>
        <div>
            <button type="button" class="btn btn-link bg-warning text-dark" onclick="history.go(-1);"><span data-feather="arrow-left"></span></button>
        </div>
    </div>
    <form action="/referees" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- <div class="row">
            <!-- image -->
            <div class="form-group border rounded p-1 col-md-6">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="form-control-input">
            </div> 
        </div> --}}
        <hr>

        <div class="row">
            <!-- errors -->
            {{-- @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
           
            <!-- name Field -->
            <div class="form-group col-md-6">
                {!! Form::label('name', 'Nome:') !!}
                {!! Form::text('name', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>
        </div>

        <div class="row">
            <!-- surname Field -->
            <div class="form-group col-md-3">
                {!! Form::label('surname', 'Apelido:') !!}
                {!! Form::text('surname', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>
        </div>

        <div class="row">
            <!-- cell Field -->
            <div class="form-group col-md-3">
                {!! Form::label('cell', 'Celular:') !!}
                {!! Form::text('cell', null, ['class' => 'form-control celphone', 'required'=>'required']) !!}
            </div>
        </div>
        
        <br>

        <!-- submit -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Salvar"> 
        </div> 
    </form> 
</div>
@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
@stop





