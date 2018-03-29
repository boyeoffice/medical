<template>
	<tr>
		<td>{{data.username}}</td>
		<td>{{data.name}}</td>
		<td>{{data.email}}</td>
		<td style="text-transform: capitalize;">{{data.user_type}}</td>
		<td>{{data.created_at}}</td>
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