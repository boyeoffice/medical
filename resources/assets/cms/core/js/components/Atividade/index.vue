<template>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Atividade Cientifica</h3>
                        <div class="box-tools pull-right">
                            <router-link class="btn btn-sm btn-success" to="/atividade-cientifica/create">
                                <i class="fa fa-plus"></i>
                                Create
                            </router-link>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th v-for="th in thead">{{ th.label }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="data in model.data">
                                    <td>{{ data.tipo }}</td>
                                    <td>{{ data.titulo }}</td>
                                    <td>{{ data.nome }}</td>
                                    <td>{{ data.data }}</td>
                                    <td>{{ data.estado }}</td>
                                    <td>{{ data.indexada }}</td>
                                    <td>{{ data.publicacao }}</td>
                                    <td>{{ data.autores }}</td>
                                    <td>{{ data.abstract }}</td>
                                    <td>{{ data.primeiro }}</td>
                                    <td>{{ data.premios }}</td>
                                    <td>{{ data.observacoes }}</td>
                                    <td>
                                        <router-link class="btn btn-sm btn-primary" :to="'/atividade-cientifica/' + data.id + '/edit'">
                                        <i class="fa fa-pencil"></i>
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                    <div class="pagination-footer">
                        <div class="pagination-item">
                            <span>Per page: </span>
                            <select v-model="params.per_page" @change="fetchData">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                            </select>
                        </div>
                        <div class="pagination-item">
                            <small>Showing {{model.from}} - {{model.to}} of {{model.total}}</small>
                        </div>
                        <div class="pagination-item">
                            <small>Current page: </small>
                            <input type="text" class="pagination-input" v-model="params.page"
                                @keyup.enter="fetchData">
                            <small> of {{model.last_page}}</small>
                        </div>
                        <div class="pagination-item">
                            <button @click="prev" :disabled="! model.prev_page_url" class="btn btn-default btn-sm">Prev</button>
                            <button @click="next" :disabled="! model.next_page_url" class="btn btn-default btn-sm">Next</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Index from './index.js'
export default Index
</script>

<style scoped="scss">
	.filter {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    &-column {
        flex: 4;
        padding-right: 15px;
    }
    &-operator {
        flex: 4;
        padding-right: 15px;
    }
    &-input {
        flex: 6;
        padding-right: 15px;
    }
    &-btn {
        flex: 1;
    }
}

.pagination-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.pagination-input {
    width: 45px;
}
</style>