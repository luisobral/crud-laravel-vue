<template>
    <div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 d-block mb-0">Clientes</h1>
            <a href="/" class="btn btn-primary btn-right">Voltar</a>
            <a @click.prevent="showForm()" href="#" class="btn btn-primary"><i class="far fa-plus-square fa-fw fa-sm mr-2"></i>Adicionar cliente</a>
        </div>
  
        <!-- Mensagens flash -->
        <div class="alert alert-primary" v-if="isShowingMessage">
            <strong>{{ flashMessage }}</strong>
            <button class="close" @click="hideFlashMessage">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
  
        <div v-if="clientes.length > 0">            
            <article v-for="(cliente, index) in clientes" :key="cliente.recnum" class="position-relative card card-body shadow-sm mb-4 border-0">
                <div class="actions">
                    <div class="dropdown">
                        <button href="#" data-toggle="dropdown"><i class="fas fa-bars fa-fw"></i></button>
                        <div class="dropdown-menu dropdown-menu-right ">
                            <a href="#" @click.prevent="showForm(index)" class="dropdown-item"><i class="far fa-edit fa-fw fa-sm mr-2"></i>Alterar</a>
                            <a href="#" @click.prevent="remove(index)" class="dropdown-item"><i class="far fa-trash-alt fa-fw fa-sm mr-2"></i>Remover</a>
                        </div>
                    </div>
                    
                </div>
                <div class="d-flex">
                    <div class="content">
                        <div class="info">
                            <h4 class="title"><a :href="cliente.path" target="_blank">Razão Social: {{ cliente.razao_social }}</a></h4>
                            <span class="price my-2">Tipo: {{ cliente.tipo }}</span>
                            <span class="d-block text-muted">Código: {{ cliente.codigo }}</span>
                            <span class="d-block text-muted">Empresa: {{ cliente.empresa }}</span>
                        </div>
                    </div>
                </div>
            </article>
            
            <div class="card card-body shadow-sm border-0 mb-4">
                <small class="text-muted d-block mb-3">{{ total }} registro(s)</small>
            </div>
        </div>
        <div v-else>
            <div class="alert alert-info">
                <strong><i class="fas fa-info-circle fa-fw mr-2"></i>Nenhum registro encontrado</strong>
            </div>
        </div>
  
        <!-- Form modals -->
        <div class="modal fade" id="FormCliente" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="empresa">Empresa *</label>
                            <input v-model="form.empresa" type="text" name="empresa" id="empresa" class="form-control" autocomplete="off">
                            <strong class="text-danger py-1 d-block" v-if="form.errors.has('empresa')" v-text="form.errors.get('empresa')"></strong>
                        </div>
                        <div class="form-group">
                            <label for="codigo">Código *</label>
                            <input v-model="form.codigo" type="text" name="codigo" id="codigo" class="form-control" autocomplete="off">
                            <span class="form-text text-muted">O código deve ser único.</span>
                            <strong class="text-danger py-1 d-block" v-if="form.errors.has('codigo')" v-text="form.errors.get('codigo')"></strong>
                        </div>
                        <div class="form-group">
                            <label for="razao_social">Razão Social *</label>
                            <input v-model="form.razao_social" type="text" name="razao_social" id="razao_social" class="form-control" autocomplete="off">
                            <strong class="text-danger py-1 d-block" v-if="form.errors.has('razao_social')" v-text="form.errors.get('razao_social')"></strong>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo *</label>
                            <input v-model="form.tipo" type="text" name="tipo" id="tipo" class="form-control" autocomplete="off">
                            <strong class="text-danger py-1 d-block" v-if="form.errors.has('tipo')" v-text="form.errors.get('tipo')"></strong>
                        </div>  
                        <div class="form-group">
                            <label for="cpf_cnpj">CPF/CNPJ *</label>
                            <input v-model="form.cpf_cnpj" type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" autocomplete="off">
                            <strong class="text-danger py-1 d-block" v-if="form.errors.has('cpf_cnpj')" v-text="form.errors.get('cpf_cnpj')"></strong>
                        </div>  
  
                        <small class="d-block">Os campos marcados com * são obrigatórios.</small>
                    </div>
                    <div class="modal-footer">
                        <button @click="isEditing !== false ? update(isEditing) : create()" type="button" class="btn btn-success">{{ isEditing !== false ? 'Editar' : 'Adicionar' }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </template>
  
  <style>
    .actions {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 0;
        right: 0;
        width: 50px;
        height: 50px;
    }
  
    .actions button {
        border: none;
        background: none;
    }
  
    .title {
        display: block;
        max-width: 80%;
        margin-bottom: 0;
        line-height: 1;
        font-weight: 600;
        font-size: 1rem;
    }
  
    .price {
        display: block;
        font-weight: 600;
        font-size: 1.25rem;
        letter-spacing: -0.025rem;
    }
  </style>
  
  <script>
  
    export default {
        data() {
            return {
                clientes: {}, 
                total: 0,
                search: '', 
                isLoading: false, 
                isSearching: false, 
                isEditing: false, 
                isShowingMessage: false, 
                flashMessage: '',
                showModal: true,
  
                // Form está disponível globalmente 
                // por definição no arquivo app.js
                form: new Form({
                    codigo: '', 
                    empresa: '', 
                    tipo: '', 
                    cpf_cnpj: '', 
                    razao_social: ''
                })
            }
        },
        methods: {
  
            // Exibe o formulário de cadastro/edição
            showForm: function(index) {
                if (typeof index !== 'undefined') {
                    // Define o índice que estamos editando.
                    this.isEditing = index;
  
                    let registro = this.clientes[index];
  
                    this.form.codigo = registro.codigo;
                    this.form.empresa = registro.empresa;
                    this.form.tipo = registro.tipo;
                    this.form.cpf_cnpj = registro.cpf_cnpj;
                    this.form.razao_social = registro.razao_social;
                } else {
                    this.isEditing = false;
                    this.form.reset();
                }
                $('#FormCliente').modal('show');
            }, 
  
            // Create
            create: function() {
                axios.post('/api/cliente', this.form.data()).then(response => {
                    this.get();
                    this.showFlashMessage('cliente ' + this.form.razao_social + ' adicionado com sucesso!');
                    this.form.reset()
                    $('#FormCliente').modal('hide');
                }).catch((error) => {
                    this.form.errors.record(error.response.data.errors)
                })
            }, 
  
            // Read
            get: function() {
                this.isLoading = true;
                let endpoint = '/api/cliente';
  
                axios.get(endpoint).then(response => {
                    console.log(response.data.data);
                    this.clientes = response.data.data;
                    this.total = response.data.total.registros;
                }).catch(error => console.log(error))
  
                this.isLoading = false;
            },
  
            // Update
            update: function(index) {
                axios.put('/api/cliente/' + this.clientes[index].recnum, this.form.data()).then(response => {
                    this.get();
                    this.showFlashMessage('cliente ' + this.form.razao_social + ' alterado com sucesso!');
                    this.form.reset();
                    $('#FormCliente').modal('hide');
                }).catch((error) => {
                    this.form.errors.record(error.response.data.errors)
                });
            }, 
  
            // Delete
            remove: function(index) {
                let registro = this.clientes[index];
                let confirmacao = confirm('Tem certeza que deseja remover o registro ' + registro.codigo + ' - ' + registro.razao_social + '? Essa ação é irreversível.')
  
                if (confirmacao) {
                    axios.delete('/api/cliente/' + registro.recnum).then(response => {
                        this.showFlashMessage('cliente ' + registro.razao_social + ' removido!');
                        this.get();
                    }).catch(error => {
                        console.log(error);
                    })
                }
            }, 
  
            // Limpar busca
            clearSearch: function() {
                this.search = '';
                this.isSearching = false;
  
                this.get();
            }, 
  
            // Mensagens de feedback
            showFlashMessage: function(message) {
                this.isShowingMessage = true;
                this.flashMessage = message;
            }, 
            hideFlashMessage: function(message) {
                this.isShowingMessage = false;
                this.flashMessage = '';
            }
        }, 
        filters: {
  
            // Filtra os valores no 
            // formato brasileiro de 
            // moeda.
            moeda (value) {
                return parseFloat(value).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
            }
        }, 
        mounted() {
            this.get();
        }
    }
  </script>
  