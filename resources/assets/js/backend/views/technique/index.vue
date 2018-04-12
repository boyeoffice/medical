<template>
	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-success">
					<div class="box-body">
						<form @submit.prevent="save">
							<div :class="{'form-group': true, 'has-error': errors.tecnica_realizada}">
								<label>Técnica Realizada</label>
								<vue-suggestions :suggestions="modelTech" :loading="isLoading.tech" @input="fetchTech" v-model="form.tecnica_realizada"></vue-suggestions>
							</div>
							<div :class="{'form-group': true, 'has-error': errors.estagio}">
								<label>Estágio</label>
								<vue-suggestions :suggestions="modelSpec" :loading="isLoading.spec" @input="fetchSpec" v-model="form.estagio"></vue-suggestions>
							</div>
							<a href="javascript:void(0)" class="btn btn-sm btn-danger">Clear</a>
							<button class="btn btn-sm btn-primary" v-show="! isSending">Save</button>
							<button class="btn btn-sm btn-primary" v-show="isSending" disabled=""><i class="fa fa-spinner fa-spin"></i></button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
		<div :class="BoxClass">
		<div class="box-header with-border">
			<h2 class="box-title">{{title}}</h2>
			<div class="box-tools pull-right">
				<button class="btn btn-default btn-sm" @click="showFilter = !showFilter">F</button>
			</div>
		</div>
		<div class="box-body">
			<div class="filter" v-if="showFilter">
				<div class="filter-column">
					<select class="form-control"  v-model="params.search_column">
						<option v-for="column in filter" :value="column">{{column}}</option>
					</select>
				</div>
				<div class="filter-operator">
                    <select class="form-control" v-model="params.search_operator">
                        <option v-for="(value, key) in operators" :value="key">{{value}}</option>
                    </select>
                </div>
                <div class="filter-input">
                    <input type="text" class="form-control" v-model="params.search_query_1"
                        @keyup.enter="fetchData" placeholder="Search">
                </div>
                <div class="filter-input" v-if="params.search_operator === 'between'">
                    <input type="text" class="form-control" v-model="params.search_query_2"
                        @keyup.enter="fetchData" placeholder="Search">
                </div>
                <div class="filter-btn">
                    <button class="btn btn-primary btn-sm btn-block" @click="fetchData">Filter</button>
                </div>
			</div>
            <div class="table-responsive">
			<table class="table table-bordered dataTable">
				<thead>
                    <tr>
                        <th v-for="item in thead" tabindex="0">
                            <div class="dataviewer-th" @click="sort(item.key)" v-if="item.sort">
                                <span>{{item.label}}</span>
                                <span v-if="params.column === item.key">
                                    <span v-if="params.direction === 'asc'">&#x25B2;</span>
                                    <span v-else>&#x25BC;</span>
                                </span>
                            </div>
                            <div v-else>
                                <span>{{item.label}}</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in model.data" :item="item">
                    	<td>{{item.id}}</td>
                    	<td>{{item.tecnica_realizada}}</td>
                    	<td>{{item.estagio}}</td>
                    	<td>
                    		<button class="btn btn-primary btn-sm" @click="editData(item)"><i class="fa fa-pencil"></i></button>
                    		<button class="btn btn-danger btn-sm" @click="delData(index, item)"><i class="fa fa-trash-o"></i></button>
                    	</td>
                    </tr>
                </tbody>
			</table>
        </div>
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
                <button @click="prev" class="btn btn-default btn-sm">Prev</button>
                <button @click="next" class="btn btn-default btn-sm">Next</button>
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