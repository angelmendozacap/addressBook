import Vue from 'vue'
import VueRouter from 'vue-router'
import ExampleComponent from "./components/ExampleComponent";
import ContactsCreate from './views/ContactsCreate'
import ContactsShow from "./views/ContactsShow";
import ContactsEdit from "./views/ContactsEdit";
import ContactsIndex from "./views/ContactsIndex";
import BirthdaysIndex from "./views/BirthdaysIndex";
Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: ExampleComponent,
      meta: { title: 'Bienvenido'}
    },
    {
      path: '/contacts',
      component: ContactsIndex,
      meta: { title: 'Contactos'}
    },
    {
      path: '/contacts/create',
      component: ContactsCreate,
      meta: { title: 'Agregar Nuevo Contacto'}
    },
    {
      path: '/contacts/:id',
      component: ContactsShow,
      meta: { title: 'Detalles del Contacto'}
    },
    {
      path: '/contacts/:id/edit',
      component: ContactsEdit,
      meta: { title: 'Editar Contacto'}
    },

    {
      path: '/birthdays',
      component: BirthdaysIndex,
      meta: { title: 'Cumpleaños de este Mes'}
    }
  ]
})