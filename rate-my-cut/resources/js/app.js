/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

import HeaderComponent from './components/HeaderComponent.vue';
import FooterComponent from './components/FooterComponent.vue';
import Navbar1Component from './components/Navbar1Component.vue';
import Navbar2Component from './components/Navbar2Component.vue';
import AlertSuccess from './components/AlertSuccess.vue';
import FollowButton from './components/FollowButton.vue';
import PostFormComponent from './components/PostFormComponent.vue';
import DeleteButton from './components/DeleteButton.vue';
import FilterForm from './components/FilterForm.vue';

const app = createApp({
    components: {
        'Headercomponent' : HeaderComponent,
        'Footercomponent' : FooterComponent,
        'Navbar1component' : Navbar1Component,
        'Navbar2component' : Navbar2Component,
        'Alertsuccess' : AlertSuccess,
        'Followbutton' : FollowButton,
        'Postformcomponent' : PostFormComponent,
        'Deletebutton' : DeleteButton,
        'Filterform' : FilterForm,
    }
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');

