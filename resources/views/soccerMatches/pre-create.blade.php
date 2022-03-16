<form action="/soccerMatches" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="modal" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-futbol"></i> Criar jogos
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 mt-3">
                    <div class="mt-2 form-group col-md-12">
                        <div class="form-group col-md-12">
                            
                            <div class="row text-center">
                                <!-- arrayDates  -->
                                {!! Form::hidden('arrayDates', null, ['id' => 'arrayDates']) !!}
                                <!-- arrayHours  -->
                                {!! Form::hidden('arrayHours', null, ['id' => 'arrayHours']) !!}

                                <!-- date Field -->
                                <div class="form-group col-md-6">
                                    <input type="date" name="gameDate" id="gameDate" class="form-control" onblur="checkDate(this)">
                                </div>
                                
                                <!-- hour Field -->
                                <div class="form-group col-md-4">
                                    <input type="time" name="hour" id="hour" class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <button  type="button" class="btn btn-warning btn-sm btn-flat mt-1" onclick="addSchedule()"><i class="fa fa-plus-circle"></i></button>
                                </div>
                                
                            </div>

                            <table class="table table-sm table-dark">
                                <thead>
                                    <tr>
                                        <th class="d-none" scope="col">#</th>
                                        <th scope="col" style="width: 150px; text-align: center;">
                                            <i class="fas fa-calendar-alt"></i>
                                        </th>
                                        <th scope="col" style="text-align: center;">
                                            <i class="far fa-clock"></i>
                                        </th>
                                        <th scope="col" style="text-align: center;">
                                            <i class="fas fa-times"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="schedule-body"></tbody>
                            </table>

                        </div>
                    </div>  
                </div>
 
                <div class="modal-footer justify-content-center">
                    <!-- submit -->
                    <input type="submit" class="btn btn-success" value="Salvar"> 
                </div>
            </div>
        </div>
    </div>

</form>


<script type="text/javascript">

    var dataFormatada;
    var arrayDates = [];
    var arrayHours = [];
    var index = 0;

    function checkDate(obj){    
        if (arrayDates.length > 0 ){
            for (var i=0 ; i<arrayDates.length ; i++){
                // Usuário não poderá salvar jogo com a mesma data.
                if(obj.value == arrayDates[i]){
                    swal('Atenção!', 'Data de jogo existente!', 'warning');
                    obj.value = '';
                    obj.focus();
                }
                if(obj.value != ''){
                    // Usuário não poderá salvar mês ou ano diferente em um bloco.
                    if (obj.value.substring(0,7) != arrayDates[i].substring(0,7) ){
                        swal('Atenção!', 'Crie apenas jogos do mesmo mês e ano!', 'warning');
                        obj.focus();
                        obj.value = '';
                    }
                }
            }
        }
    }

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
            '   <td class="d-none">' + (parseInt(index)+1) + '</td>' +
            '   <td class="text-center">' + dateRow.toLocaleDateString('pt-BR', {timeZone: 'UTC'}) + '</td>' +
            '   <td class="text-center">' + hour + '</td>' +
            '   <td class="text-center">' +
            '       <i onclick="removeDate(\'' + index + '\')" class="fa fa-times text-danger"></i>' +
            '   </td>' +
            '</tr>'
        );
        

        arrayHours.push(hour);
        arrayDates.push(date);

        document.getElementById('arrayDates').value = arrayDates;
        document.getElementById('arrayHours').value = arrayHours;    

        index++;

        document.getElementById('gameDate').value = '';
        document.getElementById('hour').value = '';
    }

    function removeDate (index) {
        $('#date' + index).remove();
        arrayHours.splice(index, 1);
        arrayDates.splice(index, 1);

        document.getElementById('arrayHours').value = arrayHours;
        document.getElementById('arrayDates').value = arrayDates;  
    }
</script>



