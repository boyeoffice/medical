<template>
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-body">
						<form @submit.prevent="saveProfile">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control input-sm" v-model="user.username">
							</div>
							<div class="form-group">
								<label>Full Name</label>
								<input type="text" class="form-control input-sm" v-model="user.name">
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<input type="text" class="form-control input-sm" v-model="user.email">
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
							<img :src="uri + '/' + user.avatar" alt="" class="profile-user-img img-responsive img-circle">
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