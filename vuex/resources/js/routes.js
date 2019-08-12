import CreateUser from '../js/components/CreateUser'
import EditUser from '../js/components/EditUser'
import UserList from '../js/components/UserList'
import login from '../js/components/login'
const routes = [
    {
        path: '/',
        component: UserList,
        name: 'users.index',
    },
    {
        path: '/users/create',
        component: CreateUser,
        name: 'users.create',
    },
    {
        path: '/users/edit/:id',
        component: EditUser,
        name: 'users.edit',
    },
    {
        path: '/users/login',
        component: login,
        name: 'users.login',
    },
];
export default routes;
