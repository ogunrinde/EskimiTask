import View from './components/view.vue';
import Create from './components/create.vue';
import Edit from './components/edit.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: View
    },
    {
        name: 'create',
        path: '/create',
        component: Create
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit
    }
];
