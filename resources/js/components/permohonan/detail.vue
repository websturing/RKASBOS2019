<template>
    <div>
    
    <div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<span class="breadcrumb-item active">
				       
					</span>
				</div>

				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

			<div class="header-elements d-none">
				<div class="breadcrumb justify-content-center">
					<a href="#" class="breadcrumb-elements-item">
						<i class="icon-comment-discussion mr-2"></i>
						Support
					</a>

					<div class="breadcrumb-elements-item dropdown p-0">
						<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
							<i class="icon-gear mr-2"></i>
							Settings
						</a>

						<div class="dropdown-menu dropdown-menu-right">
							<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
							<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
							<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="page-header-content header-elements-md-inline">
		        <div class="page-title d-flex">
                <div v-for="title in titles">
                   <ul class="media-list">
                        <li class="media">
                            <div class="mr-3">
                                 <img :src="'../../public/global_assets/images/placeholders/'+ title.icon" width="60" height="60" alt="">
                            </div>

                            <div class="media-body">
                               <h1 class="font-weight-bold text-primary">{{title.name}}</h1>
                                <h6 class="text-bold">
                                    <i class="icon-location4 text-success"></i> &nbsp; 
                                    <span class="text-warning">{{title.subtitle}}</span>
                                </h6>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>

			

			<div class="header-elements d-none mb-3 mb-md-0">
				<div class="d-flex justify-content-center">
				 
					
				</div>
			</div>
		</div>
	</div>
     
    
      
    <div class="page-content pt-0" >      
    <div class="content-wrapper">
        <div class="content">
           
            <!-- Linked lists -->
			<div class="row">
				    <div class="col-md-6">
				        <div class="card border-left-danger border-left-3 rounded-left-0">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">
								    <span class="font-weight-bold">
								        <i class="icon-calendar2 text-warning"></i> &nbsp; Tanggal & Waktu Permohonan
								    </span>
								</h6>
								<div class="header-elements">
								    <span class="badge badge-success font-weight-bold">WALKIN</span>
                                </div>
							</div>
							
							<div class="card-body">
								<span class="font-weight-bold font-size-lg text-primary">12/07/2019 - 14:05:13</span>
								<span class=" text-muted font-size-xs text-truncate d-inline-block">3 hari lalu</span>
								
								&nbsp;&nbsp;&nbsp;
								<span class="">FRONT OFFICE : </span>
								<span class="font-weight-bold">AFRIANDI</span>
								
								
							</div>
						</div>				        
				    </div>
				    <div class="col-md-6">
				        <div class="card bg-info">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">
								    <span class="font-weight-bold">
								        <i class="icon-stack-empty text-dark"></i> &nbsp; TRACKING BERKAS
								    </span>
								</h6>
								<div class="header-elements">
								    <span class="badge badge-success font-weight-bold">PROSES</span> &nbsp;&nbsp;
								    <span class="badge badge-warning font-weight-bold">DETAIL</span>
                                </div>
							</div>
							
							<div class="card-body">
								<span class="">POSISI BERKAS : </span>
								<span class="font-weight-bold"> RUANG DATA </span>
								
								&nbsp;&nbsp;
								<span class="">WAKTU : </span>
								<span class="font-weight-bold"> 3 MENIT </span>
							</div>
						</div>				        
				    </div>
				    
				    <div class="col-md-10">				        
				        <button type="button" class="btn btn-primary btn-sm btn-labeled btn-labeled-left">
				            <b><i class="icon-profile"></i></b> SERAH TERIMA
				        </button>
				        <button type="button" class="btn btn-warning btn-sm btn-labeled btn-labeled-left">
				            <b><i class="icon-file-check2"></i></b> CHECKLIST
				        </button>
				        <button type="button" class="btn btn-dark btn-sm btn-labeled btn-labeled-left btn-disabled">
				            <b><i class="icon-stack"></i></b> REKOMENDASI
				        </button>
				        <button type="button" class="btn btn-success btn-sm btn-labeled btn-labeled-left btn-disabled">
				            <b><i class="icon-bookmark"></i></b> SURAT KEPUTUSAN (SK)
				        </button>
				        
				        
				    </div>	
                    <div class="col-md-2">
                        <div class="pull-right">
                           <router-link :to="{ name: 'Dashboard'}" class="btn bg-purple btn-sm btn-labeled btn-labeled-left btn-disabled">
                               <b><i class="icon-home"></i></b> Dashboard
                            </router-link>
                        </div>
                	</div>
                	<div style="clear:both"></div>
				   <hr/>		    
				</div>
			<!-- /linked lists -->
           
            <perusahaan :perusahaanData="perusahaan"
                        @UpdatePerusahaan="UpdatePerusahaan"             
                        v-show="visible.perusahaan"></perusahaan>
            <anggota v-bind:pengurusData="pengurus" v-show="visible.pengurus"></anggota>
           
            <div class="row">
             <div class="col-md-12">
               <!-- Bordered striped table -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">DATA PERSYARATAN</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width='10px'>NO</th>
									<th>PERSYARATAN</th>
									<th width="150px" class="text-center">FILE</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(prs, index) in persyaratan">
								    <td>{{index+1}}</td>
								    <td>
								        {{prs.persyaratan}}
								    </td>
								    <td>
								        <div v-if="prs.file == null">
								            <button class="btn btn-sm btn-labeled btn-labeled-right btn-danger">
								                <b><i class="icon-shield-notice"></i></b> Belum <i>Upload</i>
								            </button>
								        </div>
								        <div v-if="prs.file != null">
								           <button class="btn btn-sm btn-labeled btn-labeled-left btn-success">
								                <b><i class="icon-shield-check"></i></b> <i>Uploaded</i> 
								            </button>
								        </div>
								    </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /bordered striped table -->    
                
            </div>
            </div>
        </div>
    </div>
    
    <!-- Right sidebar -->
	<div class="sidebar sidebar-dark sidebar-right sidebar-expand-md align-self-start">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
				<span class="font-weight-semibold">Right sidebar</span>
				<a href="#" class="sidebar-mobile-right-toggle">
					<i class="icon-arrow-right8"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Sub navigation -->
				<div class="card mb-2">
					<div class="card-header header-elements-inline">
						<h6 class="card-title">Navigation</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
	                		</div>
                		</div>
					</div>

					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item-header pt-0 mt-0">DATA</li>
							<li class="nav-item">
								<span class="nav-link btn btn-link" @click="showPerusahaan"><i class="icon-office text-success"></i> PERUSAHAAN</span>
							</li>
							<li class="nav-item">
								<span class="nav-link btn btn-link" @click="showPengurus"><i class="icon-users4 text-warning"></i>PENGURUS</span>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-user-plus"></i>
									Link with badge
									<span class="badge bg-primary badge-pill ml-auto">2</span>
								</a>
							</li>
							<li class="nav-item-divider"></li>
						</ul>
					</div>
				</div>
				<!-- /sub navigation -->


				<!-- Form sample -->
				<div class="card">
					<div class="card-body">
						<div class="form-group">
                            <label>CATATAN :</label>
                            <textarea rows="3" cols="3" class="form-control" placeholder="Default textarea"></textarea>
                        </div>
					</div>
				</div>
				<!-- /form sample -->

			</div>
			<!-- /sidebar content -->

		</div>
	<!-- /right sidebar -->
    </div>
    </div>
