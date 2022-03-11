@extends('layouts.app')

@section('title', 'Agendas')

@section('content')

@include('sweetalert::alert')

    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row ml-2">
                <h2><i class="fas fa-futbol"></i> Gols</h2>
            </div>
    </div>
    </div><hr>

    {{-- cards  --}}
    <div class="row text-center p-4 bg-light mb-3 rounded">
        <section class="text-center p-4 bg-light mb-3 rounded">
            <div class="row">
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
                                <div>
                                
                                </div>
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
                                            <td class="team-name">Nonô FC</td>
                                            <td class="scoreboard-number">{{ ($soccerMatche->golsInFavor) ? $soccerMatche->golsInFavor : '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td class="team-name">{{($soccerMatche->opposingTeamId) ? $soccerMatche->team->name : '-'}}</td>
                                            <td class="scoreboard-number">{{ ($soccerMatche->golsAgainst) ? $soccerMatche->golsAgainst : '-'}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                      
                            <div class="card-header bg-dark rounded-bottom text-white">
                                aqui
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </section>

        @include('gols.create')
        
    </div>
@endsection