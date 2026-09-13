const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const categoryList = () => import('./components/category/List.vue' /* webpackChunkName: "resource/js/components/category/list" */)
const categoryCreate = () => import('./components/category/Add.vue' /* webpackChunkName: "resource/js/components/category/add" */)
const categoryEdit = () => import('./components/category/Edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */)
const ExampleComponent = () => import('./components/ExampleComponent.vue' /* webpackChunkName: "resource/js/components/category/edit" */)

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'categoryList',
        path: '/category',
        component: categoryList
    },
    {
        name: 'categoryEdit',
        path: '/category/:id/edit',
        component: categoryEdit
    },
    {
        name: 'categories',
        path: '/categories',
        component: ExampleComponent
    },
    {
        name: 'categoryAdd',
        path: '/category/add',
        component: categoryCreate
    }
]
