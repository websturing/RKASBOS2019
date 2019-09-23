<template>
<div>
   <loading v-show="show.Loading"></loading>
    <div v-show="show.SekolahTable">
   <!--- header breadcums -->
   <div class="page-header">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h2>
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
                   <div class="card">
                   <div class="card-body">
                   <fieldset>
                       <legend class="font-weight-bold">Data Sekolah</legend>
                       
                       <div class="form-group row">
                            <div class="col-md-4">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama Sekolah">
                                </div>
                            <div class="col-md-2">
                                    <label>Status</label>
                                    <select class="form-control" placeholder="Negri / Status">
                                         <option value="">-- status --</option>
                                         <option value="Negeri">Negri</option>
                                         <option value="Swasta">Swasta</option>
                                    </select>
                                </div>
                            <div class="col-md-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email Sekolah">
                                </div>
                            <div class="col-md-3">
                                    <label>Website</label>
                                    <input type="text" class="form-control" placeholder="Website Sekolah">
                                </div>
                        </div>
                       <div class="form-group row">
                          <div class="col-md-4">
                                <label>Alamat</label>
                             <textarea class="form-control" placeholder="Alamat Sekolah"></textarea>
                         </div>
                        <div class="col-md-2">
                                <label>Kode Wilayah</label>
                             <input class="form-control" placeholder="Kode Wilayah Sekolah">
                        </div>
                        <div class="col-md-2">
                             <label>Kecamatan</label>
                             <input class="form-control" placeholder="Kecamatan Sekolah">
                        </div>
                        <div class="col-md-2">
                             <label>Kabupaten / Kota</label>
                             <input class="form-control" placeholder="Kabupaten/Kota Sekolah">
                        </div>
                        <div class="col-md-2">
                             <label>Kode Pos</label>
                             <input class="form-control" placeholder="Kode Pos Sekolah">
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-md-2">
                             <label>Jenjang</label>
                             <select class="form-control">
                                 <option value="">-== Jenjang ==-</option>
                                 <option value="SD">SD</option>
                                 <option value="SMP">SMP</option>
                                 <option value="SMA">SMA</option>
                                 <option value="SLB">SLB</option>
                             </select>
                        </div>
                        <div class="col-md-2">
                             <label>ID Sekolah</label>
                             <input class="form-control" placeholder="ID Sekolah">
                        </div>
                        <div class="col-md-2">
                             <label>NPSN</label>
                             <input class="form-control" placeholder="NPSN Sekolah">
                        </div>
                        <div class="col-md-2">
                             <label>Partisipasi Bos</label>
                             <input class="form-control" placeholder="Partisipasi Sekolah">
                        </div>
                        </div>
                   </fieldset>
                   <fieldset>
                       <legend class="font-weight-bold">Bank</legend>
                       <div class="form-group row">
                          <div class="col-md-4">
                             <label>Nama Bank</label>
                             <input class="form-control" placeholder="Bank Sekolah">
                         </div>
                        <div class="col-md-2">
                                <label>Nama Rekening</label>
                             <input class="form-control" placeholder="Nama Rekening Sekolah">
                        </div>
                        <div class="col-md-2">
                             <label>No Rekening</label>
                             <input class="form-control" placeholder="Kecamatan Sekolah">
                        </div>
                        <div class="col-md-2">
                             <label>Cabang KCP</label>
                             <input class="form-control" placeholder="Kabupaten/Kota Sekolah">
                        </div>
                        </div>
                   </fieldset>
                   </div>
                   <div class="card-footer">
                       <button type="button" class="btn btn-primary btn-sm">Simpan</button>
                   </div>
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
    import loading from '@/js/components/template/loading';
    
    export default{
        mounted(){
            console.log('Sekolah')
        },
        data(){
            return {
                title :{
                    name : "Formulir Pengisian Data Sekolah",
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