<form action="/soccerMatches/search" method="GET" enctype="multipart/form-data">
    
    <div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="modal" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-futbol"></i> Buscar jogos
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 form-group">
                            <div class="row ml-4">
                                <div class="col-md-4">
                                    {!! Form::label('month', 'Mês:') !!}
                                    {!! Form::select('month', [
                                    ''=>'Escolha',
                                    '1'=>'Janeiro',
                                    '2'=>'Fevereiro',
                                    '3'=>'Março',
                                    '4'=>'Abril',
                                    '5'=>'Maio',
                                    '6'=>'Junho',
                                    '7'=>'Julho',
                                    '8'=>'Agosto',
                                    '9'=>'Setembro',
                                    '10'=>'Outubro',
                                    '11'=>'Novembro',
                                    '12'=>'Dezembro',
                                    ], null, ['class' => 'form-control' ,'autocomplete' => 'chrome-off', 'required'=>'required','maxlength'=>'2']) !!}
                                </div>
                        
                                <div class="col-md-4">
                                    {!! Form::label('year', 'Ano:') !!}
                                    {!! Form::select('year', [
                                    ''=>'Escolha',
                                    '2022'=>'2022',
                                    ], null, ['class' => 'form-control' ,'autocomplete' => 'chrome-off', 'required'=>'required','maxlength'=>'4']) !!}
                                </div>

                                <div class="col-md-4" style="margin-top: 32px;">
                                    <input type="submit" class="btn btn-primary" value="Buscar"> 
                                </div> 
                            </div>
                        
                    </div>  
                </div>
             </div>
        </div>
    </div>
</form>

@section('scripts')
    <script type="text/javascript">
    </script>
@stop





