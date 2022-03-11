<form action="/soccerMatches/update/{{$soccerMatche->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal{{$soccerMatche->id}}{{$m}}{{$y}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" id="modal" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-calendar-alt"></i> {{date('d/m/Y', strtotime($soccerMatche->matchDate))}}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="m" value="{{$m}}">
                    <input type="hidden" name="y" value="{{$y}}">
                    <div class="mt-2 form-group col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-dark"><i class="text-white fas fa-calendar-alt"></i></div>
                            </div>
                            <input type="date" name="matchDate"  class="form-control" value={{$soccerMatche->matchDate}}>
                        </div>
                    </div> 
                    <div class="mt-2 form-group col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark"><i class="text-white far fa-flag"></i></span>
                            </div>
                            <?php
                            $teams = \App\Models\Team::all();
                            ?>
                            <select name="opposingTeamId" id="opposingTeamId" class="form-control">
                                @if($soccerMatche->opposingTeamId)
                                    <option name="opposingTeamId" value={{$soccerMatche->opposingTeamId}} >{{$soccerMatche->team->name}}</option>  
                                    @foreach ($teams as $team)
                                        <option name='opposingTeamId' value={{$team->id}}>{{$team->name}}</option>  
                                    @endforeach
                                @else
                                    <option value="" selected="selected">Escolha o time</option>  
                                    @foreach ($teams as $team)
                                        <option name='opposingTeamId' value={{$team->id}}>{{$team->name}}</option>  
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>  
                    <div class="mt-2 form-group col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark"><i class="text-white fas fa-fist-raised"></i></span>
                            </div>
                            <?php
                            $referees = \App\Models\Referee::all();
                            ?>
                            <select name="refereesId" id="refereesId" class="form-control">
                                @if($soccerMatche->refereesId)
                                    <option name="refereesId" value={{$soccerMatche->refereesId}} >{{$soccerMatche->referee->name}}</option>  
                                    @foreach ($referees as $referee)
                                        <option name='refereesId' value={{$referee->id}}>{{$referee->name}}</option>  
                                    @endforeach
                                @else
                                    <option value="" selected="selected">Escolha o árbitro</option>  
                                    @foreach ($referees as $referee)
                                        <option name='refereesId' value={{$referee->id}}>{{$referee->name}}</option>  
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div> 
                    <div class="mt-2 form-group col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark"><i class="text-white fas fa-map-marker-alt"></i></span>
                            </div>
                            <?php
                            $places = \App\Models\Place::all();
                            ?>
                            <select name="placeId" class="form-control">
                                @if($soccerMatche->placeId)
                                    <option name="placeId" value={{$soccerMatche->placeId}} >{{$soccerMatche->place->name}}</option>  
                                    @foreach ($places as $place)
                                        <option name='placeId' value={{$place->id}}>{{$place->name}}</option>  
                                    @endforeach
                                @else
                                    <option value="" selected="selected">Escolha o local</option>  
                                    @foreach ($places as $place)
                                        <option name='placeId' value={{$place->id}}>{{$place->name}}</option>  
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>

@section('scripts')
    <script type="text/javascript">
       
    </script>
@stop





