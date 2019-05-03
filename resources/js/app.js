import './bootstrap';

import Vue from 'vue';
import VModal from 'vue-js-modal';

Vue.use(VModal);

Vue.component('theme-switcher', require('./components/ThemeSwitcher.vue').default);
Vue.component('new-project-modal', require('./components/NewProjectModal.vue').default);
Vue.component('dropdown', require('./components/Dropdown.vue').default);

new Vue({
    el: '#app'
});
