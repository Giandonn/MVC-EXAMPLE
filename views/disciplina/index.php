<div class="container">
    <div class="border p-4 col-md-12">
        <form name="frmCadDisc" id="frmCadDisc">
            <input type="hidden" name="txtcoddisc" id="txtcoddisc" value="">
            <div class="form-outline mb-4 col-md-8">
                <input type="text" id="txtnomedisc" name="txtnomedisc" class="form-control" required>
                <label class="form-label" for="txtnomedisc">Nome disciplina</label>
            </div>

            <div class="form-outline mb-4 col-md-8">
                <input type="text" id="txtch" name="txtch" class="form-control" required>
                <label class="form-label" for="txtch">Carga horaria</label>
            </div>

            <div id="botaocad">
                <button type="button" class="btn btn-primary mb-4" id="btnInc">
                    Incluir
                </button>
            </div>

            <div id="botoesedit">
                <button type="button" id="btnSave" name="btnSave" class="btn btn-succes">
                    Gravar
                </button>

                <button type="button" name="btnCancel" id="btnCancel" class="btn btn-warning">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
<br>
<div>
    <table class="table table-hover" id="tabres">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Carga horaria</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody id="lsdisc">
        </tbody>
    </table>

</div>