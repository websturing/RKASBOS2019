<template>
    <div>
      

                                    
                                    
        <div class="card">
    		<div class="card-header header-elements-sm-inline">
                <h6 class="card-title">
                     <input type="text" v-model="local" class="form-control" @keyup="SrcPrm(local)" placeholder="ketik Nama perusahaan / Nama izin / opd">
                </h6>
                <div class="header-elements">
                    <span class="badge bg-success badge-pill">28 active</span>
                    <div class="list-icons ml-3">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
                <div class="d-flex align-items-center mb-3 mb-sm-0">
                    <div id="campaigns-donut"></div>
                    <div class="ml-3">
                        <h5 class="font-weight-semibold mb-0">38,289 <span class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i> (+16.2%)</span></h5>
                        <span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">May 12, 12:30 am</span>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-3 mb-sm-0">
                    <div id="campaign-status-pie"></div>
                    <div class="ml-3">
                        <h5 class="font-weight-semibold mb-0">2,458 <span class="text-danger font-size-sm font-weight-normal"><i class="icon-arrow-down12"></i> (-4.9%)</span></h5>
                        <span class="badge badge-mark border-danger mr-1"></span> <span class="text-muted">Jun 4, 4:00 am</span>
                    </div>
                </div>

                <div>
                    <a href="#" class="btn bg-indigo-300"><i class="icon-statistics mr-2"></i> View report</a>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table text-nowrap table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                    </tr>
                </thead>
                <tbody>
<!--
                    <tr class="table-active table-border-double">
                        <td colspan="3">Today</td>
                        <td class="text-right">
                            <span class="progress-meter" id="today-progress" data-progress="30"></span>
                        </td>
                    </tr>
-->
                   
                    <tr v-for="(a,index) in permohonanmasuk.data" style="cursor:pointer" @click="detail(a.permohonan.permohonan_id)">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <a href="#">
                                        <img :src="'public/global_assets/images/placeholders/'+ a.icon" width="32" height="32" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="#" class="text-default font-weight-semibold">{{a.perusahaanNama}}</a>
                                    <div class="text-muted font-size-sm">
                                        <span class="badge badge-mark border-blue mr-1"></span>
                                        {{a.permohonan.getizin.nama_izin}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h6 class="text-muted font-size-xs">{{a.permohonan.create_at}}</h6>
                        </td>
                        <td><span class="badge bg-blue">Active</span></td>
                    </tr>
            </tbody>
            </table>
            </div>
            <div class="card-footer">
                <pagination :data="permohonanmasuk" @pagination-change-page="getResultspermohonanmasuk">
                </pagination>
            </div>
							
        
        </div>
    </div>
    
    
</template>


<script>
    import urlBase from '@/js/setting/urlBase';
    
    export default {
        data(){
           return {
               local:""
           } 
        },
        mounted() {
            console.log('mounted');  
            this.SrcPrm(this.local);
        },
        methods:{
          detail(data){
            this.$router.push({ path: '/permohonan/detail/'+data});
          }  
        },
        props:{
            "permohonanmasuk" : null,
            "SrcPrm" : {
                type:Function 
            },
            "getResultspermohonanmasuk": Function,
        }
    
    }
    
</script>
<style scoop>
    .borderBottom{
        margin-top:10px !important;
        margin-bottom:10px;
        border-bottom: 1px solid red;
    }
</style>
