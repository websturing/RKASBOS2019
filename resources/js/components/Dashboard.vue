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
          
      	<div class="page-content pt-0">
                <Sidebar/>
           
            <div class="content-wrapper">
                <div class="content">
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
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Ketik Nama izin / nonizin">
                                        <div class="w-75 mx-auto mb-3"></div>
                                    </div>
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
				          
								<div class="tab-pane active fade show" id="messages-tue">
								 <input type="text"  v-model="searchPrm" class="form-control" @keyup="SrcPrm" placeholder="ketik Nama perusahaan / Nama izin / opd">
                                 <br/>
                                  <div class="card">
                                    <div class="card-body">
                                        <ul class="media-list">
                                        <center>
                                           <LoadingComp v-bind:loading="loading" slot="spiner"></LoadingComp>    
                                        </center>
                                            
                                      
                                            
                                                
										<li v-for="(a,index) in permohonanmasuk.data" class="media">
                                      
							
										        										    
											<div class="mr-3">
												<img v-bind:src="'public/global_assets/images/placeholders/' + a.icon"  width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
											
												
													<a href="#">{{a.perusahaanNama}}</a>
													<span class="font-size-sm text-muted">
													   {{a.permohonan.create_at}}
													</span>
												</div>
												{{a.permohonan.getizin.nama_izin}}
												 <br/>
												<span class='text-bold text-warning'>{{a.permohonan.getopd.opd}}</span>
												
													
											</div>
											
											
										</li>
									</ul>
                                    </div>
                                    <div class="card-footer">
                                        <pagination :data="permohonanmasuk" @pagination-change-page="getResultspermohonanmasuk">
                                        </pagination>
                                    </div>
                                    </div>
									
								
								
								
									
								</div>
								<div class="tab-pane fade" id="messages-mon">
									<ul class="media-list">
										<li class="media">
											<div class="mr-3">
												<img src="public/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Isak Temes</a>
													<span class="font-size-sm text-muted">Tue, 19:58</span>
												</div>

												Reasonable palpably rankly expressly grimy...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="public/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Vittorio Cosgrove</a>
													<span class="font-size-sm text-muted">Tue, 16:35</span>
												</div>

												Arguably therefore more unexplainable fumed...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="public/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Hilary Talaugon</a>
													<span class="font-size-sm text-muted">Tue, 12:16</span>
												</div>

												Nicely unlike porpoise a kookaburra past more...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="public/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Bobbie Seber</a>
													<span class="font-size-sm text-muted">Tue, 09:20</span>
												</div>

												Before visual vigilantly fortuitous tortoise...
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<img src="public/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="36" height="36" alt="">
											</div>

											<div class="media-body">
												<div class="d-flex justify-content-between">
													<a href="#">Walther Laws</a>
													<span class="font-size-sm text-muted">Tue, 03:29</span>
												</div>

												Far affecting more leered unerringly dishonest...
											</div>
										</li>
									</ul>
								</div>

								<div class="tab-pane fade" id="messages-fri">
									
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
            }
        },
        mounted() {
            console.log('mounted');  
            
        },
        created() {
            this.fetchData();
            this.titlesData();
        },
        methods: {
            SrcPrm(){
                console.log('searching ... ='+ this.searchPrm);
                axios
                    .get(urlBase.urlAxios+'/permohonan/data?q=searching&data='+this.searchPrm)
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
            }
        },
        components:{
            Breadcums,
            Sidebar,
            LoadingComp
        },
    
        
    }
</script>