<template>
	<tr style="cursor: pointer;" title="Click to edit" v-on:click="editUser">
		<td>{{data.username}}</td>
		<td>{{data.name}}</td>
		<td>{{data.email}}</td>
		<td>{{data.user_type}}</td>
		<td>{{data.created_at}}</td>
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