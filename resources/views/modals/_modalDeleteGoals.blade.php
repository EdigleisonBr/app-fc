<form action="/goals/delete" method="GET" enctype="multipart/form-data">
    <div class="modal fade" id="modalDeleteGoals{{$soccerMatche->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <br>
                        
                    @php
                        $athletes = \App\Models\Athlete::all();
                    @endphp

                    @php
                        $goals = \App\Models\GoalsAthletes::where('soccerMatchId', $soccerMatche->id)->get();
                    @endphp

                    <div class="row">
                   
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
                                @foreach ($goals as $goal)
                                    <tr id="date{{$goal->id}}">
                                        <td class="d-none">{{$goal->id+1}}</td>
                                        <td>{{$goal->athlete->surname}}</td>
                                        <td>{{$goal->goals}}</td>
                                        <td class="text-center">
                                            <i onclick="removeDate({{$goal->id}})" class="fas fa-times text-danger"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{-- 
                        <div class="col-md-2">
                            <button  type="button" class="btn btn-warning btn-sm btn-flat mt-1" onclick="addGoals()"><i class="fa fa-plus-circle"></i></button>
                        </div> --}}

                        <input type="hidden" id="arrayGoalsDelete" name="arrayGoalsDelete">
                    </div>
                
                </div>
                    
                <!-- submit -->
                <div class="modal-footer justify-content-center">
                    <input type="submit" class="btn btn-success" value="Salvar" > 
                </div>
            </div>
        </div>
    </div>

</form>

<script type="text/javascript">
    
    var arrayGoalsDelete = [];
    
    var index = 0;

    function removeDate (index) {
        $('#date' + index).remove();
        alert(index);
        arrayGoalsDelete.push(index);
        document.getElementById('arrayGoalsDelete').value = arrayGoalsDelete;
        alert(arrayGoalsDelete);
    }
</script>



