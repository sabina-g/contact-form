import App from './components/App.vue';
import { routes } from './routes';

import { createApp } from 'vue';
import * as VueRouter from 'vue-router';
import * as VueAxios from 'vue-axios';
import * as axios from 'axios';

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

const app = createApp(App)
app.use(router, VueAxios, axios)
app.mount('#app')
app.config.globalProperties.axios=axios

