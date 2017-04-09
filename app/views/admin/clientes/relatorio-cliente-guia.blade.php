{{-- Page title --}}
@section('title')
    {{$data['title']}}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/select2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')

    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <br>

                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box primary">
                    <div class="portlet-title">
                        <div class="caption">
                            {{$data['titles']}}
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>Nome Fantasia</th>
                                <th>Razão Social</th>
                                <th>CNPJ</th>
                                <th>CPF</th>
                                <th>Responsável Anúncio</th>
                                <th>E-mail Responsável (anúncio)</th>
                                <th>E-mail Administrativo</th>
                                <th>CEP</th>
                                <th>Endereço</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>Telefone (1)</th>
                                <th>Telefone (2)</th>
                                <th>Início do Contrato</th>
                                <th>Término do Contrato</th>
                                <th>Período</th>
                                <th>Mapa</th>
                                <th>Site</th>
                                <th>Facebook</th>
                                <th>Instagram</th>
                                <th>Twitter</th>
                                <th>Logo</th>
                                <th>Observação</th>
                                <th>Status</th>
                                <th>Criação Cadastro</th>
                                <th>Número do anúncio</th>
                                <th>Cidade</th>
                                <th>Categoria</th>
                                <th>Negociação</th>
                                <th>Plano</th>
                                <th>URL</th>
                                <th>Quantidade de Fotos</th>
                                <th>Quantidade de Vídeos</th>
                                <th>Início da Veiculação</th>
                                <th>Término da Veiculação</th>
                                <th>Texto Resumo</th>
                                <th>Texto Descrição</th>
                                <th>Opcionais e Observações</th>
                                <th>Status</th>
                                <th>Última alteração do anúncio</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $num = null; $cli = null;?>

                            @foreach ($result as $rs)

                                <?php
                                    if($rs->id != $cli){
                                        $num = null;
                                        $cli = $rs->id;
                                    }
                                    if(isset($rs->guia_empresa_id)){
                                        $num += 1;
                                    }
                                ?>
                                <tr>
                                    <td>{{ ($rs->nm_nome_fantasia) }}</td>
                                    <td>{{ ($rs->nm_razao_social) }}</td>
                                    <td>{{ ($rs->nm_cnpj) }}</td>
                                    <td>{{ ($rs->nm_cpf) }}</td>
                                    <td>{{ ($rs->nm_responsavel) }}</td>
                                    <td>{{ ($rs->nm_email_responsavel) }}</td>
                                    <td>{{ ($rs->nm_email_administrativo) }}</td>
                                    <td>{{ ($rs->nm_cep) }}</td>
                                    <td>{{ ($rs->nm_endereco) }}</td>
                                    <td>{{ ($rs->nu_numero) }}</td>
                                    <td>{{ ($rs->nm_complemento) }}</td>
                                    <td>{{ ($rs->nm_bairro) }}</td>
                                    <td>{{ ($rs->nm_cidade) }}</td>
                                    <td>{{ ($rs->nm_uf) }}</td>
                                    <td>{{ ($rs->nm_telefone1) }}</td>
                                    <td>{{ ($rs->nm_telefone2) }}</td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td>{{ Util::formatBoolean($rs->st_google_maps) }}</td>
                                    <td>{{ ($rs->nm_site) }}</td>
                                    <td>{{ ($rs->nm_link_facebook) }}</td>
                                    <td>{{ ($rs->nm_link_instagram) }}</td>
                                    <td>{{ ($rs->nm_link_twitter) }}</td>
                                    <td>{{ ($rs->path_img) ? "Sim" : "Não" }}</td>
                                    <td>{{ ($rs->txt_descricao) }}</td>
                                    <td>{{ Util::formatStatus($rs->status) }}</td>
                                    <td>{{ Util::toTimestamps($rs->created_at) }}</td>
                                    <td> {{$num}} </td>
                                    <td>{{ ($rs->cidade) }}</td>
                                    <td>{{ ($rs->categoria) }}</td>
                                    <td>{{ ($rs->tipo_negociacao) }}</td>
                                    <td>{{ ($rs->plano) }}</td>
                                    <td>{{ ($rs->url_anuncio) }}</td>
                                    <td>
                                        <?php $qtd_fotos = 0; $qtd_fotos = \GuiaEmpresa::getTotalFotosByAnuncioId($rs->guia_empresa_id); ?>
                                        {{($qtd_fotos) ? $qtd_fotos : ''}}
                                    </td>
                                    <td>
                                        <?php $qtd_videos = 0; $qtd_videos = \GuiaEmpresa::getTotalVideosByAnuncioId($rs->guia_empresa_id); ?>
                                            {{($qtd_videos) ? $qtd_videos : ''}}
                                    </td>
                                    <td>{{ Util::toView($rs->dt_ini_veiculacao) }}</td>
                                    <td>{{ Util::toView($rs->dt_fim_veiculacao) }}</td>
                                    <td>
                                        @if(isset($rs->guia_empresa_id))
                                            {{ ($rs->texto_resumo) ? "Sim" : "Não" }}</td>
                                        @endif
                                    <td>
                                        @if(isset($rs->guia_empresa_id))
                                            {{ ($rs->texto_descricao) ? "Sim" : "Não" }}
                                        @endif
                                    </td>
                                    <td>{{ ($rs->opcionais_observacoes) }}</td>
                                    <td>
                                        @if(isset($rs->guia_empresa_id))
                                            {{ Util::formatStatus($rs->anuncio_status) }}
                                        @endif
                                    </td>
                                    <td>{{ Util::toTimestamps($rs->anuncio_updated_at) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.tableTools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/table-advanced.js') }}"></script>
@stop
