<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-confirm-delete">
    Apagar
</button>
<!-- Modal -->
<div class="modal fade" id="modal-confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atenção !!!</h4>
            </div>
            <div class="modal-body">
               <p>Deseja realmente excluir este item.</p>
            </div>
            <div class="modal-footer">

                {{ Form::open(array('url' => $data['route'] . "/" . $siteid . '/' . $rs->id, 'method' => 'delete')) }}
                {{ Form::button('Apagar', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm','style'=>'background-color: #d9534f;border-color: #d43f3a;', 'title' => 'Apagar')) }}
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>