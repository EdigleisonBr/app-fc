
    <div class="modal fade" tabindex="-1" id="modalQuestionDelete{{$soccerMatche->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Atenção</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Se você excluir este jogo todos os dados serão excluidos!</p>
                    <h1 class="text-danger">Tem certeza disso?</h1>
                </div>
                <div class="modal-footer">
                    <form action="/soccerMatches/delete/{{$soccerMatche->id}}" method="DELETE" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-danger">Sim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