</template>

<script>
     import 'vuejs-noty/dist/vuejs-noty.css';
     import swal from 'sweetalert';
    
     import urlBase from '@/js/setting/urlBase';
     import perusahaan from '@/js/components/perusahaan/contentPerusahaan';
     import anggota from '@/js/components/perusahaan/contentAnggota';
    
     
    
     export default {
        mounted() {
            console.log('DETAIL Component mounted.')
        },
        data(){
            return{
                loading: false,
                permohonanId: this.$route.params.permohonan_id,
                titles:[{
                    name:"",
                    subtitle:"",
                    icon:''
                }],
                permohonan:{},
                pengurus:{},
                perusahaan:{},
                persyaratan:{},
                visible:{
                    perusahaan: false,
                    pengurus: false
                }
            }
        },
        created(){
            this.getPermohonan();  
        },
        methods:{
            getPermohonan(){
                this.loading = true,
                axios
                    .get(urlBase.urlAxios+'/permohonan/detail?permohonanId='+this.permohonanId)
                    .then(response => (
                        this.loading = false,
                        this.perusahaan = response.data[0].permohonan.getperusahaan,
                        this.pengurus = response.data[0].permohonan.getpengurus,
                        this.permohonan = response.data[0].permohonan,
                        this.persyaratan = response.data[0].permohonan.getpersyaratan,
                       
                    
                        this.titles[0].name = response.data[0].perusahaanNama,
                        this.titles[0].icon = response.data[0].icon,
                        this.titles[0].subtitle = response.data[0].permohonan.getperusahaan.alamat + " (" + response.data[0].permohonan.getperusahaan.contact + ")",
                        console.log("andi :"+response.data[0].permohonan.getpengurus)
                    ));
            },
            UpdatePerusahaan(response){
                this.perusahaan = response[0].perusahaan,
                this.titles[0].name = response[0].perusahaanNama,
                this.titles[0].icon = response[0].icon,
                this.titles[0].subtitle = response[0].perusahaan.alamat + " (" + response[0].perusahaan.contact + ")"
            },
            showPengurus(){
               
                this.visible.pengurus = !this.visible.pengurus
                if(this.visible.perusahaan == true){
                   this.visible.perusahaan = false
                }
            },
            showPerusahaan(){
                if(this.visible.pengurus == true){
                   this.visible.pengurus = false
                }
                this.visible.perusahaan = !this.visible.perusahaan
            },
        },
        components:{
            perusahaan,
            anggota
         }
    }
</script>

