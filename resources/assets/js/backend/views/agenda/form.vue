<template>
    <section class="content">
        <div class="row">
            <div class="col-md-offset-3 col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <form @submit.prevent="save">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" v-model="form.title">
                            </div>
                            <div class="form-group">
                                <label for="start date">Start Date</label>
                                <input type="text" class="form-control" v-model="form.start_date">
                            </div>
                            <div class="form-group">
                                <label for="end date">End Date</label>
                                <input type="text" class="form-control" v-model="form.end_date">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" v-model="form.location">
                            </div>
                            <div class="form-group">
                                <label for="description">Notes </label>
                                <textarea class="form-control" rows="5" v-model="form.notes"></textarea>
                            </div>
                            <router-link class="btn btn-sm btn-default" to="/agenda">Cancel</router-link>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Form from './form.js'
export default Form
</script>

