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
                <a href="/schedules/search" class="text-white"><button class="btn btn-info"><i class="fas fa-search"></i> Buscar agenda</button></a>
            </div>
        </div>
    </div><hr>

    <div class="row">
        <div class="col-md-4">
            <h2>{{$date}}</h2>
        </div>
    </div><br>

           
    @if ($scheduleDates)
        
        <section class="text-center p-4 bg-light mb-3 rounded">
            <div class="row justify-content-center">
                @foreach ($scheduleDates as $schedule)
                <h1>{{$schedule->soccerMatchId}}</h1>
                    <div class="justify-content-between ml-2">
                        <div class="card shadow-sm shedule-card">
                            <div class="card-header bg-dark d-flex justify-content-between">
                                <h6 class="m-0 text-white">
                                    {{ date('d/m/Y', strtotime($schedule->gameDate))}} 
                                </h6>
                                <h6 class="text-white">
                                    <i class="far fa-clock text-warning ml-2"></i> {{date('H:i', strtotime($schedule->hour))}}
                                </h6>
                            </div>
                            <div class="card-header">
                                <h4 class="m-0 font-weight-normal text-center">{{($schedule->soccerMatchId) ? 'Local do Jogo' : '-'}}</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered m-0 border-round">
                                    <tbody>
                                        <tr>
                                            <td class="team-name">{{($schedule->soccerMatchId) ? 'Nonô FC' : '-'}}</td>
                                            <td class="scoreboard-number">{{ ($schedule->soccerMatchId) ? 'XX' : '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td class="team-name">{{($schedule->soccerMatchId) ? 'Adversário' : '-'}}</td>
                                            <td class="scoreboard-number">{{ ($schedule->soccerMatchId) ? 'XX' : '-'}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header bg-dark d-flex justify-content-between bg-dark rounded-bottom">
                                <a href=""><h6 class="m-0 text-success"><i class="far fa-plus-square"></i></h6></a>
                                <a href=""><h6 class="m-0 text-white"><i class="far fa-eye"></i></h6></a>
                                <a href=""><h6 class="m-0 text-warning"><i class="far fa-edit"></i></h6></a>
                                <a href=""><h6 class="m-0 text-danger"><i class="far fa-trash-alt"></i></h6></a>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </section>
    @endif
@endsection






