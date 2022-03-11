@extends('layouts.app')

@section('title', 'Agenda')

@section('content')

@include('sweetalert::alert')

<div id="event-create-container" class="col-md-12">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row">
            <h2><i class="fas fa-calendar-alt"></i> Cadastrar agenda</h2>
        </div>
        <div>
            <button type="button" class="btn btn-link bg-warning text-dark" onclick="history.go(-1);"><span data-feather="arrow-left"></span></button>
        </div>
    </div>
    <form action="/schedules" method="POST" enctype="multipart/form-data">
        @csrf
        <hr>

        <div class="row">
            <!-- arrayDates  -->
            {!! Form::hidden('arrayDates', null, ['id' => 'arrayDates']) !!}
            <!-- arrayHours  -->
            {!! Form::hidden('arrayHours', null, ['id' => 'arrayHours']) !!}
            
            <!-- name Field -->
            <div class="form-group col-md-2">
                {!! Form::label('gameDate', 'Data:') !!}
                {!! Form::date('gameDate', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            <!-- name Field -->
            <div class="form-group col-md-2">
                {!! Form::label('hour', 'Hora:') !!}
                {!! Form::time('hour', null, ['class' => 'form-control','autocomplete' => 'chrome-off']) !!}
            </div>

            {{-- button --}}
            <div class="form-group col-md-2" style="margin-top: 35px;">
                <button type="button" class="btn btn-warning btn-sm btn-flat" onclick="addSchedule()"><i class="fa fa-plus-circle"></i></button>
            </div>

            <!-- submit -->
            <div class="form-group" style="margin-top: 35px;">
                <input type="submit" class="btn btn-success" value="Salvar"> 
            </div> 
      
        </div>
        
        <hr class="border-shedule">
        
        <div class="mt-4">
            <table class="table table-striped border w-25">
                <thead>
                <tr>
                    <th>Index</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Remover</th>
                </tr>
                </thead>
                <tbody id="schedule-body">
                   
                </tbody>
            </table>
        </div>

        <br>
    </form> 
</div>
@endsection

@section('scripts')
    <script type="text/javascript">

        // function validateData(obj){
        //     var date = obj.value;
        //     var partialDate = date.split("-");
        //     var dateSchedule = new Date(partialDate[0], partialDate[1] - 1, partialDate[2]);

        //     var today = new Date();

        //     if (dateSchedule < today){
        //         swal('Data inválida!', 'A data escolhida não pode ser menor que a data de hoje!', 'error');
        //         obj.value = '';
        //         obj.focus();
        //     }
        // }

        var dataFormatada;
        var arrayDates = [];
        var arrayHours = [];
        var index = 1;

        function addSchedule() {
            let hour = $('#hour').val();
            let date = $('#gameDate').val();
            
            if ((date == '') || (hour == '')) {
                swal('Por favor preencha os campos corretamente!', '', 'error');
            return false;
            }

            // Variable created just to show date in conventional format.
            let dateRow = new Date(date);
            
            $('#schedule-body').append(
                '<tr id="date' + index + '">' +
                '   <td>' + index + '</td>' +
                '   <td>' + dateRow.toLocaleDateString('pt-BR', {timeZone: 'UTC'}) + '</td>' +
                '   <td>' + hour + '</td>' +
                '   <td class="text-center">' +
                '   <button type="button" title="Remover Unidade" onclick="removerUnidade(\'' + index + '\')"' +
                '       class="btn btn-xs btn-danger btn-flat">' +
                '       <i class="fa fa-times"></i>' +
                '   </button>' +
                '   </td>' +
                '</tr>'
            );

            index++;
            arrayHours.push(hour);
            arrayDates.push(date);
         
            document.getElementById('arrayDates').value = arrayDates;
            document.getElementById('arrayHours').value = arrayHours;    
        }

        function removerUnidade (index) {
            $('#date' + index).remove();
        }
    </script>
@stop





