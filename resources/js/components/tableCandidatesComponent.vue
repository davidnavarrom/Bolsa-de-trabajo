<template>
    <div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">Listado de candidatos</div>
            <div v-if="loading">
            <button class="btn btn-primary text-nowrap btn-sm" type="button">
                <span class="spinner-border spinner-border-sm mr-2"></span>
                Sincronizando información...
            </button>
            </div>
            <div v-if="!loading">
            </div>
            </div>

    </div>
    <div class="table-responsive">
        <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Estado</th>
                <th scope="col">CV</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="candidate in candidates" :key="candidate.user.id">
                <th scope="row">{{candidate.user.id}}</th>
                <td>{{candidate.user.name}}</td>
                <td>{{candidate.user.surname}}</td>
                <td>{{candidate.user.email}}</td>
                <td>{{candidate.user.phone}}</td>
                <td style="width: 12%"><span  :class="{['badge badge-primary ' + 'candidature'+candidate.originalstatus]:true}" >{{ candidate.status }}</span></td>
                <td><a class="btn btn-primary w-100" :href="'/profile/download/'+ candidate.user.cvpath" role="button"><i class="fa fa-download"></i> </a></td>
            <td>
                    <div v-if="!isFinished()">
                        <b-dropdown id="dropdown-1">
                            <template v-slot:button-content>
                                <i class='fa fa-cogs'></i>
                            </template>
                            <b-dropdown-item><form method="POST" action="#">
                                <input type="hidden" name="_token" :value="csrf">
                                <button type="submit" @click.prevent="updateinfo(candidate.id,candidate.user.id,'selected')" class="dropdown-item">Seleccionar candidatura</button>
                            </form></b-dropdown-item>
                            <b-dropdown-item><form method="POST" action="#">
                                <input type="hidden" name="_token" :value="csrf">

                                <button type="submit"  @click.prevent="updateinfo(candidate.id,candidate.user.id,'notselected')" class="dropdown-item">Eliminar candidatura</button>
                            </form></b-dropdown-item>

                        </b-dropdown>
                    </div>

                <div v-else>
                    <b-dropdown id="dropdown-1">
                        <template v-slot:button-content>
                            <i class='fa fa-cogs'></i>
                        </template>
                        <b-dropdown-item><form method="POST" action="#">
                            <input type="hidden" name="_token" :value="csrf">
                            <button type="submit" disabled @click.prevent="updateinfo(candidate.id,candidate.user.id,'selected')" class="dropdown-item">Seleccionar candidatura</button>
                        </form></b-dropdown-item>
                        <b-dropdown-item><form method="POST" action="#">
                            <input type="hidden" name="_token" :value="csrf">

                            <button type="submit" disabled @click.prevent="updateinfo(candidate.id,candidate.user.id,'notselected')" class="dropdown-item">Eliminar candidatura</button>
                        </form></b-dropdown-item>
                    </b-dropdown>
                </div>
            </td>
            </tr>

            </tbody>
        </table>
        <pagination :data="candidature" @pagination-change-page="getCandidates"></pagination>

        </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['url','job_offer'],
        mounted:function() {
                this.getCandidates();
        },
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                candidates:[],
                candidature:{},
                loading: false


            }
        },
        methods:{

            getCandidates(page = 1){
                this.loading = true; //the loading begin
                axios.get(this.url+'?page=' + page).then(response=>{
                    this.loading = false; //the loading stop when the response given from server
                    this.candidates = response.data.data;
                this.candidature = response.data;
                })
                    .catch(error => {
                        this.loading = false;
                        //do whatever with response
                    });
            },

            updateinfo(candidature,user,status){
                axios.patch('/candidature/' + candidature + '/' +user+ '/' + status).then(response=>{
                    this.getCandidates();
                });
            },
            isFinished(){
                if(this.job_offer.originalstatus === 'finished'){
                    return true;
                }else{
                    return false;
                }
            },
        }
    }
</script>
