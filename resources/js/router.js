import Vue from "vue";
import VueRouter from "vue-router";

require('./bootstrap');

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/', component:  () => import('./components/ProductComponent'),
            // name: 'person.index'
        },
    ]
})

