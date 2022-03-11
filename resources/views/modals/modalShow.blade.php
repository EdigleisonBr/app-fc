<div class="modal fade" id="modalShow{{$soccerMatche->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" id="modal" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fas fa-futbol text-success"></i> Gols
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @php
                $goalsAthletes = \App\Models\GoalsAthletes::where('soccerMatchId', $soccerMatche->id)->get();
            @endphp
            <div class="modal-body">
                @if ($goalsAthletes)
                    <table class="table table-sm table-dark">
                        <thead>
                            <tr>
                                <th class="d-none" scope="col">#</th>
                                <th scope="col" style="width: 150px;">
                                    <i class="fas fa-running text-success"></i>
                                </th>
                                <th scope="col">
                                    <i class="fas fa-futbol text-success"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($goalsAthletes as $goals)
                                <tr id="date">
                                    <td class="d-none">{{$goals->id}}</td>
                                    <td>{{$goals->athlete->surname}}</td>
                                    <td>{{$goals->goals}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>


@section('scripts')
    <script type="text/javascript">
       
    </script>
@stop





