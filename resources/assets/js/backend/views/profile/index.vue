<template>
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-body">
						<form @submit.prevent="saveProfile">
							<div :class="{'form-group': true, 'has-error': errors.username}">
								<label>Username</label>
								<input type="text" class="form-control input-sm" v-model="user.username">
								<span class="has-feedback" v-if="errors.username">{{ errors.username[0] }}</span>
							</div>
							<div :class="{'form-group': true, 'has-error': errors.name}">
								<label>Full Name</label>
								<input type="text" class="form-control input-sm" v-model="user.name">
								<span class="has-feedback" v-if="errors.name">{{ errors.name }}</span>
							</div>
							<div :class="{'form-group': true, 'has-error': errors.email}">
								<label>E-mail</label>
								<input type="text" class="form-control input-sm" v-model="user.email">
								<span class="has-feedback" v-if="errors.email">{{ errors.email[0] }}</span>
							</div>
							<div class="form-group" v-if="! setPassword">
								<a href="javascript:void(0)" @click="changePassword">Change password</a>
							</div>
							<div :class="{'form-group': true, 'has-error': errors.old_password}" v-if="setPassword">
								<label for="old_password">Current Password</label>
								<input type="password" class="form-control" v-model="user.old_password">
								<span class="has-feedback" v-if="errors.old_password">{{ errors.old_password[0] }}</span>
							</div>
							<div :class="{'form-group': true, 'has-error': errors.password}" v-if="setPassword">
								<label for="new_password">New Password</label>
								<input type="password" class="form-control" v-model="user.password">
								<span class="has-feedback" v-if="errors.password">{{ errors.password[0] }}</span>
							</div>
							<div :class="{'form-group': true, 'has-error': errors.password}" v-if="setPassword">
								<label for="confirm_password">Confirm Password</label>
								<input type="password" class="form-control" v-model="user.password_confirmation">
								<span class="has-feedback" v-if="errors.password">{{ errors.password[0]}}</span>
							</div>
							<button class="btn btn-primary" v-if="isSaving" disabled=""><i class="fa fa-spinner fa-spin"></i></button>
							<button class="btn btn-primary" v-else>Save</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-body box-profile">
							<img :src="uri + user.avatar" alt="" class="profile-user-img img-responsive img-circle">
							<h3 class="profile-username text-center">{{user.name}}</h3>
							<a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-camera"></i> Change</a>
							<button class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import Form from './index.js'
	export default Form
</script>
