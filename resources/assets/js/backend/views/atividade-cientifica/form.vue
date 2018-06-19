<template>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <form action="">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="tipo">Tipo</label>
                                        <select class="form-control">
                                            <option value="Artigo">Artigo</option>
                                            <option value="Poster">Poster</option>
                                            <option value="Comunicação Livre">Comunicação Livre</option>
                                            <option value="Capítulo de Livro">Capítulo de Livro</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nome">Título</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="entidade">Nome da Revista/Livro</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="local">Data</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="data">Estado</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                 <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nacional">Estado</label>
                                        <select class="form-control">
                                            <option value="publicadol">Publicado</option>
                                            <option value="aguarda">Aguarda Publicação</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/.form-group-->
                                 <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nota">Indexada à PubMed (PMID)</label>
                                        <select class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="observações">Factor de Impacto à data da publicação</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="observações">Autores</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="observações">Abstract</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nota">Primeiro Autor</label>
                                        <select class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nota">Prémios</label>
                                        <select class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="observações">Observações</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="anexos">Anexos</label>
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                            </div>
                            <router-link to="/backend/atividade-cientifica" class="btn btn-sm btn-default">Cancel</router-link>
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger">Clear</a>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
