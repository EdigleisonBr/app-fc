@extends('layouts.app')

@section('title', 'Agendas')



@section('content')
@include('sweetalert::alert')

    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row ml-2">
                <h2><i class="fas fa-calendar-alt"></i> Agendas</h2>
            </div>
            <div>
                <a href="/schedules/create" class="text-white"><button class="btn btn-success"><i class="fas fa-plus-square"></i> Cadastrar</button></a>
            </div>
        </div>
    </div><hr>

    <form action="/schedules/index" method="GET" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-2">
                {!! Form::label('month', 'Informe o mês:') !!}
                {!! Form::select('month', [
                ''=>'Escolha',
                '1'=>'Janeiro',
                '2'=>'Fevereiro',
                '3'=>'Março',
                '4'=>'Abril',
                '5'=>'Maio',
                '6'=>'Junho',
                '7'=>'Julho',
                '8'=>'Agosto',
                '9'=>'Setembro',
                '10'=>'Outubro',
                '11'=>'Novembro',
                '12'=>'Dezembro',
                ], null, ['class' => 'form-control' ,'autocomplete' => 'chrome-off', 'required'=>'required','maxlength'=>'2']) !!}
            </div>

            <div class="col-md-2">
                {!! Form::label('year', 'Informe o ano:') !!}
                {!! Form::select('year', [
                ''=>'Escolha',
                '2022'=>'2022',
                '2023'=>'2023',
                '2024'=>'2024',
                '2025'=>'2025',
                '2026'=>'2026',
                '2027'=>'2027',
                '2028'=>'2028',
                '2029'=>'2029',
                '2030'=>'2030',
                ], null, ['class' => 'form-control' ,'autocomplete' => 'chrome-off', 'required'=>'required','maxlength'=>'4']) !!}
            </div>
             
            <div class="col-md-2" style="margin-top: 30px;">
                <!-- submit -->
                <div>
                    <input type="submit" class="btn btn-primary" value="Buscar"> 
                </div> 
            </div>
        </div><br>
    </form> 
  
@endsection


@section('scripts')
    <script type="text/javascript">
    </script>
@stop





