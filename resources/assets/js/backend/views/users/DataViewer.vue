<template>
	<tr>
		<td>{{data.username}}</td>
		<td>{{data.name}}</td>
		<td>{{data.email}}</td>
		<td>
			<span v-if="data.status === '3'"> <button class="btn btn-danger btn-sm">Blocked</button> </span>
			<span v-if="data.status === '1'"> <button class="btn btn-warning btn-sm">Pending</button> </span>
			<span v-if="data.status === '2'"> <button class="btn btn-success btn-sm">Active</button> </span>
		</td>
		<td style="text-transform: capitalize;">{{data.user_type}}</td>
		<td>{{data.created_at | moment("Do MMMM YYYY")}}</td>
		<td>
			<router-link :to="'/backend/manage/users/' + data.id" class="btn btn-info btn-sm" title="View user">
				<i class="fa fa-eye"></i>
			</router-link>
			<router-link :to="'/backend/manage/users/' + data.id + '/edit'" class="btn btn-primary btn-sm" title="Edit user">
				<i class="fa fa-edit"></i>
			</router-link>
		</td>
	</tr>
</template>

<script>
	export default {
		props: ['data'],
		data(){
			return{

			}
		},
		methods: {
			editUser(){
				this.$router.push('/backend/manage/users/edit/' + this.data.id)
			}
		}
	}
</script>