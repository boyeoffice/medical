<template>
    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Agenda</h3>
                    <div class="box-tools pull-right">
                        <router-link to="/backend/agenda/create-event" class="btn btn-sm btn-success">
                        <i class="fa fa-plus"></i> Create</router-link>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-stripe">
                        <thead>
                            <tr>
                                <th v-for="th in thead">{{th.label}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="data in model.data">
                                <td>{{ data.title }}</td>
                                <td>{{ data.start_date | moment('Do MMM YYYY') }}</td>
                                <td>{{ data.end_date | moment('Do MMM YYYY') }}</td>
                                <td>{{ data.location }}</td>
                                <td>{{ data.notes }}</td>
                                <td>{{ data.user.name }}</td>
                                <td>
                                    <router-link class="btn btn-sm btn-primary" :to="'/backend/agenda/' + data.id + '/edit'">
                                    <i class="fa fa-pencil"></i> Edit
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