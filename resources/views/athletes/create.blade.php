@extends('layouts.app')

@section('title', 'Cadastrar Atleta')

@section('content')

@include('sweetalert::alert')

<div id="event-create-container" class="col-md-12">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row">
            <h2><i class="fas fa-running"></i> Cadastrar Atleta</h2>
        </div>
        <div>
            <button type="button" class="btn btn-link bg-warning text-dark" onclick="history.go(-1);"><span data-feather="arrow-left"></span></button>
        </div>
    </div>
    <form action="/athletes" method="POST" enctype="multipart/form-data">
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

            <!-- surname Field -->
            <div class="form-group col-md-3">
                {!! Form::label('surname', 'Apelido:') !!}
                {!! Form::text('surname', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- position Field -->
            <div class="form-group col-md-3">
                {!! Form::label('position', 'Posição:') !!}
                {!! Form::text('position', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- birthName Field -->
            <div class="form-group col-md-3">
                {!! Form::label('birthName', 'Data Nascimento:') !!}
                {!! Form::date('birthName', null, [
                    'class' => 'form-control text-center',
                    'required'=>'required',
                    'min' => \Carbon\Carbon::now()->subYears(130)->format('Y-m-d'),
                    'max' => \Carbon\Carbon::now()->format('Y-m-d'),
                    ]) !!}
            </div>

            <!-- cell Field -->
            <div class="form-group col-md-3">
                {!! Form::label('cell', 'Celular:') !!}
                {!! Form::text('cell', null, ['class' => 'form-control celphone']) !!}
            </div>

            <!-- zipCode Field -->
            <div class="form-group col-md-3">
                {!! Form::label('zipCode', 'Cep:') !!}
                <small>
                    <a class="btn btn-link btn-xs pull-right" target="_blank"
                    href="https://buscacepinter.correios.com.br/app/endereco/index.php">
                    </a>
                </small>
                {!! Form::text('zipCode', null, ['class' => 'form-control text-right cep', 'minlength' => '9']) !!}
            </div>

             <!-- number Field -->
             <div class="form-group col-md-3">
                {!! Form::label('number', 'Número:') !!}
                {!! Form::number('number', null, ['class' => 'form-control text-right',
                'max' => '99999', 'min' => '0', 'step'=>'1' ]) !!}
            </div>

            <!-- address Field -->
            <div class="form-group col-md-6">
                {!! Form::label('address', 'Endereço:') !!}
                {!! Form::text('address', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>
 
            <!-- neighborhood Field -->
            <div class="form-group col-md-6">
                {!! Form::label('neighborhood', 'Bairro:') !!}
                {!! Form::text('neighborhood', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- city Field -->
            <div class="form-group col-md-4">
                {!! Form::label('city', 'Cidade:') !!}
                {!! Form::text('city', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- state Field -->
            <div class="form-group col-md-2">
                {!! Form::label('state', 'Estado:') !!}
                {!! Form::text('state', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- shoeSize Field -->
            <div class="form-group col-md-2">
                {!! Form::label('shoeSize', 'Número calçado:') !!}
                {!! Form::number('shoeSize', null, ['class' => 'form-control text-right',
                'max' => '99999', 'min' => '0', 'step'=>'1' ]) !!}
            </div>

            <!-- active Field -->
            <div class="form-group col-md-2">
                {!! Form::label('active', 'Ativo') !!}
                <div class="form-control">
                    {!! Form::checkbox('active', true) !!}
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





