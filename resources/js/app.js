import './bootstrap';
import Form from './Form';

import { createApp } from 'vue';
import Empresas from './components/Empresas.vue';
import EmpresasShow from './components/EmpresasShow.vue';
import Clientes from './components/Clientes.vue';
import ClientesShow from './components/ClientesShow.vue';

const app = createApp();

window.Form = Form;
app.component('empresas', Empresas);
app.component('empresas-show', EmpresasShow);
app.component('clientes', Clientes);
app.component('clientes-show', ClientesShow);

app.mount('#app');