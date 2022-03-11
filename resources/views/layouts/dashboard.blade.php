@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="shedule-title bg-light border rounded">
        <h2><i class="fas fa-futbol"></i> Jogos {{( count($soccerMatches) == 0) ? ' ' : ' - ' . $month }}</h2>
    </div>

    {{-- <div class="shedule-title">
        <h2><i class="fas fa-calendar-alt"></i> Agenda - {{ $month }}</h2>
    </div> --}}

    @if (count($soccerMatches) == 0 )
        <section class="jumbotron bg-light border border-1">
            <h2 class="text-center font-weigth-bold">Ainda <span class="text-danger">não</span> tem agenda de jogos para o mês atual.
                <br>
                <small>
                    <a class="btn btn-primary text-white fw-bold" href="/soccerMatches/index">Buscar ou criar jogos</a>
                </small>
            </h2>
        </section>
        <hr><br>
    @else
        {{-- cards  --}}
        <section class="text-center p-4 bg-light mb-3 rounded">
            <div class="row justify-content-center">
                @foreach ($soccerMatches as $soccerMatche)
                    <div class="justify-content-between ml-2">
                        <div class="card shadow-sm shedule-card2">
                            <div class="card-header bg-dark d-flex justify-content-center">
                                <h6 class="m-0 text-white">
                                    {{ date('d/m/Y', strtotime($soccerMatche->matchDate))}} 
                                </h6>
                                <h6 class="text-white">
                                    <i class="far fa-clock text-warning ml-2"></i> {{date('H:i', strtotime($soccerMatche->hour))}}
                                </h6>
                            </div>
                            <div class="card-header">
                                @if($soccerMatche->placeId)
                                    <small class="m-0 font-weight-normal text-center"><i class="fas fa-map-marker-alt"></i> {{$soccerMatche->place->name}}</small><br>
                                @else
                                <small class="m-0 font-weight-normal text-center">-</small><br>
                                @endif
                                @if($soccerMatche->refereesId)
                                    <small class="m-0 font-weight-normal text-center"><i class="fas fa-fist-raised"></i> {{$soccerMatche->referee->surname}}</small>
                                @else   
                                    <small class="m-0 font-weight-normal text-center">-</small>
                                @endif
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered m-0 border-round">
                                    <tbody>
                                        <tr>
                                            <td class="team-name text-primary" style="font-weight: bolder;">Nonô FC</td>
                                            @php
                                                $sum = 0;
                                                $goalsAthletes = \App\Models\GoalsAthletes::where('soccerMatchId', $soccerMatche->id)->get();
                                                foreach ($goalsAthletes as $goal){
                                                $sum += $goal->goals;
                                            }
                                            @endphp
                                            <td class="scoreboard-number text-primary" style="font-weight: bolder;">{{ $sum ? $sum : '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td class="team-name text-danger" style="font-weight: bolder;"><small>{{($soccerMatche->opposingTeamId) ? $soccerMatche->team->name : '-'}}</small></td>
                                            <td class="scoreboard-number text-danger" style="font-weight: bolder;">{{ ($soccerMatche->goalsAgainst) ? $soccerMatche->goalsAgainst : '-'}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header bg-dark rounded-bottom">
                                <a class="btn btn-light btn-sm rounded-circle" href="#" data-toggle="modal" data-target="#modalShow{{$soccerMatche->id}}"><i class="fas fa-futbol text-success"></i></a>
                            </div>
                        </div>
                    </div>
                    @include('modals.modalShow')                    
                @endforeach 
            </div>
        </section>
    @endif
    <div class="row">
        <div class="col-md-4">
            <section class="jumbotron bg-light text-center p-3 mb-2">
                <div class="container">
                    <h2><i class="fas fa-running"></i> Artilharia</h2>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Atleta</th>
                            <th scope="col">Gols</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($gunner as $g)
                                @if($loop->index < 5)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$g->athlete->surname}}</td>
                                    <td>{{$g->goal}}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="col-md-4">
            <section class="jumbotron bg-light text-center p-3 mb-2">
                <div class="container">
                    <h2><i class="fas fa-futbol"></i> Saldo de gols</h2>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="bg-success rounded col-md-5 mr-3">
                            <div class="text-white p-2">
                                <h1><i class="fas fa-check-circle"></i></h1>
                                <h1>{{$goalsInFavor}}</h1>
                            </div>
                        </div>
                        <div class="bg-danger rounded col-md-5">
                            <div class="text-white p-2">
                                <h1><i class="fas fa-times-circle"></i></h1>
                                <h1>{{$goalsAgainst}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="jumbotron text-center bg-light p-3">
                <div class="container">
                    @if($countMatches)
                        <h1 class="bg-dark text-white p-2 border rounded">{{$countMatches}} jogos</h1> 
                    @else
                        <h1 class="bg-dark text-white p-2 border rounded"> - </h1> 
                    @endif
                </div>
            </section>
        </div>
        <div class="col-md-4">
            <section class="jumbotron bg-light text-center p-3 mb-2">
                <div class="container">
                    <h2><i class="fas fa-birthday-cake"></i> Aniversáriantes</h2>
                    <hr>
                    @if(count($athletes) > 0)
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Atleta</th>
                            <th scope="col">Data</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($athletes as $athlete)
                                <tr>
                                    <td>{{$athlete->surname}}</td>
                                    <td>{{ date('d/m/Y', strtotime($athlete->birthName))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <h6>Nenhum aniversário neste mês.</h6>
                    @endif
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        // função não está sendo usada mais serve como referência
        function addDataMatch(obj){
            $.ajax({
                url: '/soccerMatches/addDataMatch/' + obj.value,
            }).done(function (retorno) {
                modal = '';
                if(retorno.matche){
                    date = new Date(retorno.matche.matchDate);         
                    formattedDate = date.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
                    modal = '';
                    modal =
                    '<div class="modal-content">' +
                        '<div class="modal-header">' +
                            '<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-futbol"></i> ' + formattedDate + '</h5>' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                        '</div>' +
                        '<form action="/soccerMatches/update/'+ obj.value +'" method="POST" enctype="multipart/form-data">' +
                            '@csrf' +
                            '@method("PUT")' +
                            '<div class="modal-body">' +
                                '<div class="form-group col-md-12">' +
                                    '<i class="far fa-flag"></i> ' +
                                    '<label name="opposingTeamId"> Time</label>' +
                                    '<div class="input-group">' +
                                        '<div class="input-group-prepend">' +
                                            '<span class="input-group-text bg-primary" onclick="teamsList()"><i class="fa fa-search text-white"></i></span>' +
                                        '</div>' +
                                        '<select name="opposingTeamId" class="form-control" id="teamsList">' +
                                            '<option value="" selected="selected">Escolha</option>' +    
                                        '</select>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="form-group col-md-12">' +
                                    '<i class="fas fa-fist-raised"></i> ' +
                                    '<label name="refereesId"> Árbitro</label>' +
                                    '<div class="input-group">' +
                                        '<div class="input-group-prepend">' +
                                            '<span class="input-group-text bg-primary" onclick="refereesList()"><i class="fa fa-search text-white"></i></span>' +
                                        '</div>' +
                                        '<select name="refereesId" class="form-control" id="refereesList">' +
                                            '<option value="" selected="selected">Escolha</option>' +    
                                        '</select>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="form-group col-md-12">' +
                                    '<i class="fas fa-map-marker-alt"></i> ' +
                                    '<label name="placeId"> Local</label>' +
                                    '<div class="input-group">' +
                                        '<div class="input-group-prepend">' +
                                            '<span class="input-group-text bg-primary" onclick="placesList()"><i class="fa fa-search text-white"></i></span>' +
                                        '</div>' +
                                        '<select name="placeId" class="form-control" id="placesList">' +
                                            '<option value="" selected="selected">Escolha</option>' +    
                                        '</select>' +
                                    '</div>' +
                                '</div>' +
                                '<select class="js-example-basic-single form-control" name="state">'+
                                '<option value="AL">Alabama</option>'+
                                '<option value="WY">Wyoming</option>'+
                                '</select>'+
                            '</div>' +
                            '<div class="modal-footer justify-content-center">' +
                                '<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>' +
                                '<button type="submit" class="btn btn-primary">Salvar</button>' +
                            '</div>' +
                        '</form>' +
                    '</div>';
                }
                $('#modal').html(modal);
            }).fail(function (retorno) {
                // swal("Nome já inserido no banco de dados", retorno.responseJSON, "error");
                
            });
        }
    </script>
@stop
