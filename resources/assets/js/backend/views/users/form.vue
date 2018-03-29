<template>
	<section class="content">
		<div class="box box-success">
			<div class="box-body">
				<form @submit.prevent="save">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Full Name</label>
								<input type="text" class="form-control" v-model="form.name">
								<span class="has-feedback" v-if="errors.name">{{errors.name[0]}}</span>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" v-model="form.username">
								<span class="has-feedback" v-if="errors.username">{{errors.username[0]}}</span>
							</div>
						</div>
						<!--/.col-sm-4 -->
						<div class="col-sm-4">
							<div class="form-group">
								<label>E-mail</label>
								<input type="email" class="form-control" v-model="form.email">
								<span class="has-feedback" v-if="errors.email">{{errors.email[0]}}</span>
							</div>
							<div class="form-group">
								<label>User Type</label>
								<select class="form-control" v-model="form.user_type">
									<option value="patient">Patient</option>
									<option value="client">Client</option>
									<option value="staff">Staff</option>
									<option value="adminstration">Adminstration</option>
								</select>
								<span class="has-feedback" v-if="errors.user_type">{{errors.user_type[0]}}</span>
							</div>
						</div>
						<!--/.col-sm-4 -->
						<div class="col-sm-4">
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" v-model="form.password">
								<span class="has-feedback" v-if="errors.password">{{errors.password[0]}}</span>
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" class="form-control" v-model="form.password_confirmation">
								<span class="has-feedback" v-if="errors.password">{{errors.password[0]}}</span>
							</div>
						</div>
						<!--/.col-sm-4 -->
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