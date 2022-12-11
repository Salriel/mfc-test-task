import { createRouter, createWebHistory} from 'vue-router'
import DefaultLayout from "../layouts/DefaultLayout.vue";
import RequestList from "../views/RequestList.vue";
import RequestEdit from "../views/RequestEdit.vue";


const routes = [
    {
        name: 'Request manager',
        path: '/',
        redirect: to => {
            return {name: 'RequestList'}
        },
        component: DefaultLayout,
        children: [
            { path: '/list', component: RequestList, name: 'RequestList' },
            { path: '/create', component: RequestEdit, name: 'RequestCreate' },
            { path: '/edit/:slug?', component: RequestEdit, name: 'RequestEdit' },
        ]
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes : routes
});

export default router;