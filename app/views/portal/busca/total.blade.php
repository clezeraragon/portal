@if($totalBusca)
    <div class="tab-pane active"
         id="total">

        @include('portal.busca.conteudo')
        @include('portal.busca.produto')
        @include('portal.busca.guiaEmpresa')

    </div>
@endif