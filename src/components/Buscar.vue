<template>
    <header>
        <div class="buv">
            <h2 class="header">Procesos/Eventos partición cerrada</h2>
            <router-link
                to="/"
                custom
                v-slot="{ navigate }"
                >
                <button
                    @click="navigate"
                    role="link"
                    class="buttonV"
                >
                    Volver
                </button>
            </router-link>
        </div>
        <hr class="newh">
    </header>
    <h2 class="title">Búsqueda</h2>
    <div class="block">
        <div class="search">
            <div class="divl">
                <p class="ptext">ID cerrada</p>
                <input class="input" v-model="id_search" placeholder="Numero de proceso/ eventos" />
            </div>
            <div class="divl">
                <p class="ptext">Objeto/ Descripcion</p>
                <input class="input" v-model="object" placeholder="Objeto/ Descripcion" />
            </div>
            <div class="divl">
                <p class="ptext">Comprador</p>
                <input class="input" v-model="buyer" placeholder="Responsable evento" />
            </div>
        </div>
        <div class="divl ptext">
            <p class="ptext">Estado</p>
            <select class="input" v-model="status">
                <option v-for="(option, index) in options" :key="index" :value="option.value">
                    {{ option.text }}
                </option>
            </select>
        </div>
    </div>
    <div class="div-btn">
        <button class="btn-sea" @click.prevent="getRecords()">Buscar</button>
        <button class="btn-gene" @click.prevent="getExcel()">Generar Excel</button>
    </div>
    <div class="row mt-5 divt">
        <div class="col-lg-12 ">
            <div class="count">Numero de procesos/Eventos Listados:{{ this.count }}</div>
            <div class="pos-ta">
                <table >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ronda</th>
                            <th>Objeto</th>
                            <th>Descripción</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Cierre</th>
                            <th>Estado</th>
                            <th>Responsable de evento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(record, index) of records" :key="index">
                            <td>{{ record.id }}</td>
                            <td>{{ record.id }}</td>
                            <td>{{ record.object }}</td>
                            <td>{{ record.description }}</td>
                            <td>{{ record.start_date }}</td>
                            <td>{{ record.closing_date }}</td>
                            <td><span v-if="record.status == 1">Activo</span>
                                <span v-if="record.status == 2">Evaluacion</span>
                                <span v-if="record.status == 3">Publicado</span></td>
                            <td>{{ record.id }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="btn-act">
                <button @click.prevent="changeStatus()">Actualizar</button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data(){
        return {
            id_search: null,
            object: null,
            buyer: null,
            options: [
                { text: 'Activo', value: '1' },
                { text: 'Evaluacion', value: '2' },
                { text: 'Publicado', value: '3' },
                { text:'Todos', value: '4'}
            ],
            records: null,
            status: null,
            count: 0,
        }

    },
    mounted(){ 
        this.getRecords()
        this.changeStatus()
    },

    methods: {
        getRecords(){
            console.log(this.status)
            if(this.id_search == ''){
                this.id_search = null
            }else if(this.object == ''){
                this.object = null
            }else if(this.buyer == ''){
                this.buyer = null
            }else if(this.status == ''){
                this.status = null
            }
            axios.post("http://localhost/suplosPhpVue/testsuplos/db/crud.php", {option: 1, id_search: this.id_search, object: this.object,
                buyer: this.buyer,
                status: this.status})
                .then(res => {
                if (res.data) {
                    this.records = res.data;
                    this.count = res.data['length'];
                    console.log(res.data['length'])

                }
                })
                .catch(err => {
                    this.$swal({
                        icon: 'error',
                        text: 'Estamos presentado problemas con la api, comunicate con IT.',
                    });

                    console.log(err);
                })
        },
        getExcel(){
            window.location.href = "http://localhost/suplosPhpVue/testsuplos/excel.php";
            this.changeStatus();
        },
        changeStatus(){
            axios.post("http://localhost/suplosPhpVue/testsuplos/db/crud.php", {option: 4})
                .then(res => {
                if (res.data) {
                    console.log(res.data);
                    this.getRecords();
                }
                })
                .catch(err => {
                    this.$swal({
                        icon: 'error',
                        text: 'Estamos presentado problemas con la api, comunicate con IT.',
                    });

                    console.log(err);
                })
        }
    }    
}
</script>
<style scoped>
.search{
    display: flex;
}
.divl{
    display: block;
    margin: 15px;
}
.ptext{
    text-align: initial;
    color: black;
    font-size: 15px;
}
.input{
    height: 20px;
    width: 300px;
    background: #f1efef;
    font-size: 15px;
    border-radius: 5px;
}
.block{
    margin-left: 100px;
}
.title{
    display: flex;
    color: black;
    font-size: 20px;
    margin-left: 50px;
}
.header{
    display: flex;
    color: black;
    margin-left: 20px;
}
.divt{
    margin: 20px;
    margin-left: 110px;
}
.newh{
    border: 0; 
    height: 0; 
    box-shadow: 0 1px 5px 1px rgb(243, 240, 61);
}
.buv{
    display: flex;
}
.buttonV{
    background: black;
    color: white;
    margin-left: 850px;
    height: 25px;
    width: 60px;
}
td{
    border: 1px solid black;
    text-align: center;
    color: black;
}
th{
    background: #262525;
    color: white;
    text-align: center;
}
.div-btn{
    text-align: end;
    margin-right: 15px;
}
.btn-sea{
    width: 150px;
    height: 30px;
    font-size: unset;
    margin: 5px;
}
.btn-gene{
    width: 150px;
    height: 30px;
    font-size: unset;
    background: green;
    border: 1px white;
    color: white;
    margin: 5px;
}
.count{
    font-size: x-small;
    text-align: end;
    margin-right: 15px;
}
.btn-act{
    margin: 15px;
    text-align: end;
}
.pos-ta{
    text-align: center;
}
</style>