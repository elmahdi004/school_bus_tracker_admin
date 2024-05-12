import './bootstrap';
import { createApp } from "vue/dist/vue.esm-bundler.js";
import App from "../../resources/js/App.vue";
import WaypointPage from './Pages/WaypointPage.vue';

const app = createApp();
    app.component('waypoint-page',WaypointPage);
app.mount('#app');