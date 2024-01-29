import './bootstrap';
import Form from './Form';

import { createApp } from 'vue';
import Empresas from './components/Empresas.vue';
import Clientes from './components/Clientes.vue';

const app = createApp();

window.Form = Form;
app.component('empresas', Empresas);
app.component('clientes', Clientes);

app.mount('#app');