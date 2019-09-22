<template>
       <div>
       
          <div v-for="title in titles">
              <vue-headful
                :title="title.page"
                description="Description from vue-headful"
                />
          </div>
           
           <Breadcums v-bind:titles="titles"
                      v-bind:permohonanjumlah="permohonanjumlah"
           >
           <LoadingComp v-bind:loading="loading" slot="spiner"></LoadingComp>
           </Breadcums>
          
      	<div class="page-content pt-0" >
            <Sidebar/>
           
        
           
            <div class="content-wrapper">
                <div class="content">
                      <section id="example-content">
                      <div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">CARI DAFTAR PERIZINAN / NONPERIZINAN</h6>
								<div class="header-elements">
									<div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
										<label class="form-check-label">
											Lasy update persyaratan:
											<input type="checkbox" class="form-input-switchery" checked data-fouc>
										</label>
									</div>
								</div>
							</div>

							<div class="card-body py-0">
								<div class="row">
                                    <autocomplate 
                                         :izinlist="izinlist" 
                                         filterby="nama_izin"
                                         @atchange="atchange">    
                                    </autocomplate>
								</div>
							</div>

							<div class="chart position-relative" id="traffic-sources"></div>
						</div>
                   
                   
                    <ul class="nav nav-tabs nav-tabs-bottom ">
                                <li class="nav-item ml-auto">
                                    <a href="#messages-tue" class="nav-link font-size-sm text-uppercase active" data-toggle="tab">
                                       PERMOHONAN MASUK 
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#messages-mon" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
                                        PEROPD
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#messages-fri" class="nav-link font-size-sm text-uppercase" data-toggle="tab">
                                        SURAT KELUAR
                                    </a>
                                </li>
                            </ul>
				         <div class="tab-content">
				          
								<div class="tab-pane active show fade" id="messages-tue">
								 
									<permohonanMasuk 
									        v-bind:permohonanmasuk="permohonanmasuk"  
                                            :SrcPrm="SrcPrm"
                                            :getResultspermohonanmasuk="getResultspermohonanmasuk"       
                                    >
									           
								    </permohonanMasuk>
								    
								
								
									
								</div>
								<div class="tab-pane fade" id="messages-mon">
									<peropd :peropd="peropd"
									        :SrcPeropd="SrcPeropd"
									></peropd>
								</div>

								<div class="tab-pane fade" id="messages-fri">
									<h1 class="text-center">Comming Soon</h1>
								</div>
				           
						</div>
                  </section>
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
    import permohonanMasuk from '@/js/components/permohonan_masuk';
    import peropd from '@/js/components/peropd';
    import autocomplate from '@/js/components/autocomplate';
    
    
    export default {
        data () {
            return {
                searchPrm: null,
                loading: true,
                msg : "andi",
                title: 'Dashboard',
                titles : [],
                info:null,
                permohonanjumlah :[
                     {name: "online", jumlah: 10},
                     {name: "walkin", jumlah: 50}
                ],
                permohonanmasuk : {},
                peropd:{},
                izinlist:{}
            }
        },
        mounted() {
            console.log('mounted');  
            
        },
        created() {
            this.fetchData();
            this.titlesData();
            this.peropdData();
            this.listIzinData();
        },
        methods: {
           
            SrcPrm(searchPrm){
                console.log('searching ... ='+ searchPrm);
                axios
                    .get(urlBase.urlAxios+'/permohonan/data?q=searching&data='+searchPrm)
                    .then(response => (
                        this.loading = false,
                        this.permohonanmasuk = response.data,
                        console.log(response.data)
                    ));
                
            },
            getResultspermohonanmasuk(page = 1){
                axios.get(urlBase.urlAxios+'/permohonan/data?page=' + page)
				.then(response => {
					this.permohonanmasuk = response.data;
				});
            },
            SrcPeropd(SrcPeropd){
                console.log('searching ... ='+ SrcPeropd);
                axios
                    .get(urlBase.urlAxios+'/permohonan/peropd?q=searching&data='+SrcPeropd)
                    .then(response => (
                        this.loading = false,
                        this.peropd = response.data,
                        console.log(response.data)
                    ));
                
            },
            atchange(customer){
                console.log(customer);
            }, 
            fetchData() {
                this.loading = true;
                axios
                    .get(urlBase.urlAxios+'/permohonan/data')
                    .then(response => (
                        this.loading = false,
                        this.permohonanmasuk = response.data,
                        console.log(response.data)
                    ));
            },
            titlesData() {
                this.loading = true;
                axios
                    .get(urlBase.urlAxios+'/permohonan/data?q=titles')
                    .then(response => (
                        this.loading = false,
                        this.titles = response.data,
                        console.log(response.data)
                    ));
            },
            peropdData() {
                this.loading = true;
                axios
                    .get(urlBase.urlAxios+'/permohonan/peropd')
                    .then(response => (
                        this.loading = false,
                        this.peropd = response.data,
                        console.log(response.data)
                    ));
            },
            listIzinData(){
                axios
                    .get(urlBase.urlAxios+'/izin/list')
                    .then(response => (
                        this.izinlist = response.data,
                        console.log("izin List :"+response.data)
                    ));
            }
        },
        components:{
            Breadcums,
            Sidebar,
            LoadingComp,
            permohonanMasuk,
            peropd,
            autocomplate
        },
    
        
    }
</script>