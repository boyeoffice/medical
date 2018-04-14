<template>
	<section class="content">
		<div class="box box-success">
			<div class="box-body">
		<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<label>Site Name</label>
				<input type="text" class="form-control" v-model="settings.site_name">
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label>Site E-mail</label>
				<input type="text" class="form-control" v-model="settings.site_email">
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label>Site Description</label>
				<textarea class="form-control" rows="3" v-model="settings.site_description"></textarea>
			</div>
		</div>

	</div>
	<router-link to="/" class="btn btn-default">Cancel</router-link>
		<button class="btn btn-primary" disabled="" v-if="isSending"><i class="fa fa-spinner fa-spin"></i></button>
		<button class="btn btn-primary" v-else @click="update">Save</button>
	</div>
		</div>
	</section>
</template>

<script>
	import Form from './form.js'
	export default Form
</script>