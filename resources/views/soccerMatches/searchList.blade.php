@extends('layouts.app')
@section('title', 'Jogos')

@section('content')

@include('sweetalert::alert')

    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row ml-2">
                <h2><i class="fas fa-futbol"></i> Jogos</h2>
            </div>
            <div>
                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modalCreate"><i class="fas fa-plus-square"></i></a>
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalSearch"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </div><hr>

    @include('soccerMatches.pre-create')  
    @include('modals.modalSearch') 

    <div class="row">
        <div class="col-md-4">
            <h2>{{$date}}</h2>
        </div>
    </div><br>
 
    @if(isset($soccerMatches))
        <section class="text-center p-4 bg-light mb-3 rounded">
            <div class="row justify-content-center">
                @foreach ($soccerMatches as $soccerMatche)
                    <div class="justify-content-between ml-2">
                        <div class="card shadow-sm shedule-card2">
                            <input type="hidden" name="m" value="{{$m}}">
                            <input type="hidden" name="y" value="{{$y}}">
                            <div class="card-header bg-dark d-flex justify-content-between">
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
                                            <td class="team-name text-primary " style="font-weight: bolder;">Nonô FC</td>
                                            @php
                                                $sum = 0;
                                                $goalsAthletes = \App\Models\GoalsAthletes::where('soccerMatchId', $soccerMatche->id)->get();
                                                foreach ($goalsAthletes as $goal){
                                                    $sum += $goal->goals;
                                                }
                                            @endphp
                                        <td class="scoreboard-number text-primary "style="font-weight: bolder;">{{ $sum ? $sum : '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td class="team-name text-danger" style="font-weight: bolder;"><small>{{($soccerMatche->opposingTeamId) ? $soccerMatche->team->name : '-'}}</small></td>
                                            <td class="scoreboard-number text-danger" style="font-weight: bolder;">{{ ($soccerMatche->goalsAgainst) ? $soccerMatche->goalsAgainst : '-'}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header bg-dark d-flexbg-dark rounded-bottom">
                                <a class="btn btn-warning btn-sm rounded-circle" href="/edit/{{$soccerMatche->id}}"><i class="fas fa-pen"></i></a>
                            </div>
                        </div>
                    </div>
                    @include('modals.modalEditMatche')                    
                @endforeach 
            </div>
        </section>
    @endif
@endsection





