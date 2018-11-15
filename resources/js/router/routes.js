import Dashboard from '../views/Dashboard';
import NewArticle from '../views/NewArticle';
import ViewArticle from '../views/ViewArticle';
import EditArticle from '../views/EditArticle';

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
]
