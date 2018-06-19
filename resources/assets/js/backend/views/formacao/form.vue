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
                                            <option value="Congresso">Congresso</option>
                                            <option value="Curso">Curso</option>
                                            <option value="Reunião">Reunião</option>
                                            <option value="Científica/Clínica">Científica/Clínica</option>
                                            <option value="Mesa">Mesa</option>
                                            <option value="Redonda">Redonda</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="entidade">Entidade Organizadora</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="local">Local</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="data">Data</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
                                 <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nacional">Nacional/Internaciona</label>
                                        <select class="form-control">
                                            <option value="Nacional">Nacional</option>
                                            <option value="Internaciona">Internaciona</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/.form-group-->
                                 <div class="col-sm-4">
                                    <div :class="{'form-group': true}">
                                        <label for="nota">Nota/Créditos</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <!--/.form-group-->
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
                            <router-link to="/backend/formacao" class="btn btn-sm btn-default">Cancel</router-link>
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger">Clear</a>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
