import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import VueSweetalert2 from 'vue-sweetalert2';

import { library } from '@fortawesome/fontawesome-svg-core';

import { faHatWizard } from '@fortawesome/free-solid-svg-icons';
import { faPhone } from "@fortawesome/free-solid-svg-icons";
import { faPencil } from "@fortawesome/free-solid-svg-icons";
import { faMagnifyingGlass } from "@fortawesome/free-solid-svg-icons";
import { faCopy } from "@fortawesome/free-solid-svg-icons";
import { faPenFancy } from "@fortawesome/free-solid-svg-icons";



import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(faHatWizard, faPhone, faPencil, faMagnifyingGlass, faCopy, faPenFancy)
// Vue.component('font-awesome-icon', FontAwesomeIcon);

import 'sweetalert2/dist/sweetalert2.min.css';


createApp(App).use(router).use(VueSweetalert2).component('font-awesome-icon', FontAwesomeIcon).mount('#app')
