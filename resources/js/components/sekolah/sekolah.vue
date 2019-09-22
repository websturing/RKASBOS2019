<template>
<div>
    <div v-show="show.SekolahTable">
   <!--- header breadcums -->
   <div class="page-header">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h2>
                    <i class="icon-library2 h1 no-margin no-padding"></i> &nbsp;&nbsp;
				    <span class="font-weight-bold text-primary">{{title.name}}</span>
				</h2>
				
			</div>

			<div class="header-elements d-none py-0 mb-8 mb-md-0">
				
			</div>
		</div>
	</div>
   <!--- Page Content -->
    <div class="page-content pt-0" >
            <Sidebar/>
           
            <div class="content-wrapper">
                <div class="content">
                      <button type="button" class="btn btn-sm btn-success btn-labeled btn-labeled-left">
                        <b><i class="icon-file-spreadsheet"></i></b> 
                        Import Data
                    </button>
                    <button type="button" class="btn btn-sm btn-primary btn-labeled btn-labeled-left">
                        <b><i class="icon-plus-circle2"></i></b> 
                        Tambah Data
                    </button>
                    <vue-xlsx-table @on-select-file="handleSelectedFile"></vue-xlsx-table>
                    <hr/>
                   <div class="card">
                       <div class="card-header header-elements-inline">
                            <h6 class="card-title font-weight-bold">Daftar Sekolah Provinsi kepulauan Riau</h6>
                            <div class="header-elements">
                                <div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
                                    <label class="form-check-label">
                                        Total Sekolah:
                                        <span class="badge badge-info">100</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                       
                       <table class="table table-bordered table-xs">
                            <thead>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                                <th>EMAIL</th>
                                <th>TELP</th>
                                <th>STATUS</th>
                                <th>KAB/KOTA</th>
                            </thead>
                        </table>  
                   </div>
                </div>
            </div>
            
        </div>            
</div>
    <div v-show="show.ImportTable">
   <!--- header breadcums -->
   <div class="page-header">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h2>
                    <i class="icon-library2 h1 no-margin no-padding"></i> &nbsp;&nbsp;
<!--				    <span class="font-weight-bold text-primary">{{title.name}}</span>-->
				    <span class="font-weight-bold text-warning">Import Daftar Sekolah</span>
            
				</h2>
				
			</div>

			<div class="header-elements d-none py-0 mb-8 mb-md-0">
				<div class="card bg-danger">
				   
				</div> 
			</div>
		</div>
	</div>
   <!--- Page Content -->
    <div class="page-content pt-0" >           
            <div class="content-wrapper">
                <div class="content">
                      <button type="button" class="btn btn-sm btn-danger">
                        <b><i class="icon-trash"></i></b>&nbsp;
                        Hapus
                    </button>
                    <vue-xlsx-table @on-select-file="handleSelectedFile">
                        Pilih File Exel
                    </vue-xlsx-table>
                    <hr/>
                   <div class="card">
                       <div class="card-header header-elements-inline">
                            <h6 class="card-title font-weight-bold">
                                Preview Data Sekolah
                            </h6>
                            <div class="header-elements">
                                <div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
                                    <label class="form-check-label">
                                        Total Sekolah:
                                        <span class="badge badge-info">100</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                       
                       <table class="table table-bordered table-xs">
                            <thead>
                                <th width="10">NO</th>
                                <th>NAMA</th>
                                <th>STATUS</th>
                                <th>KAB/KOTA</th>
                            </thead>
                            <tbody>
                                <tr v-for="(im, index) in imports">
                                    <td>{{index+1}}</td>
                                    <td>
                                       <div class="d-flex align-items-center">
                                            <div>
                                                <a href="#" class="text-default font-weight-bold font-size-lg">
                                                {{im.NAMA_SEKOLAH}}</a>
                                                <div class="text-muted font-size-sm">
                                                    <i class="icon-location4 text-success font-size-xs"></i>
                                                   {{im.ALAMAT}}
                                                </div>
                                                <div class="text-muted font-size-sm">
                                                   <i class="icon-envelop4 text-dark font-size-xs"></i>
                                                   {{im.EMAIL}}
                                                   &nbsp;&nbsp;
                                                   <i class="icon-phone font-size-xs"></i>
                                                   {{im.TELP_SEKOLAH}}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td>
                                       <span 
                                       :class="{'badge badge-primary' : im.STATUS_SEKOLAH === 'Negeri'}" >
                                        {{im.STATUS_SEKOLAH}}
                                       </span>
                                    </td>
                                    <td>{{im.KABKOTA}}</td>
                                </tr>
                            </tbody>
                        </table>  
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
            console.log('Sekolah')
        },
        data(){
            return {
                title :{
                    name : "Daftar Data Sekolah",
                    subtitle : "Provinsi Kepulauan Riau"
                },
                imports :[],
                show:{
                    SekolahTable : false,
                    ImportTable : true,
                }
            }
          
        },
        methods: {
            handleSelectedFile (e) {
                let body = e.body;
                let header = e.header;
                this.imports = body;
                console.log(e);
                console.log(body);
                console.log(header);
            }
        },
        components:{
            Breadcums,
            Sidebar
        }
    }
</script>