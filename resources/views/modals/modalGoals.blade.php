<form action="/soccerMatches/goals" method="GET" enctype="multipart/form-data">
    <div class="modal fade" id="modalGoals{{$soccerMatche->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="modal" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    @if(isset($soccerMatche->team->name))
                        <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 125px;">
                            <i class="fas fa-futbol"></i> Nonô FC x {{$soccerMatche->team->name}}<br>
                            <small><i class="fas fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($soccerMatche->matchDate))}}</small>
                        </h5>
                    @else
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fas fa-calendar-alt ml-2"></i> {{ date('d/m/Y', strtotime($soccerMatche->matchDate))}} 
                            <i class="far fa-clock ml-2"></i> {{date('H:i', strtotime($soccerMatche->hour))}}
                        </h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                
                <div class="modal-body p-0">
                    <div class="mt-2 form-group col-md-12">
                        <div class="form-group col-md-12">

                            <input type="hidden" name="soccerMatchId" id="soccerMatchId" value={{$soccerMatche->id}}>
                            
                            @php
                                $athletes = \App\Models\Athlete::where('active', 1)->orderBy('name')->get();
                            @endphp
                            
                            {{-- @php
                                $goalsAthletes = \App\Models\GoalsAthletes::where('soccerMatchId', $soccerMatche->id)->get();

                                $idsAth = '';
                                $idGoals = '';
                                $goals = '';
                                                                
                                foreach ($goalsAthletes as $item) {
                                    $idGoals = $idGoals.','.$item->id;
                                    $idsAth = $idsAth.','.$item->athleteId;
                                    $goals = $goals.','.$item->goals;
                                }
                            @endphp --}}

                            {{-- <input type="hidden" id="array_idGoals" value={{$idGoals}} name="array_idGoals">
                            <input type="hidden" id="array_idsAth" value={{$idsAth}} name="array_idsAth">
                            <input type="hidden" id="array_goals" value={{$goals}} name="numGoals"> --}}
                            
                            <div class="row mt-4">
                                {{-- Field Athlete --}}
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success"><i class="text-white fas fa-running"></i></span>
                                        </div>
                                        <select name="athlete" id="athlete" class="form-control">
                                            <option value="" selected="selected">Atleta</option> 
                                            @foreach ($athletes as $athlete)
                                                <option value="{{$athlete->id}}-{{$athlete->surname}}">{{$athlete->surname}}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                {{-- Field Goal --}}
                                <div class="form-group col-md-4">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-success"><i class="text-white fas fa-check-circle"></i></div>
                                        </div>
                                        <input type="number" name="goal" id="goal" class="form-control" placeholder="Gols" min=0>
                                    </div>
                                </div>

                                {{-- Button Function --}}
                                <div class="col-md-2">
                                    <button  type="button" class="btn btn-success btn-sm btn-flat mt-1" onclick="addGoals()"><i class="fa fa-plus-circle"></i></button>
                                </div>
                            </div>
                        
                            {{-- Tabela de gols quando existirem para que possam ser Editados --}}
                            {{-- @if (count($goalsAthletes) != 0)
                                <table class="table table-sm table-dark">
                                    <thead>
                                        <tr>
                                            <th class="d-none" scope="col">#</th>
                                            <th scope="col" style="width: 150px;">
                                                <i class="fas fa-running"></i>
                                            </th>
                                            <th scope="col">
                                                <i class="fas fa-futbol"></i>
                                            </th>
                                            <th scope="col">
                                                <i class="fas fa-times"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="goalsBody">
                                        @foreach ($goalsAthletes as $goals)
                                            <tr id="date{{$goals->id}}">
                                                <td class="d-none">{{$goals->id}}</td>
                                                <td>{{$goals->athlete->surname}}</td>
                                                <td>{{$goals->goals}}</td>
                                                <td class="text-center">
                                                    <i onclick="removeDate({{$goals->id}})" class="fas fa-times text-danger"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else --}}
                                {{-- Tabela Zerada, quando não existirem gols cadastrados na partida --}}
                                <table class="table table-sm table-dark">
                                    <thead>
                                        <tr>
                                            <th class="d-none" scope="col">#</th>
                                            <th scope="col" style="width: 150px;">
                                                <i class="fas fa-running"></i>
                                            </th>
                                            <th scope="col">
                                                <i class="fas fa-futbol"></i>
                                            </th>
                                            <th scope="col">
                                                <i class="fas fa-times"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="goalsBody"></tbody>
                                </table>
                            {{-- @endif --}}
                            <input type="hidden" id="arrayA" name="arrayA">
                            <input type="hidden" id="arrayG" name="arrayG">
                        </div>
                    </div>  
                </div>
                    
                {{-- Submit --}}
                <div class="modal-footer justify-content-center">
                    <input type="submit" class="btn btn-success" value="Salvar" > 
                </div>
            </div>
        </div>
    </div>

</form>

