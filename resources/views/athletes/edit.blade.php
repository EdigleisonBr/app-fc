@extends('layouts.app')

@section('title', 'Editando: ' . $athlete->name)

@section('content')

@include('sweetalert::alert')

<div class="col-md-12">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row">
            <h2><i class="fas fa-running"></i> {{ $athlete->name }}</h2>
            <button type="button" class="btn btn-ligth ml-2">{{ $age }} anos</button>
        </div>
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="d-flex">
                <div>
                    <a href="/athletes/index" class="btn btn-secondary btn-sm mr-1"><span data-feather="list"></span></a> 
                </div>
                <div>
                    <form action="/athletes/{{ $athlete->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><span data-feather="trash-2"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form action="/athletes/update/{{$athlete->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- <div class="row">
            <!-- image -->
            <div class="form-group border rounded p-1 col-md-6">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="form-control-input">
            </div> 
        </div> --}}
        <hr><br>
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
                {!! Form::text('name', $athlete->name, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- surname Field -->
            <div class="form-group col-md-3">
                {!! Form::label('surname', 'Apelido:') !!}
                {!! Form::text('surname', $athlete->surname, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- position Field -->
            <div class="form-group col-md-3">
                {!! Form::label('position', 'Posição:') !!}
                {!! Form::text('position', $athlete->position, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- birthName Field -->
            <div class="form-group col-md-3">
                {!! Form::label('birthName', 'Data Nascimento:') !!}
                {!! Form::date('birthName', $athlete->birthName, [
                    'class' => 'form-control text-center',
                    'min' => \Carbon\Carbon::now()->subYears(130)->format('Y-m-d'),
                    'max' => \Carbon\Carbon::now()->format('Y-m-d'),
                    ]) !!}
            </div>

            <!-- cell Field -->
            <div class="form-group col-md-3">
                {!! Form::label('cell', 'Celular:') !!}
                {!! Form::text('cell', $athlete->cell, ['class' => 'form-control celphone']) !!}
            </div>

            <!-- zipCode Field -->
            <div class="form-group col-md-3">
                {!! Form::label('zipCode', 'Cep:') !!}
                <small>
                    <a class="btn btn-link btn-xs pull-right" target="_blank"
                    href="https://buscacepinter.correios.com.br/app/endereco/index.php">
                    </a>
                </small>
                {!! Form::text('zipCode', $athlete->zipCode, ['class' => 'form-control text-right cep', 'minlength' => '9']) !!}
            </div>

             <!-- number Field -->
             <div class="form-group col-md-3">
                {!! Form::label('number', 'Número:') !!}
                {!! Form::number('number', $athlete->number, ['class' => 'form-control text-right',
                'max' => '99999', 'min' => '0', 'step'=>'1' ]) !!}
            </div>

            <!-- address Field -->
            <div class="form-group col-md-6">
                {!! Form::label('address', 'Endereço:') !!}
                {!! Form::text('address', $athlete->address, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>
 
            <!-- neighborhood Field -->
            <div class="form-group col-md-6">
                {!! Form::label('neighborhood', 'Bairro:') !!}
                {!! Form::text('neighborhood', $athlete->neighborhood, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- city Field -->
            <div class="form-group col-md-4">
                {!! Form::label('city', 'Cidade:') !!}
                {!! Form::text('city', $athlete->city, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- state Field -->
            <div class="form-group col-md-2">
                {!! Form::label('state', 'Estado:') !!}
                {!! Form::text('state', $athlete->state, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- shoeSize Field -->
            <div class="form-group col-md-2">
                {!! Form::label('shoeSize', 'Número calçado:') !!}
                {!! Form::number('shoeSize', $athlete->shoeSize, ['class' => 'form-control text-right',
                'max' => '99999', 'min' => '0', 'step'=>'1' ]) !!}
            </div>

            <!-- active Field -->
            <div class="form-group col-md-2">
                {!! Form::label('active', 'Ativo') !!}
                <div class="form-control">
                    <input type="checkbox" name="active" value=true
                    @if(old('active', $athlete->active)) checked @endif>
                </div>
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





