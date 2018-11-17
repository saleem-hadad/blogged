import Dashboard from '../views/Dashboard';
import NewArticle from '../views/NewArticle';
import ViewArticle from '../views/ViewArticle';
import EditArticle from '../views/EditArticle';
import Error403 from '../views/403';
import Error404 from '../views/404';

export default [
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard,
        props: true,
    },
    {
        name: 'new',
        path: '/articles/new',
        component: NewArticle,
        props: true,
    },
    {
        name: 'view',
        path: '/articles/:slug',
        component: ViewArticle,
        props: true,
    },
    {
        name: 'edit',
        path: '/articles/:slug/edit',
        component: EditArticle,
        props: true,
    },
    {
        name: '403',
        path: '/unauthorized',
        component: Error403,
        props: true,
    },
    {
        name: '404',
        path: '/404',
        component: Error404,
    },
    {
        name: 'not-found',
        path: '*',
        component: Error404,
    },
]
