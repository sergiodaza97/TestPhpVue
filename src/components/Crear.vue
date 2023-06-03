<template>
    <header>
        <div class="buv">
            <h2 class="header">Crear proceso/Evento partición cerrada</h2>
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
        <div class="div-nav">
            <button class="nav" @click.prevent="getView('information')">Informacion Basica</button>
            <button class="nav" @click.prevent="getView('schedule')">Cronograma</button>
        </div>
        <hr class="newh">
    </header>
    <div class="content">
        <div v-if="this.view == 'information'">
            <div>
                <h1 class="div-nav">Informacion basica</h1>
                <div class="divg">
                    <div class="divb">
                        <div class="marg">
                            <p>Objeto:</p>
                            <input class="input" type="text" v-model.trim="object" required>
                        </div>
                        <div class="marg">
                            <p>Actividad:</p>
                            <select class="select" v-model="activity">
                                <option v-for="(option, index) in activities" :key="index" :value="option.id">
                                    {{ option.Nombre_Clase }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="divb">
                        <div class="marg">
                            <p>Descripcion/Alcance:</p>
                            <input type="textarea" class="text-area" v-model.trim="description" required>
                        </div>
                    </div>
                    <div class="divb">
                        <div class="marg">
                            <p class="p" for="nit">Moneda:</p>
                            <select class="select" v-model="type_m">
                                <option v-for="(option, index) in options" :key="index" :value="option.text">
                                    {{ option.text }}
                                </option>
                            </select>
                        </div>
                        <div class="marg">
                            <p>Presupuesto:</p>
                            <input type="number" class="num" v-model.trim="budget" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="this.view == 'schedule'">
            <h1 class="div-nav">Cronograma</h1>
            <div class="time">
                <div class="marg">
                    <p>Fecha Inicio (*)</p>
                    <input type="date" class="date" v-model.trim="start_date">
                    <div class="div-date">(AAAA/MM/DD)</div>
                </div>
                <div class="marg">
                    <p>Hora Inicio (*)</p>
                    <input type="time" class="date" v-model.trim="start_time">
                </div>
                <div class="marg">
                    <p>Fecha de Cierre (*)</p>
                    <input type="date" class="date" v-model.trim="close_date">
                    <div class="div-date">(AAAA/MM/DD)</div>
                </div>
                <div class="marg">
                    <p>Hora de Cierre (*)</p>
                    <input type="time" class="date" v-model.trim="close_time">
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div>
            <button class="btn" @click.prevent="saveRecord()">Guardar</button>
        </div>
    </footer>
</template>
<script>
import axios from "axios";
export default {
    props: ['data'],
    components: {
    },
    data(){
        return {
            view: "information",
            object: null,
            activity: null,
            options: [
                { text: 'COP'},
                { text: 'USD'},
                { text: 'EUR'}
            ],
            description: null,
            type_m: null,
            budget: null,
            start_date: null,
            start_time: null,
            close_date: null,
            close_time: null,
            activities: null,
        }
    },
    mounted(){
        this.getActivity()
    },
    methods: {
    //   Desactive(data){
    //     console.log(data.status_id)
    //     if(data.status_id){
    //       let status_name = data.status_id == false ? "Activar" : "Inactivar";
    //         this.$swal({
    //             title:  `¿ Realmente deseas ${status_name} esta empresa ?`,
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'SI',
    //             cancelButtonText: 'NO',
    //         }).then((result) => {
    //             if(result.isConfirmed){
    //                 axios.post('/api/domiciliary/activeDesactive', data)
    //                   .then(resp => {
    //                     console.log(resp);
    //                   })
    //                   .catch((e) => {
    //                     loader.hide()
    //                     this.$swal({
    //                       icon: "error",
    //                       text: "Ha ocurrido un error, vuelve a intentarlo."
    //                   });
    //                   });
    //             }else{
    //                 this.$refs.company_table.refresh()
    //             }
    //         })
    //     }else{
    //         let status_name = data.status_id == false ? "Activar" : "Inactivar";
    //         this.$swal({
    //             title:  `¿ Realmente deseas ${status_name} esta empresa ?`,
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'SI',
    //             cancelButtonText: 'NO',
    //         }).then((result) => {
    //             if(result.isConfirmed){
    //                 axios.post('/api/domiciliary/activeDesactive', data)
    //                   .then(resp => {
    //                     console.log(resp);
    //                   })
    //                   .catch((e) => {
    //                     loader.hide()
    //                     this.$swal({
    //                       icon: "error",
    //                       text: "Ha ocurrido un error, vuelve a intentarlo."
    //                   });
    //                   });
    //             }else{
    //                 this.$refs.company_table.refresh()
    //             }
    //         })
    //     }
    //   },
        getView(data){
            this.view = data
            console.log(this.object)
        },
        saveRecord(){
            if (this.object == "" || this.object == null) {
                this.$swal({
                        title:  `No ha ingresado un objeto.`,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if(result.isConfirmed){
                            this.sum = 0
                        }
                    })
                return
            }
            // else if (this.activity == "" || this.activity == null) {
            //     this.$swal({
            //             title:  `No ha ingresado la ciudad.`,
            //             icon: 'error',
            //             confirmButtonColor: '#3085d6',
            //             confirmButtonText: 'OK',
            //         }).then((result) => {
            //             if(result.isConfirmed){
            //                 this.sum = 0
            //             }
            //         })
            //     return
            // } 
            else if (this.description == "" || this.description == null) {
                this.$swal({
                        title:  `No ha ingresado una descripcion.`,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if(result.isConfirmed){
                            this.sum = 0
                        }
                    })
                return
            }else if (this.type_m == "" || this.type_m == null) {
                this.$swal({
                        title:  `No ha ingresado un tipo de moneda.`,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if(result.isConfirmed){
                            this.sum = 0
                        }
                    })
                return
            }else if (this.budget == "" || this.budget == null) {
                this.$swal({
                        title:  `No ha ingresado un presupuesto.`,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if(result.isConfirmed){
                            this.sum = 0
                        }
                    })
                return
            }else if (this.start_date == "" || this.start_date == null) {
                this.$swal({
                        title:  `No ha ingresado el una fecha de inicio.`,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if(result.isConfirmed){
                            this.sum = 0
                        }
                    })
                return
            }else if (this.start_time == "" || this.start_time == null) {
                this.$swal({
                        title:  `No ha ingresado el una hora de inicio.`,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if(result.isConfirmed){
                            this.sum = 0
                        }
                    })
                return
            }else if (this.close_date == "" || this.close_date == null) {
                this.$swal({
                        title:  `No ha ingresado el una fecha de cierre.`,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if(result.isConfirmed){
                            this.sum = 0
                        }
                    })
                return
            }else if (this.close_time == "" || this.close_time == null) {
                this.$swal({
                        title:  `No ha ingresado el una hora de cierre.`,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if(result.isConfirmed){
                            this.sum = 0
                        }
                    })
                return
            }
            axios.post("http://localhost/suplosPhpVue/testsuplos/db/crud.php", {option: 2,
                object: this.object,
                description: this.description,
                type_m: this.type_m,
                budget: this.budget,
                start_date: this.start_date,
                start_time: this.start_time,
                close_date: this.close_date,
                close_time: this.close_time})
            .then(res => {
                if (res.data) {
                    this.view = 'information',
                    this.object = null,
                    this.activity = null,
                    this.description = null,
                    this.type_m = null,
                    this.budget = null,
                    this.start_date = null,
                    this.start_time = null,
                    this.close_date = null,
                    this.close_time = null,
                    this.$swal({
                        icon: 'success',
                        text: 'Registro creado con éxito.',
                    });
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
        getActivity(){
            axios.post("http://localhost/suplosPhpVue/testsuplos/db/crud.php", {option: 3})
                .then(res => {
                if (res.data) {
                    console.log(res.data[0].Nombre_Clase)
                    this.activity = res.data;
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
};
</script>
<style scoped>
p{
    text-align: initial;
}
.header{
    display: flex;
    color: black;
    margin-left: 20px;
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
.divg{
    display: block;
}
.divb{
    display: flex;
}
.time{
    display: flex;
    margin-left: 250px;
}
.nav{
    height: 55px;
    width: 250px;
    font-size: 13px;
    border: 0px white;
    font-weight: bold;
}
.input{
    height: 20px;
    width: 350px;
    background: #f1efef;
    font-size: 15px;
    border-radius: 5px;
}
.marg{
    margin: 5px;
    margin-left: 15px;
}
.div-nav{
    text-align: initial;
}
.text-area{
    width: 350px;
    height: 70px;
    background: #f1efef;
    font-size: 15px;
    border-radius: 5px;
}
.select{
    width: 160px;
    height: 22px;
    background: #f1efef;
    font-size: 15px;
    border-radius: 5px;
}
.num{
    background: #f1efef;
    font-size: 15px;
    border-radius: 5px; 
    width: 170px;
}
.date{
    width: 170px;
    height: 25px;
    background: #f1efef;
    font-size: 15px;
    border-radius: 5px;
}
.btn{
    border: 1px white;
    width: 150px;
    height: 30px;
    margin: 25px;
    background: green;
    color: white;
}
.div-date{
    font-size: x-small;
    margin-left: 100px;
}
</style>