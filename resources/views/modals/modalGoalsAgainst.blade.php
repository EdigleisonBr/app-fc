<form action="/goalsAgainst" method="GET" enctype="multipart/form-data">
    <div class="modal fade lg" id="modalGoalsAgainst{{$soccerMatche->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" id="modal" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    @if(isset($soccerMatche->team->name))
                        <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 38px;">
                            <small><i class="fas fa-futbol"></i> Nonô FC x {{$soccerMatche->team->name}}</small><br>
                            <small><i class="fas fa-calendar-alt"></i> {{ date('d/m/Y', strtotime($soccerMatche->matchDate))}}</small>
                        </h5>
                    @else
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fas fa-calendar-alt ml-2"></i> {{ date('d/m/Y', strtotime($soccerMatche->matchDate))}} 
                            <i class="far fa-clock ml-2"></i> {{date('H:i', strtotime($soccerMatche->hour))}}
                        </h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body p-0">
                    <div class="mt-2 form-group col-md-12">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="soccerMatchId" value={{$soccerMatche->id}}>
                            <br>
                        
                            <div class="form-group col-md-12">
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-danger"><i class="text-white fas fa-times-circle"></i></div>
                                    </div>
                                    @if (isset($soccerMatche->goalsAgainst))
                                        <input type="number" name="goalsAgainst" class="form-control" value={{$soccerMatche->goalsAgainst}} placeholder="Gols contra">
                                    @else
                                        <input type="number" name="goalsAgainst" class="form-control" placeholder="Gols contra" min=0>
                                    @endif
                                </div>
                            </div> 
                           
                        </div>
                    </div>  
                </div>
                                    
                <div class="modal-footer justify-content-center">
                    <!-- submit -->
                    <input type="submit" class="btn btn-success" value="Salvar" > 
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
   
</script>



