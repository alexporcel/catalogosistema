<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Proveedor
                        <button type="button" @click="abrirModal('proveedor','registrar')" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                    <option value="nombre">Nombre</option>
                                    <option value="correo">Correo</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarProveedor(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarProveedor(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="proveedor in arrayProveedor" :key="proveedor.id">
                                    <td>
                                        <button type="button" @click="abrirModal('proveedor','actualizar',proveedor)" class="btn btn-warning btn-sm">
                                        <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                    </td>
                                    <td v-text="proveedor.nombre"></td>
                                    <td v-text="proveedor.direccion"></td>
                                    <td v-text="proveedor.telefono"></td>
                                    <td v-text="proveedor.correo"></td>
                                </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal }" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre de Proveedor">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Direccion</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="direccion" class="form-control" placeholder="Direccion del Proveedor">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Telefono</label>
                                    <div class="col-md-9">
                                        <input type="number" v-model="telefono" class="form-control" placeholder="Telefono">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Correo</label>
                                    <div class="col-md-9">
                                        <input type="e-mail" v-model="correo" class="form-control" placeholder="ejemplo@gmail.com">
                                    </div>
                                </div>
                                <div v-show="errorProveedor" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjProveedor" :key="error" v-text="error">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion ==1" class="btn btn-primary" @click="registrarProveedor()">Guardar</button>
                            <button type="button" v-if="tipoAccion ==2" class="btn btn-primary" @click="actualizarProveedor()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
        </main>
</template>

<script>
    export default {
        data() {
            return {
                proveedor_id : 0,
                nombre : '',
                direccion:'',
                telefono:'',
                correo:'',
                arrayProveedor : [],
                modal : 0,
                tituloModal:'',
                tipoAccion: 0,
                errorProveedor :0,
                errorMostrarMsjProveedor:[],
                pagination:{
                    'total':0,
                    'current_page':0,
                    'per_page':0,
                    'last_page':0,
                    'from':0,
                    'to':0,
                },
                offset:3,
                criterio : 'nombre',
                buscar : ''
            }
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //calculamos elementos de la paginacion
            pagesNumber:function(){
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from +(this.offset * 2)
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while(from <= to){
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods : {
            listarProveedor (page,buscar,criterio){
                let me=this;
                var url= '/proveedor?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayProveedor = respuesta.proveedores.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarProveedor(page,buscar,criterio);
            },
            registrarProveedor(){
                if (this.validarProveedor()){
                    return;
                }
                
                let me = this;

                axios.post('/proveedor/registrar',{
                    'nombre': this.nombre,
                    'direccion': this.direccion,
                    'telefono': this.telefono,
                    'correo': this.correo
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarProveedor(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarProveedor(){
            if (this.validarProveedor()){
                    return;
                }
                
                let me = this;

                axios.put('/proveedor/actualizar',{
                    'nombre': this.nombre,
                    'direccion': this.direccion,
                    'telefono': this.telefono,
                    'correo': this.correo,
                    'id': this.proveedor_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarProveedor(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
            validarProveedor(){
                this.errorProveedor=0;
                this.errorMostrarMsjProveedor =[];

                if (!this.nombre) this.errorMostrarMsjProveedor.push("El nombre del proveedor no puede estar vacío.");

                if (this.errorMostrarMsjProveedor.length) this.errorProveedor = 1;

                return this.errorProveedor;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre='';
                this.direccion='';
                this.telefono='';
                this.correo='';

            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "proveedor":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Proveedor';
                                this.nombre= '';
                                this.direccion = '';
                                this.telefono = '';
                                this.correo = '';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Proveedor';
                                this.tipoAccion=2;
                                this.proveedor_id=data['id'];
                                this.nombre = data['nombre'];
                                this.direccion = data['direccion'];
                                this.telefono = data['telefono'];
                                this.correo = data['correo'];
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarProveedor(1,this.buscar,this.criterio);
        }
    }
</script>
<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>