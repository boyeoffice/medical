<template>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<box-table :source="source" :create="create" :title="title" :thead="thead" :filter="filter">
					<template slot-scope="props">
					<tr>
						<td>{{props.item.username}}</td>
						<td>{{props.item.name}}</td>
						<td>{{props.item.email}}</td>
						<td>
							<span v-if="props.item.status === '3'" class="label label-danger">Blocked </span>
							<span v-if="props.item.status === '1'" class="label label-warning">Pending</span>
							<span v-if="props.item.status === '2'" class="label label-success">Active </span>
						</td>
					<td style="text-transform: capitalize;">{{props.item.user_type}}</td>
					<td>{{props.item.created_at | moment("Do MMMM YYYY")}}</td>
					<td>
						<router-link :to="'/backend/manage/users/' + props.item.id + '/edit'" class="btn btn-primary btn-sm" title="Edit user">
							<i class="fa fa-edit"></i>
						</router-link>
					</td>
					</tr>
					</template>
				</box-table>
			</div>
		</div>
	</section>
</template>

<script>
	import BoxTable from '../vendor/BoxTable.vue'
	export default {
		components: {BoxTable},
		data(){
			return{
				source: '/md-vs2/manage/users',
				create: '/backend/manage/users/create',
				title: 'Users',
				thead: [
					{label: 'Username', key: 'username', sort: true},
					{label: 'Full Name', key: 'name', sort: true},
					{label: 'Email', key: 'email', sort: true},
					{label: 'Status', key: 'status', sort: false},
					{label: 'User Type', key: 'user_type', sort: true},
					{label: 'Created', key: 'created_at', sort: true},
					{label: 'Action', kye: 'action', sort: false}
					],
					filter: [
					   'username', 'name','email', 'created_at', 'user_type'
					]
			}
		},
		mounted(){
			document.title = 'Manage Users'
			this.$store.commit('title_top_data', 'Manage Users')
		}
	}
</script>