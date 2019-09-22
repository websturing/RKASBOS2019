<template>
<div>
   <Breadcums v-bind:titles="titles"></Breadcums>
    <div class="page-content pt-0" >
        <Sidebar/>
              
    <div class="content-wrapper">
    <div class="content">

    <div class="card">
    		<div class="card-header header-elements-sm-inline">
                <h6 class="card-title">
                     <input type="text" class="form-control" v-model="search" placeholder="ketik Nama Persyaratan" @keyup="searchPrs(search)">
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
                        <h5 class="font-weight-semibold mb-0">PERIZINAN</h5>
                        <span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">{{jumlah.perizinan}}</span>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-3 mb-sm-0">
                    <div id="campaign-status-pie"></div>
                    <div class="ml-3">
                        <h5 class="font-weight-semibold mb-0">NONPERIZINAN</h5>
                        <span class="badge badge-mark border-danger mr-1"></span> <span class="text-muted">{{jumlah.nonperizinan}}</span>
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
                    <tr v-for="(a,index) in izin.data">
                       <td>{{a.nama_izin}}</td>
                        <td>
                            <span :class="{ 'badge badge-primary' : (a.kategori == 'perizinan' ), 'badge badge-warning' : (a.kategori == 'nonperizinan' )}" > {{a.kategori}} </span>
                        </td>
                       <td>{{a.opd.opd}}</td>
                       <td>
                           <a class="btn btn-dark btn-sm btn-labeled btn-labeled-left text-white" target="_blank" :href="url.base + '/persyaratan/pdf/izin?_V='+ a.opdi_id">
                               <b><i class="icon-printer"></i></b> Cetak
                           </a>
                       </td>
                        
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="card-footer">
                 <pagination :data="izin" @pagination-change-page="getPagePersyaratan">
                </pagination>
            </div>
							
        
    </div>
    
    </div>
    </div>
    </div>
</div>    
</template>


<script>
    import Breadcums from '@/js/components/template/breadcums';
    import Sidebar from '@/js/components/template/sidebar';
    import urlBase from '@/js/setting/urlBase';
    import LoadingComp from '@/js/components/template/loadingComponent';
    
    export default{
        mounted(){
            console.log('persyaratan')
        },
        data(){
          return {
              loading:false,
              titles:[{
                "name" : "Daftar Persyaratan",
                "subtitle" : "Perizinan / Nonperizinan",
              }],
              jumlah:{
                perizinan:null,
                nonperizinan:null,
              },
              izin:{},
              search: null,
              url:{
                  base: urlBase.web
              }
          }  
        },
        created(){
          this.listPersyaratan();  
        },
        methods:{
            getPagePersyaratan(page = 1){
                axios.get(urlBase.urlAxios+'/persyaratan/listpersyaratan?page=' + page)
				.then(response => {
					this.izin = response.data.izin;
				});
            },
            listPersyaratan(){
                axios
                    .get(urlBase.urlAxios+'/persyaratan/listpersyaratan')
                    .then(response => (
                        this.izin = response.data.izin,
                        this.jumlah.perizinan = response.data.jumlah.perizinan,
                        this.jumlah.nonperizinan = response.data.jumlah.nonperizinan,
                        console.log(response.data)
                    ));
            },
            searchPrs(data){
                console.log("search :" + data),
                
                 axios
                    .get(urlBase.urlAxios+'/persyaratan/listpersyaratan?q=searching&data='+data)
                    .then(response => (
                        this.izin = response.data.izin,
                        console.log(response.data)
                    ));
            }
            
        },
        components:{
            Breadcums,
            Sidebar
        }
    }
</script>