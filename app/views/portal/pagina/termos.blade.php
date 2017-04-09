{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')
    <style type="text/css">
        .scroll-area {
            height: 725px;
            position: relative;
            overflow: auto;
        }
    </style>
@stop

{{-- Page content --}}
@section('conteudo')

    <!-- conteudo Start -->
    <div class="container">

        @include('notifications')
        <div id="notification"></div>

        <!-- header Start -->
        <div class="container">
            <div class="page-header">
                <h1>{{$data['title_pag']}} </h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    {{--<li><a href="termo-de-uso">termo-de-uso</a></li>--}}
                    <li class="active">Termos e Políticas</li>
                </ol>
            </div>
        </div>
        <!-- header End -->

        <!-- data Start -->
        <section>
            <div class="container ">
                <div class="row ">
                    <!-- left sec Start -->
                    <div class="col-sm-11">
                        <div class="row">

                            <div class="container col-sm-16">

                                <div class="scroll-area" data-spy="scroll" data-target="#termos-scroll" data-offset="0">
                                    <h3>CONTRATO DE LICENÇA DE USO E PRESTAÇÃO DE SERVIÇOS</h3>

                                    <p><strong> PRESTADORA DE SERVIÇOS E PUBLICIDADE LTDA </strong>com sede na Avenida
                                        Nova
                                        Cantareira,

                                        4635, Bairro Tucuruvi, São Paulo, SP, CEP 02341-002, inscrita no CNPJ sob o
                                        número
                                        18.881.554/

                                        0001-00, doravante denominada simplesmente CONTRATADA, e a pessoa física
                                        previamente

                                        qualificada, identificada e cadastrada no PORTAL ISONHEI, onde para todos os
                                        efeitos
                                        os dados

                                        fornecidos, armazenados em banco de dados específico, passam a integrar este
                                        instrumento, doravante

                                        denominada simplesmente CONTRATANTE e/ou USUÁRIO, celebram o presente contrato
                                        com
                                        base e

                                        condições na cláusula abaixo descritas:</p>

                                    <p>O acesso e/ou uso do Portal iSonhei é totalmente voluntário e atribui a quem
                                        acessa a
                                        condição de

                                        USUÁRIO. Todo o USUÁRIO aceita, a partir do momento em que acessa, sem nenhum
                                        tipo
                                        de reserva, o

                                        conteúdo das presentes “Contrato de licença de uso e prestação de serviços”,
                                        “Contrato de Adesão para

                                        Prestação de Serviços” e “Política de Privacidade” que as possam complementar,
                                        substituir ou modificar

                                        em algum sentido a relação das partes e conteúdos do Portal.</p>
                                    <hr>
                                    <h4>OBJETO</h4>

                                    <p>O presente instrumento tem como objeto a licença de uso software iSonhei e a
                                        prestação de serviços

                                        para o uso desse sistema operacional para o <strong>USUÁRIO.</strong></p>

                                    <p>
                                    <hr>
                                    <h4>LICENÇA DE USO</h4>

                                    <p> A licença é concedida ao <strong>USUÁRIO</strong> durante o período previsto no
                                        plano adquirido,
                                        mediante ao

                                        pagamento integral dos valores expressos na página destinada à divulgação dessas
                                        informações, ou para

                                        o Plano Grátis, enquanto o site estiver ativo.

                                        A licença concedida por meio deste instrumento terá aspectos da
                                        irretratabilidade e
                                        da irrevogabilidade.
                                    </p>
                                    <hr>
                                    <h4>PRESTAÇÃO DE SERVIÇOS</h4>

                                    <p>
                                        A prestação de serviços de software compreenderá a disponibilização de um espaço
                                        virtual para que

                                        o <strong>USUÁRIO</strong> crie sua página pessoal, mediante layouts oferecidos
                                        pela <strong>CONTRATADA</strong>, usufruindo dos

                                        recursos existentes, no prazo estabelecido.
                                    </p>
                                    <hr>
                                    <h4>OBRIGAÇÕES DO USUÁRIO</h4>

                                    <p>
                                        O <strong>USUÁRIO</strong> é responsável por todo conteúdo inserido em sua
                                        página pessoal, sejam textos, fotos ou

                                        vídeos, dentro do espaço virtual da <strong>CONTRATADA</strong>, bem como pelo
                                        teor destes. É responsável também

                                        pelos problemas decorrentes do uso incorreto e indevido do software.
                                    </p>

                                    <p>
                                        É de total responsabilidade do <strong>USUÁRIO</strong> a veracidade das
                                        informações preenchidas no cadastro, assim

                                        como a sua atualização, para fins de assegurar a realização dos serviços.
                                    </p>

                                    <p>
                                        Através da inserção de informação e/ou imagens no portal, o
                                        <strong>USUÁRIO</strong> declara-se titular legítimo dos

                                        direitos de propriedade intelectual do conteúdo para a reprodução, distribuição
                                        e comunicação pública

                                        através de qualquer meio eletrônico, especialmente internet e correio
                                        eletrônico, para todo o mundo

                                        com tempo ilimitado. Neste sentido, o <strong>USUÁRIO</strong> declara ter os
                                        direitos suficientes para a inserção da

                                        informação e/ou imagens no Portal iSonhei. A <strong>CONTRATADA</strong> não
                                        permite a inserção de conteúdos que

                                        deteriorem a qualidade do serviço. Está proibida a inserção de conteúdos que
                                        sejam supostamente

                                        ilícitos pela normativa nacional, comunitária ou internacional ou que realizem
                                        atividades supostamente

                                        ilícitas ou que contrariem os princípios da boa fé, sendo de pleno direito da
                                        CONTRATADA a exclusão

                                        dos mesmos caso haja a necessidade.
                                    </p>

                                    <p>
                                        A <strong>CONTRATADA</strong> condiciona a utilização do Portal ao preenchimento
                                        prévio do
                                        correspondente cadastro

                                        de <strong>USUÁRIO</strong>, selecionando o identificador e a senha que o
                                        <strong>USUÁRIO</strong> se compromete a
                                        conservar

                                        e a usar com a devida diligência. O uso da senha é pessoal e intransmissível,
                                        não sendo permitida a

                                        sua cedência, ainda que temporal, a terceiros. Neste sentido, o
                                        <strong>USUÁRIO</strong> deverá
                                        adotar as medidas

                                        necessárias para a custódia da senha por ele selecionada, evitando o uso da
                                        mesma por parte de

                                        terceiros. Em consequência, o <strong>USUÁRIO</strong> é o único responsável da
                                        utilização que se
                                        faça da sua senha,

                                        com completa isenção de responsabilidade para a <strong>CONTRATADA</strong>. Se
                                        o USUÁRIO sabe ou
                                        suspeita do

                                        uso da sua senha por terceiros, deverá comunicar tais circunstâncias a
                                        <strong>CONTRATADA</strong> com a maior

                                        brevidade possível.
                                    </p>

                                    <p>
                                        O <strong>USUÁRIO</strong> obriga-se a respeitar as leis aplicáveis e os
                                        direitos de terceiros ao utilizar os conteúdos

                                        da web. Também está proibida a reprodução, distribuição, transmissão, adaptação
                                        ou modificação,

                                        através de qualquer meio e em qualquer forma, dos conteúdos do Portal (textos,
                                        ilustrações, gráficos,

                                        informações, bases de dados, arquivos de som e/ou imagem, logotipos, etc.) e
                                        outros elementos, salvo

                                        autorização expressa dos seus legítimos titulares ou quando assim seja permitido
                                        pela lei.
                                    </p>
                                    <hr>
                                    <h4>TÉRMINO DO CONTRATO, RENOVAÇÃO E RECISÃO</h4>

                                    <p>
                                        O contrato poderá ser renovado conforme a necessidade do
                                        <strong>USUÁRIO</strong> diante da contratação de

                                        um novo plano e reincidido caso uma das partes descumpra o que determina as
                                        cláusulas deste

                                        instrumento.
                                    </p>
                                    <hr>
                                    <h4>CONSIDERAÇÕES GERAIS</h4>

                                    <p>
                                        O <strong>USUÁRIO</strong> autoriza a utilização de seus dados para serem
                                        enviados aos parceiros vinculados ao

                                        Portal da <strong>CONTRATADA</strong>, para fins de recebimento de informações
                                        diversas sobre serviços ou mesmo a

                                        participação em ações promocionais.
                                    </p>

                                    <p>
                                        O <strong>USUÁRIO</strong> autoriza o uso de seus dados, imagens, áudios, vídeos
                                        para fins de divulgação de qualquer

                                        natureza, como publicidade, propaganda, distribuição de mailing e mídias sociais
                                        da <strong>CONTRATADA</strong> e

                                        parceiros.
                                    </p>

                                    <p>
                                        O <strong>USUÁRIO</strong> responderá civil e criminalmente pela utilização
                                        inadequada do sistema ou por

                                        qualquer interferência no seu funcionamento que venha a prejudicar a
                                        funcionalidade do Portal da

                                        <strong>CONTRATADA</strong>.
                                    </p>

                                    <p>
                                        A <strong>CONTRATADA</strong> não se responsabiliza pela idoneidade dos
                                        compradores das cotas virtuais estipuladas

                                        pelo <strong>USUÁRIO</strong>, nem pela sua capacidade do pagamento dessas cotas
                                        disponibilizadas no site do

                                        <strong>USUÁRIO</strong>.
                                    </p>

                                    <p>
                                        O <strong>USUÁRIO</strong> reconhece que se tratando das cotas virtuais, o mesmo
                                        não receberá o produto físico,

                                        pois não chegará em matéria e sim terá seu valor convertido em dinheiro que será
                                        creditado na conta

                                        corrente cadastrada pelo <strong>USUÁRIO</strong>, após a confirmação de
                                        pagamento, descontadas as taxas dos

                                        serviços oferecidos pela <strong>CONTRATADA</strong>.
                                    </p>

                                    <p>
                                        A <strong>CONTRATADA</strong> não terá responsabilidade legal por danos ou
                                        prejuízos que eventualmente venha

                                        acarretar aos usuários do portal por problemas técnicos ou eventuais falhas no
                                        sistema ou na conexão

                                        que pode ocorrer tanto na parte do <strong>USUÁRIO</strong> quanto na parte da
                                        <strong>CONTRATADA</strong>.
                                    </p>

                                    <p>
                                        A identificação de usuários envolvidos em atos que prejudiquem o bom
                                        funcionamento do Portal

                                        acarretará a exclusão do cadastro do mesmo, além da comunicação do fato às
                                        autoridades

                                        competentes, se for o caso.
                                    </p>

                                    <p>
                                        A <strong>CONTRATADA</strong> poderá alterar, a qualquer tempo, sem aviso
                                        prévio, este instrumento, visando garantir

                                        o seu aprimoramento e a melhoria das relações entre os interessados. O contrato
                                        sempre estará

                                        disponível online publicamente para consulta dentro do Portal, de modo que
                                        recomenda ao <strong>USUÁRIO</strong>

                                        que o leia cada vez que acessar e for utilizar o Portal.
                                    </p>

                                    <p>
                                        A <strong>CONTRATADA</strong> inclui nos seus conteúdos ligações a sites
                                        pertencentes e/ou geridos por terceiros com

                                        o objetivo de facilitar o acesso a informação disponível através da internet. A
                                        <strong>CONTRATADA</strong> não assume

                                        qualquer responsabilidade derivada da existência de ligações entre os conteúdos
                                        do Portal e conteúdos

                                        situados fora do mesmo ou de qualquer outra menção a conteúdos externos.

                                        A <strong>CONTRATADA</strong> reserva-se na possibilidade de modificar, sem
                                        aviso prévio, o design, apresentação e/ou

                                        configuração do Portal, bem como alguns ou todos os serviços, e adicionar
                                        serviços novos.
                                    </p>
                                    <hr>
                                    <h4>FORO COMPETENTE</h4>

                                    <p>
                                        Fica estabelecido entre as partes que para dirimir quaisquer controvérsias do
                                        presente instrumento, as

                                        mesmas elegem o Foro da Comarca de São Paulo/SP.
                                    </p>
                                    <hr>
                                    <h3>CONTRATO DE ADESÃO PARA PRESTAÇÃO DE SERVIÇOS</h3>

                                    <p>A utilização dos serviços do Portal iSonhei depende da sua plena concordância com
                                        os termos e condições do Contrato de Prestação de Serviços.</p>

                                    <p><strong>ISONHEI PRESTADORA DE SERVIÇOS E PUBLICIDADE LTDA</strong> com sede na
                                        Avenida Nova Cantareira, 4635, Bairro Tucuruvi, São Paulo, SP, CEP 02341-002,
                                        inscrita no CNPJ sob o número 18.881.554/0001-00, doravante denominada
                                        simplesmente <strong>CONTRATADA</strong>, e a pessoa física previamente
                                        qualificada, identificada e cadastrada no PORTAL ISONHEI, onde para todos os
                                        efeitos os dados fornecidos, armazenados em banco de dados específico, passam a
                                        integrar este instrumento, doravante denominada simplesmente
                                        <strong>CONTRATADA</strong> e/ou <strong>USUÁRIO</strong>, celebram o presente
                                        contrato com base e condições na cláusula abaixo descritas:</p>

                                    <p>
                                        CONSIDERANDO que o <strong>USUÁRIO</strong> deseja contratar os serviços da
                                        <strong>CONTRATADA</strong> para
                                        prestação de serviço de coordenação e gerenciamento de presentes e similares
                                        virtuais , que a CONTRATADA possui o necessário conhecimento para prestar os
                                        serviços de acima, resolvem celebrar o presente Contrato de Adesão para
                                        Prestação de Serviços, que será regido pelas cláusulas e condições seguintes:
                                    </p>
                                    <hr>
                                    <h4>1 ª OBJETO</h4>

                                    <p>
                                        <strong>1.1</strong> O presente Contrato tem por objeto a prestação de serviços
                                        para o <strong>USUÁRIO</strong>
                                        de
                                        gerenciamento de presentes e similares, por intermédio de cotas virtuais
                                        estipuladas pelo <strong>USUÁRIO</strong>, pela <strong>CONTRATADA</strong>
                                        através do website www.isonhei.com.br,
                                        conforme abaixo descritos:
                                        (a) Disponibilização para acesso dos convidados da lista de presentes e
                                        similares por intermédio de cotas virtuais elaborada pelo
                                        <strong>USUÁRIO</strong>;
                                        (b) Arrecadação dos créditos correspondentes a cada uma das cotas virtuais
                                        sugeridos pelo <strong>USUÁRIO</strong>;
                                        (c) Encaminhamento de e-mail informando o <strong>USUÁRIO</strong> acerca dos
                                        créditos adquiridos
                                        e ao convidado, em confirmação pelo presente adquirido;
                                        (d) Disponibilização no painel de controle do <strong>USUÁRIO</strong> de
                                        extrato dos presentes
                                        adquiridos pelos Convidados;

                                    </p>

                                    <p>
                                        (e) Disponibilização de mecanismo de envio de e-mails para divulgar o evento e a
                                        lista de presentes virtuais; e
                                        (f) Transferência dos créditos arrecadados ao <strong>USUÁRIO</strong>, para a
                                        conta corrente informada pelo <strong>USUÁRIO</strong>, observados os moldes e
                                        condições estipuladas na Cláusula 2ª abaixo.

                                    </p>

                                    <p>
                                        <strong>1.2.</strong> No caso dos cadastros efetuados com o plano de teste
                                        grátis, todos os sites
                                        que tiverem o prazo de 10 dias passados poderão ser bloqueados, e só serão
                                        liberados quando o pagamento for efetuado. Depois de vencido os arquivos e
                                        modificações feitos no teste grátis não serão perdidos se o plano for renovado
                                        em até 30 dias corridos.
                                    </p>
                                    <hr>
                                    <h4>2ª REPASSE DOS CRÉDITOS</h4>

                                    <p>
                                        <strong>2.1.</strong> Para fins do presente Contrato consideram-se créditos para
                                        o <strong>USUÁRIO</strong>,
                                        os
                                        valores recebidos de presentes virtuais dos convidados, descontados deste valor
                                        (I) a remuneração da <strong>CONTRATADA</strong> estabelecida na Cláusula 3ª
                                        abaixo, (II)
                                        eventuais tarifas bancárias necessárias para a realização dos depósitos dos
                                        repasses dos créditos ao <strong>USUÁRIO</strong>, (III) a taxa cobrada pela
                                        operadora/administradora do cartão de débito ou cartão de crédito para
                                        liquidação de cada operação, quando o convidado efetuar o pagamento por meio de
                                        cartão de débito ou de cartão de crédito; (IV) taxa bancária cobrada pelo banco
                                        para liquidação de boleto CNR (Cobrança não registrada) nos casos de pagamento
                                        por boleto, (V) eventuais tributos incidentes ou que venham a incidir sobre as
                                        movimentações bancárias necessárias para proceder o repasse dos valores para o
                                        <strong>USUÁRIO</strong> (por exemplo: CPMF, IOF e etc) e (VI) taxa cobrada pelo
                                        PagSeguro ou
                                        futuras formas que serão colocadas à disposição do <strong>USUÁRIO</strong>.
                                    </p>

                                    <p>
                                        <strong>2.2.</strong> Os créditos ficarão disponíveis para resgate no painel de
                                        controle do
                                        <strong>USUÁRIO</strong> após a confirmação do pagamento das "cotas virtuais"
                                        pelo convidado,
                                        sendo certo que o depósito da quantia na conta fornecida se dará em 15 (quinze)
                                        dias corridos contados a partir da solicitação do resgate sendo que serão
                                        deduzidos R$ 10 (dez reais) para cobrir os custos de TED/DOC do montante total a
                                        receber de cada resgate. Não há limite quanto ao número de resgates nem quanto
                                        ao valor de cada resgate. No ato do saque o <strong>USUÁRIO</strong> será
                                        obrigado a sacar todo o valor arrecadado por meio das cotas. Não há limites
                                        quanto ao número de resgates. A <strong>CONTRATADA</strong>
                                        somente disponibilizará os valores através de depósito em conta-corrente,
                                        conta-investimento ou poupança de titularidade da parte contratante.
                                    </p>

                                    <p>
                                        <strong>2.2.1</strong> Caso o décimo quinto dia corrido após a solicitação do
                                        resgate não seja
                                        dia útil bancário, o depósito será realizado no primeiro dia útil subsequente.
                                    </p>

                                    <p>
                                        <strong>2.3.</strong> Ao solicitar o resgate através do painel administrativo, o
                                        <strong>USUÁRIO</strong> deverá informar a <strong>CONTRATADA</strong> os dados
                                        da sua conta-corrente, conta-investimento ou poupança para que seja realizado o
                                        depósito.
                                    </p>

                                    <p>
                                        <strong>2.4.</strong> A <strong>CONTRATADA</strong> fará o depósito somente em
                                        contas corrente
                                        e/ou poupança no território brasileiro onde o <strong>USUÁRIO</strong> seja o
                                        titular.
                                    </p>

                                    <p>
                                        <strong>2.5.</strong> Se o <strong>USUÁRIO</strong> deixar de efetuar a
                                        solicitação de resgate,
                                        fica o <strong>USUÁRIO</strong> desde já ciente de que o repasse não será
                                        efetuado automaticamente e a <strong>CONTRATADA</strong> aguardará a solicitação
                                        de resgate para programar o depósito dos valores.
                                    </p>

                                    <p>
                                        <strong>2.6.</strong> Para os fins deste Contrato considera-se dia útil o dia
                                        útil bancário na
                                        Cidade de São Paulo, Estado de São Paulo.
                                    </p>

                                    <p>
                                        <strong>2.7.</strong> Se após a confirmação pela administradora do cartão do
                                        pagamento feito pelo
                                        convidado, o Convidado cancele a transação do cartão junto à administradora e o
                                        presente já tiver sido liberado para o <strong>USUÁRIO</strong>, o <strong>USUÁRIO</strong>
                                        será informado sobre
                                        referido cancelamento e deverá devolver a <strong>CONTRATADA</strong> o valor
                                        total do "presente"
                                        recebido decorrente da transação cancelada pelo convidado. Mesmo em caso de
                                        cancelamento, as taxas da operadora do cartão e da <strong>CONTRATADA</strong>
                                        são devidas e
                                        deverão ser pagas integralmente.
                                    </p>
                                    <hr>
                                    <h4>3ª REMUNERAÇÃO DA CONTRATADA</h4>

                                    <p>
                                        <strong>3.1.</strong> Pela prestação dos serviços contemplados nos termos deste
                                        contrato, o
                                        <strong>USUÁRIO</strong> pagará a <strong>CONTRATADA</strong> uma remuneração
                                        equivalente a 1,99% (um ponto
                                        noventa e nove por cento) do montante total bruto recebido de cotas virtuais
                                        pelo USUÁRIO e arrecadado pela <strong>CONTRATADA</strong>.
                                    </p>

                                    <p>
                                        <strong>3.2.</strong> O valor da remuneração da <strong>CONTRATADA</strong>
                                        pelos serviços
                                        prestados será retido
                                        quando da disponibilização na conta-corrente da <strong>CONTRATADA</strong> dos
                                        valores dos
                                        presentes virtuais adquiridos pelos Convidados, nos moldes da Cláusula 2ª acima.
                                    </p>
                                    <hr>
                                    <h4>4ª OBRIGAÇÕES DAS PARTES</h4>

                                    <p>
                                        <strong>4.1.</strong> Obriga-se o <strong>USUÁRIO</strong>, nos termos do
                                        presente Contrato a:
                                        (a) fornecer as informações necessárias para a abertura do cadastro, preenchendo
                                        todos os campos obrigatórios, assim indicados pela <strong>CONTRATADA</strong>,
                                        com as
                                        informações precisas e corretas;
                                        (b) criar a lista de referência dos presentes e similares virtuais;
                                        (c) responsabilizar-se pela veracidade das informações prestadas, obrigando-se a
                                        efetuar as necessárias alterações quando necessário;
                                        (d) responsabilizar-se pelo cadastro, guarda e manutenção de acesso ao seu
                                        cadastro e funcionalidades do site da <strong>CONTRATADA</strong>, não a
                                        divulgando ou repassando
                                        a terceiros sob qualquer hipótese;
                                        (e) responsabilizar-se pela correta informação dos dados bancários, relativos à
                                        conta bancária onde serão repassados os créditos arrecadados pela <strong>CONTRATADA</strong>;
                                        (f) responsabilizar-se pelas imagens, textos, vídeos e demais arquivos
                                        carregados pelo próprio <strong>USUÁRIO</strong> no website da <strong>CONTRATADA</strong>,
                                        inclusive no que tange
                                        aos direitos autorais e de imagem destes, sendo proibido o uso de imagens,
                                        textos, vídeos e demais arquivos cujo conteúdo desrespeite os princípios da
                                        moral, ética e os bons costumes;
                                        (g) enviar as solicitações de transferência dos valores arrecadados, na forma
                                        estipulada na Cláusula 2ª acima;
                                        (h) autorizar, neste ato, que a <strong>CONTRATADA</strong> retenha o valor de
                                        sua remuneração,
                                        bem como eventuais tarifas bancárias necessárias para a realização dos depósitos
                                        dos repasses dos créditos ao <strong>USUÁRIO</strong>, a taxa cobrada pela
                                        operadora/administradora do cartão de débito ou cartão de crédito para
                                        liquidação de cada operação, quando o convidado efetuar o pagamento por meio de
                                        cartão de débito, de cartão de crédito, ou outros meios e eventuais tributos
                                        incidentes ou que venham a incidir sobre as movimentações bancárias necessárias
                                        para proceder o repasse dos valores para o <strong>USUÁRIO</strong>, tudo sempre
                                        nos termos da
                                        Cláusula 3ª deste Contrato;
                                        (i) observar as disposições contidas na legislação aplicável, bem como àquelas
                                        relativas à tributação dos valores recebidos, responsabilizando-se pelo
                                        cumprimento das eventuais obrigações de pagamento de tributos e apresentação das
                                        declarações necessárias (obrigações principais e acessórias), comprometendo-se o
                                        <strong>USUÁRIO</strong> a agir de acordo com a lei, e que está ciente de que os
                                        serviços
                                        prestados pela <strong>CONTRATADA</strong> não serão utilizados para fraudes e
                                        atos ilícitos;
                                        (j) devolver a <strong>CONTRATADA</strong> os valores recebidos decorrentes da
                                        transação
                                        cancelada pelo convidado, de acordo com o item 2.7 acima; e
                                        (l) cumprir todas as obrigações oriundas do presente Contrato.

                                    </p>

                                    <p>
                                        <strong>4.2.</strong> Obriga-se a <strong>CONTRATADA</strong>, nos termos do
                                        presente Contrato a:
                                        (a) acatar as informações enviadas pelo <strong>USUÁRIO</strong>, abrindo o
                                        cadastro destes e
                                        efetuando a arrecadação dos créditos, de acordo com os termos e condições do
                                        presente Contrato;
                                        (b) efetuar as medidas necessárias para a arrecadação dos valores dos presentes
                                        virtuais dos convidados do <strong>USUÁRIO</strong>, através da emissão,
                                        recebimento e efetivação
                                        da transação, seja por boleto bancário, autorizações de débito em conta
                                        corrente, cartão de crédito, cartão de débito ou outro modo disponibilizado pela
                                        <strong>CONTRATADA</strong>, bem como a conciliação e disponibilização deste
                                        valor;
                                        (c) enviar os e-mails informando ao <strong>USUÁRIO</strong> sobre a aquisição
                                        de presentes
                                        virtuais;
                                        (d) efetuar os repasses dos valores arrecadados, de acordo com as solicitações
                                        encaminhadas pelo <strong>USUÁRIO</strong>, conforme solicitação destes, uma vez
                                        observadas as
                                        datas e demais condições determinadas na Cláusula 2ª do presente Contrato;
                                        (e) auxiliar o <strong>USUÁRIO</strong>, na medida do possível, oferecendo
                                        orientações sobre as
                                        providências que devem ser tomadas, não se responsabilizando, todavia, pela
                                        tomada e/ou execução/inexecução das necessárias providências de responsabilidade
                                        do <strong>USUÁRIO</strong>; e
                                        (f) cumprir todas as obrigações oriundas do presente Contrato.

                                    </p>

                                    <p>
                                        <strong>4.3.</strong> A CONTRATADA se reserva o direito de utilizar todos os
                                        meios válidos e
                                        possíveis para identificar o <strong>USUÁRIO</strong>, bem como de solicitar
                                        dados adicionais e
                                        documentos que estime serem pertinentes a fim de conferir os dados pessoais
                                        informados pelo <strong>USUÁRIO</strong> no cadastramento de que trata o item
                                        <strong>4.1.</strong> “a” acima.
                                    </p>

                                    <p>
                                        <strong>4.3.1.</strong> Caso a <strong>CONTRATADA</strong> decida checar a
                                        veracidade dos dados
                                        cadastrais do
                                        <strong>USUÁRIO</strong> e constate haver entre eles dados incorretos ou
                                        inverídicos, ou ainda,
                                        caso o <strong>USUÁRIO</strong> se furtem ou neguem a enviar os documentos
                                        requeridos, a
                                        <strong>CONTRATADA</strong> poderá excluir a lista de sugestões de presente do
                                        <strong>USUÁRIO</strong> e
                                        desativar o acesso do mesmo ao website da <strong>CONTRATADA</strong>, sem
                                        prejuízo de outras
                                        medidas que entender necessárias e oportunas, não devendo ao
                                        <strong>USUÁRIO</strong>, por essa
                                        razão, qualquer tipo de indenização ou ressarcimento.
                                    </p>

                                    <p>
                                        <strong>4.3.2.</strong> No caso estabelecido neste item 4.3 e subitens eventuais
                                        valores
                                        arrecadados em nome do <strong>USUÁRIO</strong> através da
                                        <strong>CONTRATADA</strong> será disponibilizado ao
                                        <strong>USUÁRIO</strong> atendendo ao disposto na Cláusula 7ª abaixo.
                                    </p>

                                    <p>
                                        <strong>4.4.</strong> O <strong>USUÁRIO</strong> autoriza expressamente que o
                                        cadastramento
                                        mencionado neste
                                        Contrato seja feito e mantido pela <strong>CONTRATADA</strong>, bem como
                                        autorizam a <strong>CONTRATADA</strong> a
                                        fornecer as informações constantes de referido cadastro a autoridades públicas
                                        competentes que as solicitarem formalmente.
                                    </p>
                                    <hr>
                                    <h4>5ª TRIBUTOS</h4>

                                    <p>
                                        <strong>5.1.</strong> Cada parte arcará com os tributos a que derem causa ou que
                                        vierem a
                                        incorrer.
                                    </p>

                                    <p>
                                        <strong>5.2.</strong> Com relação aos valores recebidos pelo
                                        <strong>USUÁRIO</strong>, será de
                                        responsabilidade
                                        destes providenciar a apuração e a quitação de todos os tributos
                                        correspondentes, bem como cumprir as demais formalidades necessárias, estando aí
                                        inclusas tanto as obrigações principais como as acessórias.
                                    </p>
                                    <hr>
                                    <h4>6ª INDEPENDÊNCIA</h4>

                                    <p>
                                        <strong>6.1.</strong> A prestação dos serviços, de acordo com o presente
                                        Contrato, não
                                        estabelecerá qualquer relação, vínculo empregatício, previdenciário, tributário
                                        ou fiscal entre o <strong>USUÁRIO</strong> e a <strong>CONTRATADA</strong>, ou
                                        entre os seus empregados,
                                        colaboradores ou terceiros contratados do Portal iSonhei.
                                    </p>
                                    <hr>
                                    <h4>7ª VIGÊNCIA E TÉRMINO DO CONTRATO</h4>

                                    <p>
                                        <strong>7.1.</strong> Este Contrato terá o período de vigência compreendido
                                        entre a data do
                                        cadastramento do <strong>USUÁRIO</strong> e até a vigência de contratação do
                                        plano escolhido.
                                    </p>

                                    <p>
                                        <strong>7.2.</strong> Fica facultada a qualquer das partes rescindirem o
                                        presente Contrato, a
                                        qualquer tempo, a seu exclusivo critério, mediante aviso com 15 (quinze) dias de
                                        antecedência por escrito à outra parte.
                                    </p>

                                    <p>
                                        <strong>7.3.</strong> Caberá à resolução do Contrato, a critério da <strong>CONTRATADA</strong>,
                                        independentemente de interpelação judicial ou extrajudicial, quando o USUÁRIO
                                        desobedecer às instruções, especificações ou qualquer obrigação do presente
                                        Contrato.
                                    </p>

                                    <p>
                                        <strong>7.4.</strong> Com o término deste Contrato o acesso do
                                        <strong>USUÁRIO</strong> ao
                                        website da <strong>CONTRATADA</strong> será desativado.
                                    </p>

                                    <p>
                                        <strong>7.5.</strong> Em qualquer hipótese de término do presente Contrato, seja
                                        por qualquer dos
                                        motivos acima estabelecidos, os valores dos créditos arrecadados em nome do
                                        <strong>USUÁRIO</strong> será transferido para a conta bancária por este
                                        informada formalmente,
                                        no prazo de até 60 (sessenta) dias consecutivos, contados da data do aviso ou do
                                        término do Contrato, efetuando a <strong>CONTRATADA</strong> as retenções
                                        previstas nas Cláusulas
                                        2ª e 3ª deste Contrato, bem como eventuais despesas adicionais que a <strong>CONTRATADA</strong>
                                        tenha efetivamente incorrido por conta da execução do presente Contrato.
                                    </p>

                                    <p>
                                        <strong>7.6.</strong> Os presentes virtuais recebidos pelo
                                        <strong>USUÁRIO</strong> através da
                                        <strong>CONTRATADA</strong> entre o
                                        aviso mencionado no item <strong>7.2.</strong> acima e a retirada da lista do
                                        USUÁRIO do website
                                        da <strong>CONTRATADA</strong> serão entregues no prazo de 60 (sessenta) dias
                                        consecutivos,
                                        conforme item <strong>7.5.</strong> acima.
                                    </p>
                                    <hr>
                                    <h4>8ª DISPOSIÇÕES GERAIS</h4>

                                    <p>
                                        <strong>8.1.</strong> Este Contrato somente poderá ser modificado ou alterado
                                        por escrito e se
                                        aceito via e-mail ou por meio do link constante no website da
                                        <strong>CONTRATADA</strong>.
                                    </p>

                                    <p>
                                        <strong>8.2.</strong> Nenhuma das partes poderá ceder ou de qualquer forma
                                        transferir os direitos
                                        e obrigações aqui previstas, sem o consentimento por escrito da outra parte.
                                    </p>

                                    <p>
                                        <strong>8.3.</strong> As imagens utilizadas no website da
                                        <strong>CONTRATADA</strong> são
                                        meramente ilustrativas e
                                        têm o propósito único e exclusivo de auxiliar os convidados do
                                        <strong>USUÁRIO</strong> na
                                        escolha do montante a ser repassado, sendo igualmente certo que se trata de
                                        repasse de valores, não envolvendo a aquisição do produto mostrado.
                                    </p>

                                    <p>
                                        <strong>8.4.</strong> Caso o <strong>USUÁRIO</strong> e a
                                        <strong>CONTRATADA</strong> tomem a
                                        decisão de prorrogar este Contrato,
                                        podem as partes, através de um aditivo, negociar eventual prorrogação.
                                    </p>

                                    <p>
                                        <strong>8.5.</strong> O <strong>USUÁRIO</strong> compromete-se a agir de acordo
                                        com a lei, e
                                        declara que está
                                        ciente de que os serviços prestados pela <strong>CONTRATADA</strong> não devem
                                        ser utilizados
                                        para fraudes e atos ilícitos, sob pena da imediata resolução do presente
                                        Contrato.
                                    </p>
                                    <hr>
                                    <h4>9ª FORO</h4>

                                    <p>
                                        <strong>9.1.</strong> Fica estabelecido entre as partes que para dirimir
                                        quaisquer controvérsias
                                        do presente instrumento, as mesmas elegem o Foro da Comarca de São Paulo/SP.
                                    </p>
                                    <hr>
                                    <h3>POLÍTICA DE PRIVACIDADE</h3>

                                    <p>
                                        <strong>ISONHEI PRESTADORA DE SERVIÇOS E PUBLICIDADE LTDA</strong> com sede na
                                        Avenida Nova
                                        Cantareira, 4635, Bairro Tucuruvi, São Paulo, SP, CEP 02341-002, inscrita no
                                        CNPJ sob o número 18.881.554/0001-00, doravante denominada simplesmente
                                        <strong>CONTRATADA</strong>, e a pessoa física previamente qualificada,
                                        identificada e cadastrada
                                        no PORTAL ISONHEI, onde para todos os efeitos os dados fornecidos, armazenados
                                        em banco de dados específico, passam a integrar este instrumento, doravante
                                        denominada simplesmente <strong>CONTRATANTE</strong> e/ou
                                        <strong>USUÁRIO</strong>, celebram a presente política
                                        de privacidade com base e condições na cláusula abaixo descritas:
                                    </p>
                                    <hr>
                                    <h4>1ª DIREITOS DE PROPRIEDADE INTELECTUAL </h4>

                                    <p>
                                        Ficam reservados todos os direitos de exploração e utilização. O Portal iSonhei
                                        rege-se pelas leis brasileiras e encontra-se protegido pela legislação nacional
                                        e internacional de propriedade intelectual e industrial. Os textos, design,
                                        imagens, bases de dados, logotipos, estrutura, marcas e restantes elementos do
                                        Portal estão protegidos pelas leis e tratados internacionais de propriedade
                                        intelectual e industrial. Qualquer reprodução, transmissão, adaptação, tradução,
                                        modificação, comunicação pública, ou qualquer outra exploração de todo ou parte
                                        do seu conteúdo, efetuada de qualquer forma ou por qualquer meio, seja
                                        eletrônico, mecânico ou outro, estão estritamente proibidos salvo autorização
                                        prévia por escrito da <strong>CONTRATADA</strong>.
                                    </p>

                                    <p>
                                        Qualquer infração destes direitos pode dar lugar a procedimentos extrajudiciais
                                        ou judiciais civis ou penais que lhe correspondam. A <strong>CONTRATADA</strong>
                                        não concede
                                        nenhuma licença ou autorização de uso de nenhuma classe sobre os seus direitos
                                        de propriedade intelectual e industrial ou sobre qualquer outra propriedade ou
                                        direito relacionado com o Portal, serviços ou os conteúdos do mesmo.
                                    </p>

                                    <p>
                                        O <strong>USUÁRIO</strong> autoriza a <strong>CONTRATADA</strong> a utilizar
                                        suas logomarcas, marcas comerciais e
                                        conteúdos colocados no site para a divulgação da aludida logomarcas, marcas
                                        comerciais e conteúdos. Em particular, autoriza a <strong>CONTRATADA</strong> a
                                        utilizar essas
                                        logomarcas, marcas e conteúdos em todas as sessões do site assim como nas redes
                                        sociais nas quais a <strong>CONTRATADA</strong> esteja presente.
                                    </p>

                                    <p>
                                        O <strong>USUÁRIO</strong> se manifesta expressamente que a totalidade de
                                        conteúdos fornecidos à
                                        <strong>CONTRATADA</strong> não vulneram de nenhuma forma direitos de
                                        propriedade intelectual ou
                                        de qualquer outra índole, de terceiros, exonerando expressamente a <strong>CONTRATADA</strong>
                                        de
                                        qualquer reclamação relacionada com esse âmbito efetuada por qualquer terceiro,
                                        assumindo assim integralmente a responsabilidade por esses direitos.
                                        A legitimidade dos direitos de propriedade intelectual correspondentes aos
                                        conteúdos trazidos pelos <strong>USUÁRIO</strong> é de exclusiva
                                        responsabilidade dos mesmos. No
                                        sentido de preservar os possíveis direitos de propriedade intelectual, no caso
                                        de qualquer <strong>USUÁRIO</strong> ou um terceiro considerar que se produziu
                                        uma violação dos
                                        seus legítimos direitos pela introdução de determinado conteúdo no Portal,
                                        deverá notificar tal circunstância, por escrito, a <strong>CONTRATADA</strong>,
                                        indicando: -
                                        Dados de caráter pessoal, identificativos do interessado titular dos direitos
                                        supostamente infringidos. Se a reclamação é apresentada por um terceiro
                                        diferente do interessado, deverá indicar os poderes de representação que o
                                        permite. - Quais os conteúdos protegidos pelos direitos de propriedade
                                        intelectual e sua localização na página. - A creditação da existência,
                                        titularidade e vigência dos citados direitos de propriedade intelectual. -
                                        Declaração expressa na qual o interessado se responsabiliza pela veracidade dos
                                        dados e informação disponibilizados na notificação a que se refere este ponto.

                                    </p>
                                    <hr>
                                    <h4>2 ª POLÍTICA DE PROTEÇÃO DE DADOS</h4>

                                    <p>
                                        A presente política de proteção de dados regula o acesso e uso dos serviços que
                                        o Portal iSonhei disponibiliza aos usuários de Internet nos seus serviços e
                                        conteúdos. A <strong>CONTRATADA</strong> respeita a legislação vigente em
                                        matéria de proteção de
                                        dados pessoais, a privacidade dos usuários e o caráter confidencial e a
                                        segurança dos dados pessoais, adotando para tal fim as medidas técnicas e
                                        organizacionais necessárias para evitar a perda, mau uso, alteração, acesso não
                                        autorizado e roubo de dados pessoais que lhe sejam fornecidos.
                                    </p>

                                    <p>
                                        A <strong>CONTRATADA</strong> cumpre integralmente com a legislação vigente em
                                        matéria de
                                        proteção de dados de caráter pessoal, e com os compromissos de confidencialidade
                                        próprias da sua atividade.
                                        Se o <strong>USUÁRIO</strong> decide se cadastrar no Portal iSonhei, ser-lhe-ão
                                        solicitados a
                                        inclusão dos seus dados pessoais necessários para a consecução da finalidade à
                                        qual está destinado no Portal.

                                    </p>
                                    <hr>
                                    <h4>3 ª FINALIDADE</h4>

                                    <p>
                                        Os dados dos <strong>USUÁRIO</strong> cadastrados através do formulário são
                                        armazenados pela
                                        <strong>CONTRATADA</strong>, com as seguintes finalidades: - Criação e
                                        publicação online de Sites
                                        desenvolvido pelo <strong>USUÁRIO</strong> no ambiente da
                                        <strong>CONTRATADA</strong>. – Prestação de serviço pela
                                        <strong>CONTRATADA</strong> de coordenação e gerenciamento de presentes e
                                        similares virtuais. -
                                        Disponibilizar aos <strong>USUÁRIO</strong> uma pesquisa rápida e fácil de
                                        empresas que ofereçam
                                        serviços e produtos relacionados com eventos e viagens, entre outros. -
                                        Publicitar os serviços e produtos de empresas através do Guia de Empresas que
                                        possui os dados de contato, localização, descrição dos seus serviços e/ou
                                        produtos, fotos e vídeos. - Facilitar o contato, através dos pedidos de
                                        informação/orçamentos via e-mail e telefone, entre as empresas que anunciam os
                                        seus produtos ou serviços no Portal iSonhei e os <strong>USUÁRIO</strong>
                                        interessados neles. -
                                        Disponibilizar aos <strong>USUÁRIO</strong> informações diversas mediante
                                        artigos e estudos
                                        elaborados e/ou somente publicados no Portal iSonhei. - Envio de comunicações
                                        eletrônicas sobre campanhas, eventos, promoções, entre outros informativos sobre
                                        diversos setores.
                                        O <strong>USUÁRIO</strong> garante que toda a informação de caráter pessoal que
                                        disponibilize é
                                        exata e está atualizada de forma que corresponda com veracidade à situação real.
                                        Corresponde e é obrigação do <strong>USUÁRIO</strong> manter, a qualquer
                                        momento, os seus dados
                                        atualizados, sendo o <strong>USUÁRIO</strong> o único responsável da inexatidão
                                        ou falsidade dos
                                        dados disponibilizados e dos prejuízos que possa causar por isso a <strong>CONTRATADA</strong>
                                        ou
                                        a terceiros.

                                    </p>
                                    <hr>
                                    <h4>4ª CONSENTIMENTO DO USUÁRIO</h4>

                                    <p>
                                        Ao preencher o formulário e clicar para enviar os dados, o
                                        <strong>USUÁRIO</strong> manifesta ter
                                        lido e aceitado expressamente as Condições Legais, Licença de Uso, Prestação de
                                        Serviços e Política de Privacidade da <strong>CONTRATADA</strong> e ourtoga o
                                        seu consentimento
                                        inequívoco e expresso ao tratamento dos seus dados pessoais conforme as
                                        finalidades informadas. Ainda assim, o <strong>USUÁRIO</strong> consente que, no
                                        momento de se
                                        registrar, as suas fotografias e o seu perfil de usuário sejam visíveis
                                        publicamente para o resto dos <strong>USUÁRIO</strong> da
                                        <strong>CONTRATADA</strong>, bem como em outros
                                        pesquisadores de Internet. O USUÁRIO consente expressamente a cessão dos seus
                                        dados a outros usuários da <strong>CONTRATADA</strong>.
                                        Não é admitido o cadastro de um menor de idade não emancipado legalmente.
                                        O aceite deste termo considera o consentimento expresso do
                                        <strong>USUÁRIO</strong> ao
                                        recebimento de boletins informativos - no qual se incluem as notícias, novidades
                                        e informações mais relevantes do site e dos setores relacionados, bem como o
                                        envio de informes publicitários, dos segmentos parceiros da
                                        <strong>CONTRATADA</strong>.
                                        O aceite deste termo considera o consentimento expresso do
                                        <strong>USUÁRIO</strong> ao
                                        recebimento de orçamentos requisitados, bem como o aceite para o recebimento de
                                        outros orçamentos de empresas que comercializem o mesmo produto procurado em
                                        orçamento.
                                        Caso opte por não receber mais nossos comunicados, o <strong>USUÁRIO</strong>
                                        deverá entrar em
                                        contato através do email isonhei@isonhei.com.br e solicitar a retirada de seus
                                        dados.
                                    </p>
                                    <hr>
                                    <h4>5ª SEGURANÇA</h4>

                                    <p>
                                        A <strong>CONTRATADA</strong> dá conhecimento aos <strong>USUÁRIO</strong> que
                                        adotou medidas de índole técnica e
                                        organizativa regularmente estabelecidas, que garantem a segurança dos dados de
                                        caráter pessoal e evitam a sua alteração, perda, tratamento ou acesso não
                                        autorizado, tendo em conta o estado da tecnologia, a natureza dos dados
                                        armazenados e riscos a que estejam expostos, bem como procedimentos de controlo
                                        para a segurança dos sistemas de informação.
                                    </p>
                                    <hr>
                                    <h4>6ª COOKIES E IPS</h4>

                                    <p>
                                        O <strong>USUÁRIO</strong> aceita o uso de cookies e seguimento de IPs. O nosso
                                        analisador de
                                        tráfego do site utiliza cookies e seguimentos de IPs que nos permitem recolher
                                        dados para efeitos estatísticos tais como: data da primeira visita, número de
                                        vezes que visitou, data da última visita, URL e domínio de onde provém,
                                        explorador utilizado e resolução do monitor. Não obstante, o
                                        <strong>USUÁRIO</strong>, se o
                                        desejar, pode desativar e/ou eliminar estes cookies seguindo as instruções do
                                        seu navegador de internet.
                                        A <strong>CONTRATADA</strong> não utiliza técnicas de "spamming" e apenas
                                        tratará os dados que o
                                        <strong>USUÁRIO</strong> transmita mediante o formulário eletrônico habilitado
                                        no Portal ou
                                        mensagens de correio eletrônico.

                                    </p>
                                    <hr>
                                    <h4>7ª DIREITO DE ACESSO E RETIFICAÇÃO DE DADOS</h4>

                                    <p>
                                        O <strong>USUÁRIO</strong> tem direito a acessar suas informações e retificá-las
                                        se os dados
                                        estiverem errados. Estes direitos podem ser exercidos através do painel de
                                        controle do <strong>USUÁRIO</strong>. No caso de ter problemas para a efetivação
                                        online, bem como
                                        para qualquer tipo de dúvida ou controvérsia respeitante à nossa política de
                                        proteção de dados poderá esclarecer através do nosso correio eletrônico:
                                        proteção de dados poderá esclarecer através do nosso correio eletrônico:
                                        isonhei@isonhei.com.br indicando o assunto de referência.
                                    </p>
                                    <hr>
                                    <h4>8ª DISPOSIÇÕES GERAIS </h4>

                                    <p>
                                        A <strong>CONTRATADA</strong> reserva-se o direito de modificar a presente
                                        política para adaptar
                                        a futuras novidades legislativas ou jurisprudenciais.
                                        A presente Política de Proteção de Dados e restantes Condições Legais regem-se
                                        na sua totalidade pela lei brasileira em vigor.

                                    </p>
                                    <hr>
                                    <h4>9ª FORO</h4>

                                    <p>
                                        Fica estabelecido entre as partes que para dirimir quaisquer controvérsias do
                                        presente instrumento, as mesmas elegem o Foro da Comarca de São Paulo/SP.
                                    </p>
                                    <hr>
                                    <h3>TERMOS DO ISONHEI CLUB </h3>

                                    <p><strong>1</strong>. O consumidor participante deverá ler este documento, pois, ao
                                        aderir ao iSonhei Club, automaticamente concordará

                                        com os termos e condições aqui expressos.</p>

                                    <p><strong>2</strong>. A Administradora do ISonhei Club, responsável pela definição
                                        de seus critérios, procedimentos e tecnologia de

                                        funcionamento, é a iSonhei Prestadora de Serviços e Publicidade LTDA-ME, empresa
                                        inscrita no CNPJ sob o n.o 18.881.554/

                                        0001-00, sediada na Capital do Estado de São Paulo, na Avenida Nova Cantareira,
                                        número 4635.</p>

                                    <p><strong>3</strong>. O Programa tem como objetivo estimular os usuários a
                                        interagirem com a rede, bonificando por meio de pontos,

                                        diversas ações que podem ser realizadas dentro do Portal iSonhei. O programa
                                        permite que essa pontuação seja acumulada e

                                        trocada por produtos oferecidos dentro da “Prateleira de Produtos” do iSonhei
                                        Club, mediante critérios e procedimentos

                                        definidos pela Administradora, seus fornecedores e/ou parceiros.</p>

                                    <p>
                                        <strong>4</strong>. Os Prêmios e Benefícios serão serviços, ofertas, promoções,
                                        concessões e descontos em produtos estabelecidos pela

                                        Administradora, seus fornecedores e/ou parceiros, a todos ou um grupo específico
                                        de Membros.
                                    </p>
                                    <hr>
                                    <h4>REGRAS GERAIS</h4>

                                    <p><strong>5</strong>. A inclusão do consumidor ao Programa se efetiva com sua
                                        adesão ao presente Regulamento, quando passará a ser

                                        chamado “Sonhador”.
                                    </p>

                                    <p>
                                        <strong>6</strong>. Para informações sobre, atualização cadastral, resgate de
                                        pontos, exclusão, a Administradora disponibilizará a Central de

                                        Atendimento pelo e-mail: contato@isonhei.com.br, podendo disponibilizar outros
                                        canais oportunamente.
                                    </p>

                                    <p>
                                        <strong>7</strong>. O Membro obriga-se a comunicar à Administradora qualquer
                                        alteração cadastral, sendo este o único responsável por

                                        danos e prejuízos ocorridos em decorrência da omissão ou não veracidade dessas
                                        informações.
                                    </p>

                                    <p>
                                        <strong>8</strong>. A Administradora pode, a seu critério e a qualquer momento,
                                        introduzir alterações neste Regulamento ou nos Prêmios e Benefícios, sem a

                                        necessidade de aviso prévio.
                                    </p>

                                    <p>
                                        <strong>9</strong>. O Membro pode, a seu critério e qualquer tempo, solicitar
                                        sua exclusão do Programa, inclusive nos casos em que não

                                        concordar com eventuais alterações promovidas pela Administradora, bastando para
                                        tanto que formalize sua intenção a

                                        esta.<br> <strong>9.1</strong>. A exclusão do Membro do Programa implica na
                                        perda imediata do direito à utilização de quaisquer Prêmios e

                                        Benefícios oferecidos pelo Programa.
                                    </p>

                                    <p>
                                        <strong>10</strong>. O Programa vigorará por prazo indeterminado, podendo a
                                        Administradora suspendê-lo ou encerrá-lo quando assim o

                                        desejar, obrigando-se a comunicar seus clientes com a antecedência de 60
                                        (sessenta) dias, por meio de e-mails, período

                                        em que o Membro poderá usufruir seus Prêmios e Benefícios, e findo o qual, os
                                        mesmos perderão sua validade e serão

                                        automaticamente cancelados.
                                    </p>

                                    <p>
                                        <strong>11</strong>. Os Membros outorgam à Administradora o direito de armazenar
                                        em banco de dados as informações contidas na ficha

                                        de adesão, a Administradora, a respeitar sua privacidade e manter total
                                        confidencialidade dessas informações, utilizando-
                                        as somente em favor dos clientes e para ofertar Benefícios e Prêmios
                                        relacionados ao Programa.
                                    </p>

                                    <p>
                                        <strong>12</strong>. Para ter direito aos Prêmios e Benefícios do Programa, os
                                        Membros deverão solicitar a troca de seus pontos pelos

                                        produtos e serviços disponíveis na “prateleira de produtos”. Ao confirmar a
                                        troca serão subtraídos os pontos referentes ao

                                        valor do produto. Caso a pontuação seja maior que o valor do produto o resíduo
                                        continuará disponível para futuras trocas.
                                    </p>

                                    <p>
                                        <strong>13</strong>. Haverá Prêmios e Benefícios que demandarão a fixação de
                                        regras específicas, que serão estabelecidas pela

                                        Administradora, seus fornecedores e/ou parceiros em regulamentos à parte e serão
                                        divulgados oportunamente.
                                    </p>

                                    <p>
                                        <strong>14</strong>. Os Prêmios e Benefícios aos quais os Membros tiverem
                                        direito serão entregues via Sedex a cobrar (consulte as regras

                                        do correios) no forma e local indicado pelo membro,

                                        sendo certo que a responsabilidade e garantia pelos mesmos serão integralmente
                                        do seu respectivo fabricante ou

                                        prestador, não cabendo à Administradora qualquer ônus ou responsabilidade, ainda
                                        que subsidiária.
                                    </p>

                                    <p>
                                        <strong>15</strong>. A taxa de entrega será de responsabilidade do membro
                                        participante, por meio do serviço “Sedex a cobrar” dos

                                        Correios. O valor de cada entrega pode variar de acordo com o volume de cada
                                        produto.
                                    </p>

                                    <p>
                                        <strong>16</strong>. A administradora se responsabiliza em enviar o produto em
                                        até 30 dias corridos após a solicitação de resgate. Sendo o

                                        prazo de entrega de responsabilidade dos Correios.
                                    </p>
                                    <hr>
                                    <h4>PONTUAÇÃO</h4>

                                    <p>
                                        <strong>17</strong>. O Sistema de Pontuação será um Benefício concedido aos
                                        Membros, permitindo o acúmulo de pontos a cada ação

                                        realizada no Portal iSonhei, com resgate futuro, na forma por esta definida.<br>

                                        <strong>17.1.</strong> As ações para pontuar no iSonhei Club pode variar,
                                        conforme a definição da Administradora, sendo facultada a

                                        inclusão e exclusão de ações para pontuação.
                                    </p>

                                    <p>
                                        <strong>18</strong>. O Sistema de Pontuação terá período de vigência inicial de
                                        01 (um) ano, prorrogáveis a critério da Administradora.
                                    </p>

                                    <p>
                                        <strong>19</strong>. A pontuação será computada da seguinte forma: Ao se
                                        cadastrar espontaneamente você receberá 50 pontos ou se for

                                        indicado por algum usuário ganhará 100 pontos. Cada indicação com cadastro
                                        confirmado, realizado a partir do link

                                        individual de cada usuário, será computado, para você, 10 pontos no iSonhei
                                        Club; cada R$ 1,00 comprado em cota no site

                                        do sonhador equivale a 01 ponto, sendo que tais pontos são sempre inteiros, com
                                        arredondamento matemático padrão:

                                        0,01 a 0,49 centavos equivalem a 0 ponto e 0,50 a 0,99 centavos equivalem a 1
                                        ponto, pontos esses acumulados para o

                                        comprador de cada cota

                                        cota.
                                    </p>

                                    <p>
                                        <strong>19.1.</strong> Pontuação pela interação com o Guia de Empresas do
                                        iSonhei.
                                        <br>
                                        <strong> 19.1.1.</strong> A ação de entrar em contato solicitando um orçamento
                                        para
                                        o anunciante através do formulário do Guia de Empresas, irá gerar ao sonhador 5
                                        pontos no iSonhei Club.
                                        <br>
                                        <strong>19.1.2.</strong> A ação de realizar uma vista ao anunciante que o
                                        sonhador
                                        entrou em contato pelo Guia de Empresas, irá gerar ao sonhador 100 pontos no
                                        iSonhei
                                        Club.
                                        <br>
                                        <strong>19.1.3.</strong> A ação de realizar um fechamento de contrato com o
                                        anunciante do Guia de Empresas irá gerar ao sonhador 500 pontos no iSonhei Club.
                                        <br>
                                        <strong>19.1.4.</strong> O passo a passo dos parágrafos 19.1.1. ,
                                        19.1.2. e 19.1.3. devem ser seguidos rigorosamente
                                        para que a pontuação seja validada.
                                        <br>
                                        <strong>19.1.5.</strong> O sonhador não receberá pontos adicionais enviando
                                        orçamentos mais de uma vez para o mesmo anunciante no período de 6 (seis) meses.
                                    </p>

                                    <p>
                                        <strong>20</strong>. A Administradora reserva-se o direito de atribuir, alterar
                                        e cancelar qualquer pontuação promocional, a qualquer

                                        tempo.
                                    </p>

                                    <p>
                                        <strong>21</strong>. Os Pontos concedidos a cada Membro serão registrados
                                        poderão ser consultados no painel do usuário.
                                        <br>
                                        <strong>21.1.</strong> Nas compras com pagamento parcelado, os Pontos somente
                                        serão creditados após a quitação da última parcela.
                                        <br>
                                        <strong>21.2.</strong> A Administradora reserva-se o direito de debitar da conta
                                        do Membro Titular os Pontos obtidos por compras pagas

                                        com cheques sem fundo, sustados ou que de qualquer forma tenham sua compensação
                                        frustrada, assim como os Pontos

                                        originados de compras de mercadorias que, por qualquer motivo, venham a ser
                                        devolvidas à Administradora.
                                    </p>

                                    <p>
                                        <strong>22</strong>. O resgate de Pontos será feito por meio da troca de
                                        produtos ou serviços oferecidos na “prateleira de produtos” do

                                        iSonhei Club.
                                    </p>

                                    <p>
                                        <strong>23</strong>. É condição para resgate dos Pontos que o Membro tenha seu
                                        cadastro atualizado, não seja inadimplente para com a

                                        Administradora e não haja suspeita de fraude em sua pontuação, caso haja
                                        suspeita, os pontos ficarão bloqueados

                                        até regularização da situação.<br> <strong>23.1.</strong> Caso seja a confirmada
                                        a fraude, todos os pontos até então acumulados serão excluídos

                                        e o Membro será excluído permanentemente do iSonhei Club e do Portal iSonhei.
                                    </p>


                                    <p><strong>24</strong>. Os Pontos não são negociáveis, não possuem valor monetário e
                                        não podem ser cedidos a terceiros, negociados ou

                                        trocados por dinheiro, sendo pessoais e intransferíveis, inclusive por sucessão
                                        e herança, de forma que, no caso de

                                        falecimento do Membro, sua conta será encerrada e os Pontos cancelados.</p>

                                    <hr>
                                    <h4>REGRAS DA PROMOÇÃO</h4>

                                    <p>
                                        <strong>25</strong>. Dentro do programa do iSonhei Club cada usuário poderá
                                        subir de nível dentro da hierarquia da rede. Quanto mais

                                        pontos forem acumulados, maior será sua posição. Serão eles: Sonhador, Navegador
                                        e Explorador, nesta ordem.<br>
                                        <strong>25.1.</strong> Os pontos utilizados para contabilizar o nível não
                                        expirarão diferente dos utilizados para troca de produtos.

                                    </p>

                                    <p>
                                        <strong>26</strong>. Cada nível possuirá um multiplicador, que vai acelerar o
                                        acúmulo de pontos.
                                    </p>

                                    <p>
                                        <strong>26.1</strong>. No primeiro nível os pontos adquiridos serão
                                        multiplicados por 1, no nível 2 serão multiplicados por 1.5 e no nível 3

                                        serão multiplicados por 2.
                                    </p>

                                    <p>
                                        <strong>27</strong>. Para ser promovido do primeiro para o segundo nível será
                                        necessário acumular no mínimo 1.000 pontos, do segundo

                                        para o terceiro nível o membro deverá acumular 6.000 pontos. Vide a tabela a
                                        seguir.
                                    </p>
                                    <hr>

                                    <table class="table  table-bordered">
                                        <thead>
                                        <tr>

                                            <th class="text-center">Nível</th>
                                            <th class="text-center">Pontos</th>
                                            <th class="text-center">Multiplicador</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                            <td class="text-center">Sonhador</td>
                                            <td class="text-center">Navegador</td>
                                            <td class="text-center">Descobridor</td>
                                        </tr>
                                        <tr>

                                            <td class="text-center">01 até 999</td>
                                            <td class="text-center">1.000 até 5.999</td>
                                            <td class="text-center">6.000</td>
                                        </tr>
                                        <tr>

                                            <td class="text-center">01</td>
                                            <td class="text-center">1.5</td>
                                            <td class="text-center">02</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <p>
                                        <strong>28</strong>. A Administradora se reserva no direito de alterar a
                                        qualquer momento as regras para promoção dentro do iSonhei

                                        Club.
                                    </p>

                                    <p>
                                        <strong>29</strong>. Fica estabelecido entre as partes que para dirimir
                                        quaisquer controvérsias do presente instrumento, as mesmas elegem

                                        o Foro da Comarca de São Paulo/SP.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- left sec End -->
                    <div class="col-sm-5 hidden-xs right-sec">
                        <div class="bordered">
                            <div class="row ">
                                <div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s"
                                     data-wow-offset="150">
                                    <div class="table-responsive">
                                        @include('elements.menu-lateral.facebook')
                                        @include('elements.menu-lateral.instagram')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Data End -->
    </div>
    <!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript"
            src="{{ asset('assets/vendors/timepicker/spec/js/libs/bootstrap/js/bootstrap-scrollspy.js') }}">

    </script>

@stop

