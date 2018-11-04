import Dashboard from '../views/Dashboard'

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
        component: Dashboard,
        props: true,
    },
    {
        name: 'new',
        path: '/articles/new',
        component: Dashboard,
        props: true,
    },
]
