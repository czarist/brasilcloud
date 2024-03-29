<div id="registro_de_dominio" class="text-center mt-5">
    <div class="row w-100 align-items-center justify-content-center">
        <div class="col-2">
            <span class="postfix h1">www.</span>
        </div>
        <div class="col-6">
            <input class="m-0" id="dominio" type="text" placeholder="Digite um domínio (Ex: minhaempresa)">
        </div>
        <div class="col-2">
            <select id="extensao">
                <option value=".com.br">.COM.BR</option>
                <option value=".com">.COM</option>
                <option value=".net">.NET</option>
                <option value=".org">.ORG</option>
                <option value=".info">.INFO</option>
                <option value=".adv.br">.ADV.BR</option>
                <option value=".ind.br">.IND.BR</option>
                <option value=".online">.ONLINE</option>
                <option value=".ltda">.LTDA</option>
                <option value=".moda">.MODA</option>
                <option value=".boutique">.BOUTIQUE</option>
                <option value=".cafe">.CAFE</option>
                <option value=".tattoo">.TATTOO</option>
                <option value=".dental">.DENTAL</option>
                <option value=".news">.NEWS</option>
                <option value=".legal">.LEGAL</option>
                <option value=".digital">.DIGITAL</option>
                <option value=".design">.DESIGN</option>
                <option value=".link">.LINK</option>
                <option value=".tv">.TV</option>
            </select>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-center">
            <div id="btn_registro" class="m-0">
                <i class="bi bi-search h2 m-0"></i>
            </div>
        </div>

    </div>

</div>
<div class="row">
    <div class="col-12">
        <form id="formulario-efetuar-registro" method="POST" action="https://contrate.brasilcloud.com.br/registro-de-dominios">
            <div id="msg_registrar" style="display: none;">
                <h5>Resultado da Pesquisa:</h5>
                <p>Selecione os domínios que deseja registrar:</p>
            </div>
            <table id="resultado_registro" class="d-none">
                <thead>
                    <tr>
                        <td></td>
                        <td>Domínio</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="fx fx-center">
                <input id="btn_registrar" type="submit" name="Contratar" value="Registrar Domínio(s) Selecionado(s)" class="button botao_maior_azul" style="display: none;">
            </div>
        </form>
    </div>
</div>