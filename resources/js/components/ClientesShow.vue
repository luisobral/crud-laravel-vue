<template>
    <div>

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 d-block mb-0">{{ cliente.razao_social }} - Cliente</h1>
            <a href="/clientes" class="btn btn-primary btn-right">Voltar</a>
        </div>

        <article class="position-relative card card-body shadow-sm mb-4 border-0">
            <div class="param"><strong>Empresa:</strong> {{ cliente.empresa }}</div>
            <div class="param"><strong>Código:</strong> {{ cliente.codigo }}</div>
            <div class="param"><strong>Razão Social:</strong> {{ cliente.razao_social }}</div>
            <div class="param"><strong>Tipo:</strong> {{ cliente.tipo }}</div>
            <div class="param"><strong>CPF/CNPJ:</strong> {{ cliente.cpf_cnpj }}</div>

        </article>
        
    </div>
</template>

<style>
    .param {
        padding: 10px;
        margin: 5px 0;
        display: block;
        background: #f4f4f4;
        border-radius: 6px;
    }
</style>

<script>

    export default {
        props: ['id'], 
        data() {
            return {
                isLoading: true, 
                cliente: {
                    id: '', 
                    codigo: '', 
                    empresa: '', 
                    tipo: '', 
                    cpf_cnpj: '', 
                    razao_social: ''
                }
            }
        },
        methods: {

            get: function() {
                
                this.isLoading = true;

                axios.get('/api/cliente/' + this.id).then(response => {
                    this.cliente.id = response.data.id;
                    this.cliente.codigo = response.data.codigo;
                    this.cliente.empresa = response.data.empresa;
                    this.cliente.tipo = response.data.tipo;
                    this.cliente.cpf_cnpj = response.data.cpf_cnpj;
                    this.cliente.razao_social = response.data.razao_social;
                }).catch(error => console.log(error))

                this.isLoading = false;
            },
        }, 
        filters: {

        }, 
        mounted() {
            this.get();
        }
    }
</script>
