import './bootstrap';

import { createApp } from 'vue';
import CarCatalog from './components/CarCatalog.vue';

const app = createApp({});
app.component('car-catalog', CarCatalog);
app.mount('#app');

