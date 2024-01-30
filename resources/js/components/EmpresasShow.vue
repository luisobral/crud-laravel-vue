<template>
    <div>

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 d-block mb-0">{{ empresa.razao_social }} - Empresa</h1>
            <a href="/empresas" class="btn btn-primary btn-right">Voltar</a>
        </div>

        <article class="position-relative card card-body shadow-sm mb-4 border-0">
            <div class="param"><strong>Código:</strong> {{ empresa.codigo }}</div>
            <div class="param"><strong>Empresa:</strong> {{ empresa.empresa }}</div>
            <div class="param"><strong>Sigla:</strong> {{ empresa.sigla }}</div>
            <div class="param"><strong>Razão Social:</strong> {{ empresa.razao_social }}</div>

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
                empresa: {
                    id: '', 
                    codigo: '', 
                    empresa: '', 
                    sigla: '', 
                    razao_social: ''
                }
            }
        },
        methods: {

            get: function() {
                
                this.isLoading = true;

                axios.get('/api/empresa/' + this.id).then(response => {
                    this.empresa.id = response.data.id;
                    this.empresa.codigo = response.data.codigo;
                    this.empresa.empresa = response.data.empresa;
                    this.empresa.sigla = response.data.sigla;
                    this.empresa.razao_social = response.data.razao_social;
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
