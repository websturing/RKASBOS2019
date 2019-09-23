<template>
<div>
   <loading v-show="show.Loading"></loading>
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
                     <vue-xlsx-table @on-select-file="handleSelectedFile">
                       <b><i class="icon-upload7"></i></b>&nbsp; Import File Exel
                    </vue-xlsx-table>
                    <router-link :to="{ name: 'SekolahForm'}" class="btn btn-sm btn-success btn-labeled btn-labeled-left">
                        <b><i class="icon-plus-circle2"></i></b> 
                        Tambah Data
                    </router-link>
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
				    <span class="font-weight-bold text-primary">{{title.name}}</span>
            
				</h2>
				
			</div>

			<div class="header-elements d-none py-0 mb-8 mb-md-0">
				   <div class="card border-right-danger border-right-3">
				       <div class="card-body">
				            Table yang terlihat belum masuk ke database RKAS sebelum di klik tombol proses
				       </div>
				   </div>
			</div>
		</div>
	</div>
   <!--- Page Content -->
    <div class="page-content pt-0" >           
        <div class="content-wrapper">
            <div class="content">
                  <button type="button" class="btn btn-sm btn-danger" @click="emptyTbale()" :disabled="disabled.hapusImportBtn ? false : true">
                    <b><i class="icon-trash"></i></b>&nbsp;
                    Hapus
                </button>
                <vue-xlsx-table @on-select-file="handleSelectedFile">
                   <b><i class="icon-upload7"></i></b>&nbsp; Pilih File Exel
                </vue-xlsx-table>
                <hr/>
               <div class="card">
                   <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-bold">
                            PREVIEW IMPORT DATA SEKOLAH PROVINSI KEPULAUAN RIAU
                        </h6>
                        <div class="header-elements">
                            <div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
                                <label class="form-check-label">
                                    TOTAL SEKOLAH  : &nbsp;
                                    <span class="badge badge-info">{{imports.total}}</span>
                                </label>
                                 <label class="form-check-label">
                                    KATEGORI  : &nbsp;
                                    <span class="badge badge-success">{{imports.kategori}}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                   <table class="table table-bordered table-xs">
                        <thead>
                            <th width="10">NO</th>
                            <th>NAMA</th>
                            <th>STATUS</th>
                            <th>KECAMATAN</th>
                            <th>KAB/KOTA</th>
                        </thead>
                        <tbody>
                            <tr v-for="(im, index) in imports.data">
                                <td>{{index+1}}</td>
                                <td>
                                   <div class="d-flex align-items-center">
                                        <div>
                                            <a href="#" class="text-default font-weight-bold font-size-lg">
                                            {{im.NAMA_SEKOLAH}}</a>
                                            <div class="text-muted font-size-sm">
                                                <i class="icon-location4 text-success font-size-xs"></i>
                                               {{im.ALAMAT}} ({{im.KODE_POS}})
                                            </div>
                                            <div class="text-muted font-size-sm">
                                               <i class="icon-envelop4 text-dark font-size-xs"></i>
                                               {{im.EMAIL}}
                                               &nbsp;&nbsp;
                                               <i class="icon-phone font-size-xs"></i>
                                               {{im.TELP_SEKOLAH}}
                                               &nbsp;&nbsp;
                                               <i class="icon-sphere font-size-xs"></i>
                                               {{im.WEBSITE}}
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                   <span>
                                    {{im.STATUS_SEKOLAH}}
                                   </span>
                                </td>
                                <td>
                                   <span>
                                    {{im.KECAMATAN}}
                                   </span>
                                </td>
                                <td>{{im.KABKOTA}}</td>
                            </tr>
                        </tbody>
                    </table>
                   <div class="card-footer">
                       <button type="button" class="btn btn-primary"
                       :disabled="disabled.prosesImportBtn ? false : true"
                       >Proses</button>
                   </div>  
               </div>
            </div>
        </div>
    </div>            
</div> 
</div>
</template>

<style>
.LoadingOverley{
    display: inline-block;
    position: absolute;
    color:#fff;
    z-index:9999 !important;
    font-weight:bold;
    top: 54%;
    left:49%;


}
#overlayer {
  top:0px;
  width:100%;
  height:100%;  
  position:absolute;
  z-index: 9999 !important;
  background-color: rgba(0,0,0,0.5);
}
.loader {
  display: inline-block;
  width: 30px;
  height: 30px;
  position: absolute;
  z-index:9999 !important;
  border: 4px solid #Fff;
  top: 50%;
  left:50%;
  animation: loader 2s infinite ease;
}

.loader-inner {
  vertical-align: top;
  display: inline-block;
  width: 100%;
  background-color: #fff;
  animation: loader-inner 2s infinite ease-in;
}

@keyframes loader {
  0% {
    transform: rotate(0deg);
  }
  
  25% {
    transform: rotate(180deg);
  }
  
  50% {
    transform: rotate(180deg);
  }
  
  75% {
    transform: rotate(360deg);
  }
  
  100% {
    transform: rotate(360deg);
  }
}

@keyframes loader-inner {
  0% {
    height: 0%;
  }
  
  25% {
    height: 0%;
  }
  
  50% {
    height: 100%;
  }
  
  75% {
    height: 100%;
  }
  
  100% {
    height: 0%;
  }
}
</style>

<script>
  
    import Breadcums from '@/js/components/template/breadcums';
    import Sidebar from '@/js/components/template/sidebar';
    import urlBase from '@/js/setting/urlBase';
    import LoadingComp from '@/js/components/template/loadingComponent';
    import loading from '@/js/components/template/loading';
    
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
                imports :{
                    data :[],
                    total : null,
                    kategori : null,
                },
                show:{
                    SekolahTable : true,
                    ImportTable : false,
                    Loading:false,
                },
                disabled:{
                    hapusImportBtn : true,
                    prosesImportBtn : false
                }
            }
          
        },
        methods: {
            handleSelectedFile (e) {
                this.show.Loading = true
                setTimeout(() => {
                    this.disabled.hapusImportBtn = true
                    this.disabled.prosesImportBtn = true
                    this.show.Loading = false
                    this.title.name = "Import Data Sekolah"
                    this.show.SekolahTable = false
                    this.show.ImportTable = true

                    let body = e.body
                    let header = e.header
                    this.imports.data = body
                    this.imports.total = body.length
                    this.imports.kategori = body[0].BENTUK_PENDIDIKAN 
                },2000);
                
                
                
                
            },
            emptyTbale(){
                    $.confirm({
                    title: false,
                    content: 'Hapus Data ini ?',
                    type: 'red',
                    closeAnimation: 'RotateXR',
                    typeAnimated: true,
                    buttons: {
                        Hapus: {
                            text: 'Hapus',
                            btnClass: 'btn-red',
                            action: (e) => {
                                this.disabled.hapusImportBtn = false
                                this.disabled.prosesImportBtn = false
                                this.imports.data = [];
                                this.imports.total = null;
                                this.imports.kategori = null;
                               
                            }
                        },
                        close: function () {
                        }
                    }
                });
            }
        },
        components:{
            Breadcums,
            Sidebar,
            loading
        }
    }
</script>