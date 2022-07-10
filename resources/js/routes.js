import AllProduk from './components/AllProduk.vue';
import AddProduk from './components/AddProduk.vue';
import EditProduk from './components/EditProduk.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllProduk
    },
    {
        name: 'add',
        path: '/add',
        component: AddProduk
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduk
    }
];