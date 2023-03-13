const ContactList = () => import('./components/contact/List.vue' /* webpackChunkName: "resource/js/components/contact/list" */)
const ContactCreate = () => import('./components/contact/Add.vue' /* webpackChunkName: "resource/js/components/contact/add" */)

export const routes = [
    {
        name: 'contactList',
        path: '/',
        component: ContactList
    },
    {
        name: 'contactAdd',
        path: '/contact/add',
        component: ContactCreate
    }
]
