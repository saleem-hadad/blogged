import Dashboard from '../views/Dashboard'
import Articles from '../views/Articles'
import NewArticle from '../views/NewArticle'

export default [
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard,
        props: true,
    },
    {
        name: 'articles',
        path: '/articles',
        component: Articles,
        props: true,
    },
    {
        name: 'new',
        path: '/articles/new',
        component: NewArticle,
        props: true,
    },
]
