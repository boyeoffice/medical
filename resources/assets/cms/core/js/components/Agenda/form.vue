<template>
    <section class="content">
        <div class="row">
            <div class="col-md-offset-3 col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <form @submit.prevent="save">
                            <div :class="{'form-group': true, 'has-error': errors.title}">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" v-model="form.title">
                                
                            </div>
                            <div :class="{'form-group': true, 'has-error': errors.start_date}">
                                <label for="start date">Start Date</label>
                                <datepicker :bootstrapStyling="true" v-model="form.start_date" :calendarButton="true" calendarButtonIcon="fa fa-calendar" :required="true"></datepicker>
                            </div>
                            <div :class="{'form-group': true, 'has-error': errors.end_date}">
                                <label for="end date">End Date</label>
                                <datepicker :bootstrapStyling="true" v-model="form.end_date" :calendarButton="true" calendarButtonIcon="fa fa-calendar" :required="true"></datepicker>
                            </div>
                            <div :class="{'form-group': true, 'has-error': errors.location}">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" v-model="form.location">
                            </div>
                            <div :class="{'form-group': true, 'has-error': errors.location}">
                                <label for="description">Notes </label>
                                <textarea class="form-control" rows="5" v-model="form.notes"></textarea>
                            </div>
                            <router-link class="btn btn-sm btn-default" to="/backend/agenda">Cancel</router-link>
                            <a href="javascript:void(0)" v-if="$route.meta.mode == 'edit'" class="btn btn-sm btn-danger" @click="deleteForm">Delete</a>
                            <a href="javascript:void(0)" v-else class="btn btn-sm btn-danger" @click="clearForm">Clear</a>
                            <button class="btn btn-sm btn-info" v-if="isSaving" disabled><i class="fa fa-spinner fa-spin"></i></button>
                            <button class="btn btn-sm btn-primary" v-else>Save</button>
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

