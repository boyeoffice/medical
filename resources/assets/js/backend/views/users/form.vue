<template>
	<section class="content">
		<div class="box box-success">
			<div class="box-body">
				<form @submit.prevent="save">
					<div class="row">
						<div class="col-sm-4">
							<div :class="{'form-group': true, 'has-error': errors.name}">
								<label>Full Name</label>
								<input type="text" class="form-control" v-model="form.name">
							</div>
							<div :class="{'form-group': true, 'has-error': errors.username}">
								<label>Username</label>
								<input type="text" class="form-control" v-model="form.username">
							</div>
						</div>
						<!--/.col-sm-4 -->
						<div class="col-sm-4">
							<div :class="{'form-group': true, 'has-error': errors.email}">
								<label>E-mail</label>
								<input type="email" class="form-control" v-model="form.email">
							</div>
							<div class="row">
						     <div class="col-sm-7">
							<div :class="{'form-group': true, 'has-error': errors.user_type}">
								<label>User Type</label>
								<select class="form-control" v-model="form.user_type">
									<option value="patient">Patient</option>
									<option value="client">Client</option>
									<option value="staff">Staff</option>
									<option value="adminstration">Adminstration</option>
								</select>
							</div>
						</div>
						<div class="col-sm-5">
							<div :class="{'form-group': true, 'has-error': errors.is_admin}">
								<label>Backend User</label>
								<select class="form-control" v-model="form.is_admin">
									<option value="1" type="number">Yes</option>
									<option value="0" type="number">No</option>
								</select>
							</div>
						</div>
						</div>
					</div>
						<!--/.col-sm-4 -->
						<div class="col-sm-4">
							<div :class="{'form-group': true, 'has-error': errors.password}">
								<label>Password</label>
								<input type="password" class="form-control" v-model="form.password">
							</div>
							<div :class="{'form-group': true, 'has-error': errors.password}">
								<label>Confirm Password</label>
								<input type="password" class="form-control" v-model="form.password_confirmation">
							</div>
						</div>
						<!--/.col-sm-4 -->
						<div class="col-sm-4">
							<div :class="{'form-group': true, 'has-error': errors.status}">
								<label>Status</label>
								<select class="form-control" v-model="form.status">
									<option value="2">Active</option>
									<option value="3">Blocked</option>
								</select>
							</div>
						</div>
					</div>
					<router-link to="/backend/manage/users/" class="btn btn-default">Cancel</router-link>
					<button class="btn btn-success" v-if="isSending"><i class="fa fa-spinner fa-spin"></i></button>
					<button v-else class="btn btn-success">Save</button>
					<a href="javascript:void(0)" class="btn btn-danger" v-if="! isDelete" @click.stop="clearForm">Clear</a>
					<a href="javascript:void(0)" class="btn btn-danger" v-else @click.stop="deleteUser">Delete</a>
				</form>
			</div>
		</div>
	</section>
</template>

<script>
	import Form from './form.js'
	export default Form
</script>