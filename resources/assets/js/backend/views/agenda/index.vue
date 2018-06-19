<template>
    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Calendar</h3>
                    <div class="box-tools pull-right">
                        <router-link to="/backend/agenda/create-event" class="btn btn-sm btn-success">
                        <i class="fa fa-plus"></i> Create</router-link>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-stripe">
                        <thead>
                            <tr>
                                <th v-for="th in thead">{{th.label}}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
         </div>
    </section>
</template>

<script>
import Index from './index.js'
export default Index
</script>

