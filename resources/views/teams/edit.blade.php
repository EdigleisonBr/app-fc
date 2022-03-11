@extends('layouts.app')

@section('title', 'Editando: ' . $team->name)

@section('content')

@include('sweetalert::alert')

<div class="col-md-12">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row">
            <h2><i class="far fa-flag"></i> {{ $team->name }}</h2>
        </div>
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="d-flex">
                <div>
                    <a href="/teams/index" class="btn btn-secondary btn-sm mr-1"><span data-feather="list"></span></a> 
                </div>
                <div>
                    <form action="/teams/{{ $team->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><span data-feather="trash-2"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form action="/teams/update/{{$team->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- <div class="row">
            <!-- image -->
            <div class="form-group border rounded p-1 col-md-6">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="form-control-input">
            </div> 
        </div> --}}
        <hr>
        
        <br>
        
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
                {!! Form::text('name', $team->name, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>
        </div>

        <div class="row">
            <!-- surname Field -->
            <div class="form-group col-md-3">
                {!! Form::label('responsible', 'Responsável:') !!}
                {!! Form::text('responsible', $team->responsible, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>
        </div>
        
        <div class="row">
            <!-- cell Field -->
            <div class="form-group col-md-3">
                {!! Form::label('cell', 'Celular:') !!}
                {!! Form::text('cell', $team->cell, ['class' => 'form-control celphone', 'required'=>'required']) !!}
            </div>
        </div>

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





