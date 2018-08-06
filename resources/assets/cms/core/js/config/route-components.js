import Vue from 'vue'

export const Dashboard = Vue.component(
    'Dashboard',
    require('_/components/Dashboard/dashboard.vue')
) 

export const Users = Vue.component(
    'Users',
    require('_/components/Users/index.vue')
)

export const UserForm = Vue.component(
    'UserForm',
    require('_/components/Users/form.vue')
)

export const Consult = Vue.component(
    'Consult',
    require('_/components/Consult/index.vue')
)

export const ConsultForm = Vue.component(
    'ConsultForm',
    require('_/components/Consult/form.vue')
)

export const Admission = Vue.component(
    'Admission',
    require('_/components/Admission/index.vue')
)

export const AdmForm = Vue.component(
    'AdmForm',
    require('_/components/Admission/form.vue')
)

export const Tech = Vue.component(
    'Tech',
    require('_/components/Technique/index.vue')
)

export const Group = Vue.component(
    'Group',
    require('_/components/Suggestions/Icd10group.vue')
)

export const Single = Vue.component(
    'Single',
    require('_/components/Suggestions/Icd10single.vue')
)

export const Origin = Vue.component(
    'Origin',
    require('_/components/Suggestions/origindestination.vue')
)

export const Qt = Vue.component(
    'Qt',
    require('_/components/Suggestions/querytechniques.vue')
)

export const Sp = Vue.component(
    'Sp',
    require('_/components/Suggestions/specialty.vue')
)

export const At = Vue.component(
    'At',
    require('_/components/Atividade/index.vue')
)

export const AtForm = Vue.component(
    'AtForm',
    require('_/components/Atividade/form.vue')
)

export const Formacao = Vue.component(
    'Formacao',
    require('_/components/Formacao/index.vue')
)

export const FormacaoForm = Vue.component(
    'FormacaoForm',
    require('_/components/Formacao/form.vue')
)

export const Agenda = Vue.component(
    'Agenda',
    require('_/components/Agenda/index.vue')
)

export const Settings = Vue.component(
    'Settings',
    require('_/components/Settings/form.vue')
)

export const Msg = Vue.component(
    'Msg',
    require('_/components/Message/index.vue')
)

export const Profile = Vue.component(
    'Profile',
    require('_/components/Profile/index.vue')
)