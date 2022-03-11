@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row ml-2">
                <h2><i class="fas fa-futbol"></i> Inserir ou alterar dados do jogo</h2>
            </div>
        </div>
    </div><hr>

    <section class="text-center p-4 bg-light mb-3 rounded">
        <div class="row d-flex justify-content-center">
            @foreach ($soccerMatches as $soccerMatche)
                <div class="card shadow-sm sheduleCardMatcheEdit">
                    <div class="card-header bg-dark d-flex justify-content-center">
                        <h6 class="m-0 text-white">
                            <i class="fas fa-calendar-alt text-warning ml-2"></i> {{date('d/m/Y', strtotime($soccerMatche->matchDate))}} 
                        </h6>
                        <h6 class="text-white">
                            <i class="far fa-clock text-warning ml-2"></i> {{date('H:i', strtotime($soccerMatche->hour))}}
                        </h6>
                    </div>
                    @php
                    $m = 'k';
                    $y = $soccerMatche->id;
                    @endphp
                    {{-- <h1>{{$m}}-{{$y}}</h1> --}}
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
                                    <td class="scoreboard-number text-primary" style="font-weight: bolder;">{{ $goals ? $goals : '-'}}</td>
                                </tr>
                                <tr>
                                    <td class="team-name text-danger" style="font-weight: bolder;">{{($soccerMatche->opposingTeamId) ? $soccerMatche->team->name : '-'}}</td>
                                    <td class="scoreboard-number text-danger" style="font-weight: bolder;">{{ ($soccerMatche->goalsAgainst) ? $soccerMatche->goalsAgainst : '-'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header bg-dark rounded-bottom">
                        <a class="btn btn-warning btn-sm rounded-circle" href="#" data-toggle="modal" data-target="#modal{{$soccerMatche->id}}{{$m}}{{$y}}"><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger btn-sm rounded-circle" href="#" data-toggle="modal" data-target="#modalGoalsAgainst{{$soccerMatche->id}}"><i class="fas fa-futbol text-white"></i></a>
                        <a class="btn btn-success btn-sm rounded-circle" href="#" data-toggle="modal" data-target="#modalGoals{{$soccerMatche->id}}"><i class="fas fa-futbol text-white"></i></a>
                        {{-- @if($soccerMatche->goalsInFavor)
                            <a class="btn btn-warning btn-sm rounded-circle" href="#" data-toggle="modal" data-target="#modalDeleteGoals{{$soccerMatche->id}}"><i class="fas fa-futbol text-white"></i></a>
                        @endif --}}
                    </div>
                </div>
            
                @include('modals.modalEditMatche')                    
                @include('modals.modalGoals')                    
                @include('modals.modalGoalsAgainst')   
                {{-- @include('modals.modalDeleteGoals')  --}}

            @endforeach 
        </div>
    </section>
@endsection



