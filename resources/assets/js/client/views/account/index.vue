<template>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Update Profile</h3>
				</div>
				<div class="panel-body">
					<form @submit.prevent="updateProfile">
						<div :class="{'form-group': true, 'has-error': errors.username}">
							<label>Username</label>
							<input type="text" class="form-control input-sm" placeholder="Username" v-model="profile.username">
							<span class="has-error" v-if="errors.username">{{errors.username[0]}}</span>
						</div>
						<div :class="{'form-group': true, 'has-error': errors.name}">
							<label>Fullname</label>
							<input type="text" class="form-control input-sm" placeholder="Fullname" v-model="profile.name">
							<span class="has-error" v-if="errors.name">{{errors.name[0]}}</span>
						</div>
						<div :class="{'form-group': true, 'has-error': errors.email}">
							<label>Email</label>
							<input type="text" placeholder="Email" class="form-control input-sm" v-model="profile.email">
							<span class="has-error" v-if="errors.email">{{errors.email[0]}}</span>
						</div>
						<button class="btn btn-primary" v-if="! profileSaving" type="submit">Save</button>
						<button class="btn btn-primary" v-else disabled="" type="submit"><i class="fa fa-spinner fa-spin"></i></button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Change Password</h3>
				</div>
				<div class="panel-body">
				<form @submit.prevent="updatePass">
					<div :class="{'form-group': true, 'has-error': errors.old_password}">
						<label>Old Password</label>
						<input type="password" class="form-control input-sm" placeholder="Password" v-model="pass.old_password">
						<span class="has-error" v-if="errors.old_password">{{errors.old_password[0]}}</span>
					</div>
					<div :class="{'form-group': true, 'has-error': errors.password}">
						<label>Password</label>
						<input type="password" class="form-control input-sm" placeholder="Password" v-model="pass.password">
						<span class="has-error" v-if="errors.password">{{errors.password[0]}}</span>
					</div>
					<div :class="{'form-group': true, 'has-error': errors.password}">
						<label>Confirm Password</label>
						<input type="password" class="form-control input-sm" v-model="pass.password_confirmation">
						<span class="has-error" v-if="errors.password">{{errors.password[0]}}</span>
					</div>
					<button type="submit" v-if="! passSaving" class="btn btn-primary">Save</button>
					<button class="btn btn-primary" v-else disabled="" type="submit"><i class="fa fa-spinner fa-spin"></i></button>
				</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Index from './index.js'
	export default Index
</script>