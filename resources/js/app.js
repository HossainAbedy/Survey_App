
require('./bootstrap');

window.Vue = require('vue');

//custom
import Gate from "./Gate";//Gate
Vue.prototype.$gate = new Gate(window.user);

window.Fire = new Vue(); //events

import swal from 'sweetalert2' //sweetalert
window.swal = swal;

const toast = swal.mixin({  //toaster
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;//toaster

//sweetalert

import VueProgressBar from 'vue-progressbar' //progressbar
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '3px'
})

import moment from 'moment'; //for date style

Vue.filter('upText',function(text){       //global filter
  return text.charAt(0).toUpperCase()+ text.slice(1);
});

Vue.filter('myDate',function(created){
  return moment(created).format('MMMM Do YYYY, h:mm:ss a');
});  //global filter

//toaster
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout:5000})
//toaster

//vue-router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default},
    { path: '/developer', component: require('./admin/Developer.vue').default},
    { path: '/admin', component: require('./admin/AdminList.vue').default},
    { path: '/surveyor', component: require('./surveyor/Surveyor.vue').default},
    { path: '/surveyform', component: require('./components/SurveyForm.vue').default},
    { path: '/formlist', component: require('./components/FormList.vue').default},
    { path: '/viewform', component: require('./components/ViewForm.vue').default},
    { path: '/user', component: require('./components/User.vue').default}
  ]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})
//vue-router

//vform
import {
  Form,
  HasError,
  AlertError,
  AlertErrors,
  AlertSuccess }
  from 'vform'
window.Form=Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)
//vform

//vee validator
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
import { ValidationProvider } from 'vee-validate';
Vue.component('ValidationProvider', ValidationProvider);
//vee validator

//laravel passport
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);
//laravel passport

//laravel vue pagination
Vue.component('pagination', require('laravel-vue-pagination'));


const app = new Vue({
    el: '#app',router
});
