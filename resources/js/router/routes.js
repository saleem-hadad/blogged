import Dashboard from '../views/Dashboard'
import NewArticle from '../views/NewArticle'

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
]
