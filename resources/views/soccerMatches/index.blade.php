@extends('layouts.app')
@section('title', 'Agendas')

@section('content')

    @include('sweetalert::alert')

    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row ml-2">
                <h2><i class="fas fa-futbol"></i> Jogos</h2>
            </div>
            <div>
                <a class="btn btn-success text-dark" data-toggle="modal" data-target="#modalCreate"><i class="fas fa-futbol"></i> Criar jogo</a>
                <a class="btn btn-primary text-dark" data-toggle="modal" data-target="#modalSearch"><i class="fas fa-search"></i> Buscar Jogo</a>
            </div>
        </div>
    </div><hr>

    @if (count($soccerMatches) == 0)
        <h1 class="text-center">Você ainda não possui jogos cadastrados.</h1>
    @else
        <div class="text-center">
            @for($i = 1 ; $i < 13 ; $i++)
                @foreach($soccerMatches as $soccerMatche)
                    @if (date('m', strtotime($soccerMatche->matchDate)) == $i)
                        <div class="card mb-3 mr-3" style="display: inline-block;">
                            <div class="card-header bg-dark d-flex justify-content-center">
                                <h6 class="m-0 text-white">
                                    {{ date('d/m/Y', strtotime($soccerMatche->matchDate))}} 
                                </h6>
                                <h6 class="text-white">
                                    <i class="far fa-clock text-warning ml-2"></i> {{date('H:i', strtotime($soccerMatche->hour))}}
                                </h6>
                            </div>
                            <div class="card-header p-1 bg-ligth">
                                @if($soccerMatche->placeId)
                                    <small class="m-0 font-weight-normal text-center"><i class="fas fa-map-marker-alt"></i> {{$soccerMatche->place->name}}</small><br>
                                @else
                                <small class="m-0 font-weight-normal text-center"><i class="fas fa-map-marker-alt"></i></small><br>
                                @endif
                                @if($soccerMatche->refereesId)
                                    <small class="m-0 font-weight-normal text-center"><i class="fas fa-fist-raised"></i> {{$soccerMatche->referee->surname}}</small>
                                @else   
                                    <small class="m-0 font-weight-normal text-center"><i class="fas fa-fist-raised"></i></small>
                                @endif
                            </div>
                            <div class="card-body d-flex justify-content-between p-2">
                                <table class="table table-bordered m-0 border-round">
                                    <tbody>
                                        <tr>
                                            <td class="team-name text-primary" style="font-weight: bolder; width: 130px;"><h6>Nonô FC</h6></td>
                                            @php
                                                $sum = 0;
                                                $goalsAthletes = \App\Models\GoalsAthletes::where('soccerMatchId', $soccerMatche->id)->get();
                                                foreach ($goalsAthletes as $goal){
                                                $sum += $goal->goals;
                                                }
                                            @endphp
                                            {{-- <td class="scoreboard-number text-primary" style="font-weight: bolder;">4</td> --}}
                                            <td class="scoreboard-number text-primary" style="font-weight: bolder; width: 50px;">{{ $sum ? $sum : '-'}}</td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="team-name text-danger" style="font-weight: bolder;">União</td> --}} 
                                            <td class="team-name text-danger" style="font-weight: bolder; width: 130px;"><small>{{($soccerMatche->opposingTeamId) ? $soccerMatche->team->name : '-'}}</small></td>
                                            {{-- <td class="scoreboard-number text-primary" style="font-weight: bolder;">4</td> --}}
                                            @if($sum != '-')
                                                <td class="scoreboard-number text-danger" style="font-weight: bolder; width: 50px;">{{ ($soccerMatche->goalsAgainst) ? $soccerMatche->goalsAgainst : 0}}</td>
                                            @else
                                                <td class="scoreboard-number text-danger" style="font-weight: bolder; width: 50px;">{{ ($soccerMatche->goalsAgainst) ? $soccerMatche->goalsAgainst : '-'}}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header text-center p-2 bg-ligth text-white rounded-bottom d-flex justify-content-center">
                                <button class="btn"><a href="/edit/{{$soccerMatche->id}}"style="text-decoration: none;"><i class="fas fa-edit text-warning"></i></a></button>
                                <button class="btn"><a class="btn btn-light btn-sm rounded-circle" href="#" data-toggle="modal" data-target="#modalShow{{$soccerMatche->id}}"><i class="fas fa-futbol text-success"></i></a></button>
                                <button class="btn"><a class="btn btn-light btn-sm rounded-circle" href="#" data-toggle="modal" data-target="#modalQuestionDelete{{$soccerMatche->id}}"><i class="fas fa-trash-alt text-danger"></i></a></button>
                            </div>
                        </div>
                    @endif
                    @include('modals.modalShow') 
                    @include('modals.modalQuestionDelete') 
                @endforeach
                <br>
            @endfor
        </div>
    @endif
        
    @include('soccerMatches.pre-create')  
    @include('modals.modalSearch')  
    
@endsection

@section('scripts')
    
@endsection







