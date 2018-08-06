import { config } from '_/config/config'
import { customRoutes } from '~/router/router'
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import {
    Dashboard,
    Users,
    UserForm,
    Consult,
    ConsultForm,
    Admission,
    AdmForm,
    Tech,
    Group,
    Single,
    Origin,
    Qt,
    Sp,
    At,
    AtForm,
    Formacao,
    FormacaoForm,
    Agenda,
    Settings,
    Profile,
    Msg
} from '@/route-components'

const routes = [
    ...customRoutes,
    {
        path: '/',
        component: Dashboard
    },
    {
        path: '/users',
        component: Users
    },
    {
        path: '/users/create',
        component: UserForm
    },
    {
        path: '/users/:id/edit',
        component: UserForm,
        meta: { mode: 'edit' }
    },
    {
        path: '/consults',
        component: Consult
    },
    {
        path: '/consults/create',
        component: ConsultForm
    },
    {
        path: '/consults/:id/edit',
        component: ConsultForm,
        meta: { mode: 'edit' }
    },
    {
        path: '/admission',
        component: Admission
    },
    {
        path: '/admission/create',
        component: AdmForm
    },
    {
        path: '/admission/:id/edit',
        component: AdmForm,
        meta: { mode: 'edit' }
    },
    {
        path: '/techniques',
        component: Tech
    },
    {
        path: '/suggestions/icd10_group',
        component: Group
    },
    {
        path: '/suggestions/icd10_single',
        component: Single
    },
    {
        path: '/suggestions/origin_destination',
        component: Origin
    },
    {
        path: '/suggestions/query_techniques',
        component: Qt
    },
    {
        path: '/suggestions/specialty',
        component: Sp
    },
    {
        path: '/atividade-cientifica',
        component: At
    },
    {
        path: '/atividade-cientifica/:id/edit',
        component: AtForm,
        meta: { mode: 'edit' }
    },
    {
        path: '/atividade-cientifica/create',
        component: AtForm
    },
    {
        path: '/formacao',
        component: Formacao
    },
    {
        path: '/formacao/:id/edit',
        component: FormacaoForm,
        meta: { mode: 'edit' }
    },
    {
        path: '/formacao/create',
        component: FormacaoForm
    },
    {
        path: '/agenda',
        component: Agenda
    },
    {
        path: '/settings',
        component: Settings
    },
    {
        path: '/profile',
        component: Profile
    },
    {
        path: '/messages',
        component: Msg
    }
]

export const router = new VueRouter({
    mode: 'history',
    base: config.ENV.controlPanelBase,
    routes,
    linkExactActiveClass: 'active'
  })