<script type="text/javascript">
    
    // Guarda os dados que serão deletados
    // var array_goalsId = [];
    // var array_numGoals = [];
    // var array_athId = [];
    var arrayAthletes = [];
    var arrayGoals = [];
    var index = 0;
    
    function addGoals() {
        var athlete = $('#athlete').val();
        var goals = $('#goal').val();
        var name = athlete.split('-');

        if ((athlete == '') || (goals == '')){
            swal('Por favor preencha os campos corretamente!', '', 'error');
            return false;
        }
    
        $('#goalsBody').append(
            '<tr id="date' + index + '">' +
            '   <td class="d-none">' + (parseInt(index)+1) + '</td>' +
            '   <td>' + name[1] + '</td>' +
            '   <td>' + goals + '</td>' +
            '   <td class="text-center">' +
            '       <i onclick="removeDate(\'' + index + '\')" class="fas fa-times text-danger"></i>' +
            '   </td>' +
            '</tr>'
        );

        arrayAthletes.push(name[0]);
        arrayGoals.push(goals);
        
        document.getElementById('arrayA').value = arrayAthletes;
        document.getElementById('arrayG').value = arrayGoals;
        
        index++;  
    }

    // function editGoals() {
    //     // Isso tudo vai entrar na função que pode editar os gols dos jogadores
    //     var array_idGoals = document.getElementById('array_idGoals').value;
    //     var teste = array_idGoals.replace(',', '');
    //     array_goalsId = teste.split(",");

    //     var array_goals = document.getElementById('array_goals').value;
    //     var teste1 = array_goals.replace(',', '');
    //     array_numGoals = teste1.split(",");

    //     var array_idsAth = document.getElementById('array_idsAth').value;
    //     var teste2 = array_idsAth.replace(',', '');
    //     array_athId = teste2.split(",");

    //     var athlete = $('#athlete').val();
    //     var goals = $('#goal').val();
    //     var name = athlete.split('-');

    //     if ((athlete == '') || (goals == '')){
    //         swal('Por favor preencha os campos corretamente!', '', 'error');
    //         return false;
    //     }

    //     // Verificando se atleta já está na listagem
    //     for(var i=0; i<array_athId.length ; i++){
    //         if(name[0] == array_athId[i]){
    //             var idAthlete = array_athId[i];
    //             var idGoals = array_goalsId[i];
    //             var numGoals = array_numGoals[i];
    //             var indice = i; 
    //         }
    //     }

    //     alert(
    //         'ArrayGolsID: '+array_goalsId+'\n'+
    //         'ArrayAtleta: '+array_athId+'\n'+
    //         'ArrayGols: '+array_numGoals
    //         )
            
    //     if (idAthlete > 1) {
    //         alert('entrou: '+goals);
    //         swal({
    //             title: "Atleta já existe na listagem!",
    //             text: "Deseja modificar os gols?",
    //             icon: "warning",
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 removeDate(idAthlete, idGoals, numGoals, indice);
    //                 array_numGoals[indice] = goals;
                    
    //                 swal("Pronto! Dado modificado!", {
    //                     icon: "success",
    //                 });
    //                 alert(
    //                     'ArrayGolsID: '+array_goalsId+'\n'+
    //                     'ArrayAtleta: '+array_athId+'\n'+
    //                     'ArrayGols: '+array_numGoals
    //                 )
    //             } else {
    //                 return false;
    //             }
    //         });
    //     }
  
    //     $('#goalsBody').append(
    //         '<tr id="date' + index + '">' +
    //         '   <td class="d-none">' + (parseInt(index)+1) + '</td>' +
    //         '   <td>' + name[1] + '</td>' +
    //         '   <td>' + goals + '</td>' +
    //         '   <td class="text-center">' +
    //         '       <i onclick="removeDate(\'' + index + '\')" class="fas fa-times text-danger"></i>' +
    //         '   </td>' +
    //         '</tr>'
    //     );

    //     arrayAthletes.push(name[0]);
    //     arrayGoals.push(goals);
        
    //     document.getElementById('arrayA').value = arrayAthletes;
    //     document.getElementById('arrayG').value = arrayGoals;
        
    //     index++;  

    // }

    // function removeDate (idAthlete, idGoals, numGoals, indice) {
           
    //     $('#date' + idGoals).remove();

    //     alert('antes: '+array_athId+' , '+array_numGoals);

    //     array_athId.splice(indice, 1);
    //     array_numGoals.splice(indice, 1);

    //     document.getElementById('array_idsAth').value = array_athId;
    //     document.getElementById('array_goals').value = array_numGoals;

    //     arrayAthletes.splice(index, 1);
    //     arrayGoals.splice(index, 1);

    //     document.getElementById('arrayA').value = arrayAthletes;
    //     document.getElementById('arrayG').value = arrayGoals;      
    // }

    function removeDate (index) {
        $('#date' + index).remove();
                
        arrayAthletes.splice(index, 1);
        arrayGoals.splice(index, 1);

        document.getElementById('arrayA').value = arrayAthletes;
        document.getElementById('arrayG').value = arrayGoals; 
    }

</script>



