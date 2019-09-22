<template>
    <div>
    <Breadcums v-bind:titles="titles"></Breadcums>
    <LoadingComp v-bind:loading="loading" slot="spiner"></LoadingComp>
        
    <div class="page-content pt-0" >      
    <div class="content-wrapper">
        <div class="content">
            <div class="col-md-10 offset-md-1">
               <div class="card">
                    <div class="card-header text-bold">
                        <center>FORMULIR PERMOHONAN IZIN / NONIZIN</center>
                    </div>
                
                <form action="" class="form-horizontal">
                <div class="card-footer" style="border-top:1px solid #dfdfdf">  
                    <div class="form-group row" style="margin-top:5px;">
                       <div class="col-md-4">
                       <div class="form-group form-group-feedback form-group-feedback-right">
                            <input type="text" class="form-control form-control-lg" 
                                v-model="form.permohonan.nomor"
                                :class="{'errorField': $v.form.permohonan.nomor.$error}" 
                                placeholder="Ketik Nomor Permohonan Perusahaan">
                            <div class="form-control-feedback form-control-feedback-lg">
                                <i class="icon-question4 btn-link"
                                    @click="pjsNomorPermohonan()" 
                                    style="cursor:pointer">
                                    
                                </i>
                            </div>
                        </div>
                        </div>
                       <div class="col-md-4">
                       <div class="form-group form-group-feedback form-group-feedback-right">
                            <select type="text" class="form-control" 
                                    placeholder="ketik Nomor Identitas" 
                                    :class="{'errorField': $v.form.permohonan.lokasi.$error}"
                                    v-model="form.permohonan.lokasi">
                                 <option value="">--PILIH LOKASI--</option>   
                                 <option value="ANAMBAS">ANAMBAS</option>   
                                 <option value="BATAM">BATAM</option>   
                                 <option value="BINTAN">BINTAN</option>  
                                 <option value="KARIMUN">KARIMUN</option> 
                                 <option value="LINGGA">LINGGA</option>    
                                 <option value="NATUNA">NATUNA</option>    
                                 <option value="TANJUNGPINANG">TANJUNGPINANG</option>    
                              </select>
                            <div class="form-control-feedback form-control-feedback-lg">
                                <i class="icon-question4 btn-link"
                                    @click="pjsNomorPermohonan()" 
                                    style="cursor:pointer">
                                    
                                </i>
                            </div>
                        </div>
                        </div>
                    </div>   
                </div>
                <div class="card-body py-0">   
                    <br/>
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">IDENTITAS PERUSAHAAN</legend>   
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">NAMA</label>
                            <div class="col-md-2">
                               <select name="status" class="form-control" 
                                  :class="{'errorField': $v.form.perusahaan.status.$error}"
                                  v-model="form.perusahaan.status">
                                   <option value="0">-- pilih --</option>
                                   <option value="CV">CV</option>
                                   <option value="PT">PT</option>
                                   <option value="PERORANGAN">PERORANGAN</option>
                                   <option value="KELOMPOK">KELOMPOK</option>
                               </select>
                            </div>
                            <div class="col-md-4">
                            <PerusahaanAuto 
                                v-model="form.perusahaan.nama"
                                :placeholderText="'Ketik Nama Perusahaan'"
                                :valueTxt="list.perusahaan"
                                filterby="nama"
                                @putperusahaanNama = "putperusahaanNama"
                                @DataAutoComplate="putPerusahaan">

                            </PerusahaanAuto>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">NPWP</label>
                            <div class="col-md-4">
                               <input type="text" class="form-control" 
                                   placeholder="ketik NPWP Perusahaan" 
                                   :class="{'errorField': $v.form.perusahaan.npwp.$error}"
                                   v-model="form.perusahaan.npwp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">ALAMAT</label>
                            <div class="col-md-4">
                               <textarea name="alamat" class="form-control" placeholder="Ketik Alamat Perusahaan.."
                                      :class="{'errorField': $v.form.perusahaan.alamat.$error}"
                                      v-model="form.perusahaan.alamat" rows="4"></textarea>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">KONTAK</label>
                            <div class="col-md-3">
                               <input type="text" name="perusahaan_email" class="form-control" 
                                   placeholder="ketik Email Perusahaan" 
                                   :class="{'errorField': $v.form.perusahaan.email.$error}"
                                   v-model="form.perusahaan.email">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="perusahaan_hp" class="form-control"  
                                    placeholder="ketik Nomor Telp Perusahaan"
                                    :class="{'errorField': $v.form.perusahaan.hp.$error}" 
                                    v-model="form.perusahaan.hp">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">IDENTITAS PERUSAHAAN PENGURUS</legend>  
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">NOMOR</label>
                            <div class="col-md-2">
                               <select name="prKategori" class="form-control FocusNP" 
                                      placeholder="Pilih Kategori Identitas" 
                                      :class="{'errorField': $v.form.pengurus.identitas_kategori.$error}" 
                                      v-model="form.pengurus.identitas_kategori"
                                      ref="FocusNP"
                                      >
                                   <option value="">-=== PILIH ===-</option>
                                   <option value="KTP">KTP</option>
                                   <option value="SIM">SIM</option>
                                   <option value="PASSPORT">PASSPORT</option>
                               </select>
                            </div>
                            <div class="col-md-4" >
                              <input type="text" name="prHp" class="form-control" 
                                    placeholder="ketik Nomor Identitas" 
                                    :class="{'errorField': $v.form.pengurus.identitas_no.$error}"
                                    v-model="form.pengurus.identitas_no">
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">NAMA </label>
                            <div class="col-md-5">
                               <PengurusAuto :placeholderText="'Ketik Nama Pengurus'"  
                                             :valueTxt="list.pengurus.pengurus"
                                             filterby="nama"
                                             @putpengurusnama = "putpengurusnama"
                                             @putpengurus = "putpengurus"
                                                       
                               ></PengurusAuto>
                            </div>
                            <div class="col-md-5" v-show="list.pengurus.show">
                                <i :class="list.pengurus.icon"></i> &nbsp;
                                <span class="text-primary btn btn-link" data-toggle="modal" data-target="#modal_large">
                                        {{list.pengurus.jumlah}}
                                </span>

                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">KONTAK </label>
                            <div class="col-md-2">
                               <input type="text" name="prEmail" class="form-control" 
                                   placeholder="ketik Email pengurus"
                                   :class="{'errorField': $v.form.pengurus.email.$error}"
                                   v-model="form.pengurus.email">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="prHp" class="form-control" 
                                    placeholder="ketik Nomor Telp pengurus" 
                                    :class="{'errorField': $v.form.pengurus.hp.$error}"
                                    v-model="form.pengurus.hp">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mb-3">

                       <hr/>
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center">NO</th>
                                    <th rowspan="2" class="text-center">PERSYARATAN</th>
                                    <th colspan="2" class="text-center">FILE</th>
                                    <th rowspan="2" class="text-center">KETERANGAN</th>
                                </tr>
                                <tr>
                                    <th class="text-center">ADA</th>
                                    <th class="text-center">TIDAK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr 
                                    v-for="(prs,index) in persyaratan" 
                                    :key="index"
                                    :class="{ 'table-danger' : (prs.status == 'false' ), 'table-success' : (prs.status == 'true' )}">
                                    <td>{{index+1}}</td>
                                    <td>{{prs.syarat}}</td>
                                    <td class="text-center">



                                        <input type="radio" class="option-input"
                                               :name="'persyaratan'+(index+1)" 
                                               :value="{opdi_id:prs.opdi_id,syarat:prs.syarat,status:'true',keterangan:prs.keterangan,filedata:prs.filedata,opdp_id:prs.opdp_id}" 
                                               v-model="persyaratan[index]">
                                    </td>
                                    <td class="text-center">
                                        <input type="radio" class="option-input" 
                                               :name="'persyaratan'+(index+1)" 
                                               :value="{opdi_id:prs.opdi_id,syarat:prs.syarat,status:'false',keterangan:prs.keterangan,filedata:prs.filedata,opdp_id:prs.opdp_id}" 
                                               v-model="persyaratan[index]"
                                               :checked="true">
                                    </td>
                                    <td>
                                       <input type="text" name="keterangansyarat" class="form-control" v-model="prs.keterangan">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                </form>
                <div class="card-footer">
                    
                    <button type="button" class="btn btn-primary text-bold" @click="submit()">PROSES PERMOHONAN</button>
                    <button type="button" class="btn btn-danger text-bold" @click="checklist()">BATAL</button>
                </div>
                    <div class="chart position-relative" id="traffic-sources"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <modalPengurus :perusahaan="terpilih.perusahaan" :pengurus="list.pengurus.pengurus"></modalPengurus>
        
    <!-- MODAL VERIFIKASI -->
    <div id="submit_verifikasi" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">VERIFIKASI PENGINPUTAN DATA</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <table>
                        <tr>
                            <td>NAMA PERUSAHAAN</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td>
                                <span class='text-lg'>{{form.perusahaan.nama}}</span>
                                <span class='text-sm text-bold'>({{form.perusahaan.status}})</span>
                            </td>
                        </tr>
                        <tr>
                            <td>NAMA IZIN</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td v-for="title in titles">
                                <span class='text-lg'>{{title.name}}</span>
                                <span class='text-sm text-bold'>({{title.subtitle}})</span>
                            </td>
                        </tr>
                        <tr>
                            <td>PERSYARATAN KURANG</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td class="text-danger text-bold">
                                {{form.persyaratan.falsed}} 
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    <div class="col-lg-8">
                        <label>CATATAN PERMOHONAN</label>
                        <textarea class="form-control" 
                            v-model="form.permohonan.catatan"    
                            placeholder="Ketik Catatan"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <div v-if="button.InsertLoading">
                        <button type="button" class="btn btn-default btn-loading">
		                    <i class='icon-spinner4 spinner mr-2'></i> Loading...
	                     </button>
                    </div>
                    <div v-if="button.Insert">
                        <button type="button" class="btn btn-success" @click="InsertForm()">PROSES</button>
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
     import Breadcums from '@/js/components/template/breadcums';
     import urlBase from '@/js/setting/urlBase';
     import LoadingComp from '@/js/components/template/loadingComponent';
     import PerusahaanAuto from '@/js/components/template/autoComplate';
     import PengurusAuto from '@/js/components/template/autoComplate';
     import modalPengurus from '@/js/components/perusahaan/modalAnggota';
    
     import 'vuejs-noty/dist/vuejs-noty.css';
     import swal from 'sweetalert';
     import { required, email, minLength, sameAs } from "vuelidate/lib/validators";
    
     export default {
        mounted() {
            console.log('form Component mounted.')
        },
        data(){
            return{
                selected:true,
                loading: false,
                izinId: this.$route.params.opdiId,
                titles : [],
                form: {
                    perusahaan:{
                        perusahaan_id:'',
                        nama:'',
                        status:'',
                        alamat:'',
                        email:'',
                        hp:'',
                        npwp:''
                    },
                    pengurus:{
                        perusahaanp_id:'',
                        identitas_kategori:'',
                        identitas_no:'',
                        nama:'',
                        email:'',
                        hp:'',
                    },
                    persyaratan:{
                        falsed : '',
                        total : '',
                        
                    },
                    permohonan:{
                        nomor:'',
                        lokasi:'',
                        catatan:''
                    },
                    opd:{
                        opd_id: this.$route.params.opdId,
                        opdi_id: this.$route.params.opdiId
                    }
                },
                persyaratan:{},
                list:{
                    perusahaan:{},
                    pengurus:{},
                },
                terpilih:{
                    perusahaan:{}
                },
                button:{
                    InsertLoading:false,
                    Insert:true,
                }
            }
        },
        created(){
          this.fetchData();  
          this.getFormulir();
          this.getPerusahaan();
        },
        validations: {
            form: {
                perusahaan:{
                        nama:{ required },
                        status:{ required },
                        alamat:{ required },
                        email:{ required },
                        hp:{ required },
                        npwp:{ required },
                },
                permohonan:{
                        nomor:{ required },
                        lokasi:{ required },
                },
                pengurus:{
                    identitas_kategori:{ required },
                    identitas_no:{ required },
                    email:{ required },
                    hp:{ required },
                },
            }
        },
        methods:{
            fetchData() {
                this.loading = true;
                axios
                    .get(urlBase.urlAxios+'/permohonan/formulir?q=titles&data='+this.izinId)
                    .then(response => (
                        this.loading = false,
                        this.titles = response.data,
                        console.log(response.data)
                    ));
            },
            submit() {
              this.$v.form.$touch();
                  
                
                
              // if its still pending or an error is returned do not submit
              if (this.$v.form.$pending || this.$v.form.$error) {
                  
                             
                  this.$noty.error("FORMULIR BERLUM TERISI SEMUA ...", {
                      killer: true,
                      timeout: 6000,
                      layout: 'topLeft'
                    });
                  
             return;
              }  
             
             this.checklist();    
             $("#submit_verifikasi").modal("show");
              // to form submit after this
              
            },
            getFormulir(){
                axios
                    .get(urlBase.urlAxios+'/permohonan/formulir?q=formulir&data='+this.izinId)
                    .then(response => (
                        this.loading = false,
                        this.persyaratan = response.data,
                        this.izin = response.data,
                        console.log(response.data)
                    ));
            },
            getPerusahaan(){
                axios
                    .get(urlBase.urlAxios+'/perusahaan/list')
                    .then(response => (
                        this.loading = false,
                        this.list.perusahaan = response.data,
                        
                        console.log("perusahaanlist :"+response.data)
                    ));
            },
            getPengurus(id){
                 axios
                    .get(urlBase.urlAxios+'/perusahaan/pengurus?id='+id)
                    .then(response => (
                        this.loading = false,
                        this.list.pengurus = response.data,
                        console.log("pengurus :"+response.data)
                    ));
            },
            putPerusahaan(data){
                              
                this.form.perusahaan.perusahaan_id = data.perusahaan_id;
                this.form.perusahaan.npwp = data.npwp;
                this.form.perusahaan.status = data.status;
                this.form.perusahaan.alamat = data.alamat;
                this.form.perusahaan.email = data.email;
                this.form.perusahaan.hp = data.contact;
                this.form.perusahaan.nama = data.nama;
                
                this.getPengurus(data.perusahaan_id);
                
                this.form.pengurus.nama = null;
                this.form.pengurus.email = null;
                this.form.pengurus.hp = null;
                this.form.pengurus.identitas_kategori = null;
                
            },
            putpengurusnama(data){
                this.form.pengurus.nama = data;
                console.log("pengurus :"+data);
            },
            putpengurus(data){
                this.form.pengurus.nama = data.nama;
                this.form.pengurus.email = data.email;
                this.form.pengurus.hp = data.contact;
                this.form.pengurus.identitas_kategori = data.identitas_jenis;
                this.form.pengurus.perusahaanp_id = data.perusahaanp_id;
                console.log("put pengurus :"+data.nama);
            },
            putperusahaanNama(nama){
                console.log(nama);
                
                this.form.perusahaan.nama = nama;
            },
            checklist(){
                var count = 0;
                var data = 1;
                
              
                for(var i = 0; i < this.persyaratan.length; i++){
                   
                    if(this.persyaratan[i].status === 'true'){
                        count = data++;
                       
                    }
                    
                }
                
                
                
                this.form.persyaratan.falsed = (this.persyaratan.length - count);
                this.form.persyaratan.total = this.persyaratan.length;
               
               
            },
            InsertForm(){
                var params = {
                    perusahaan : this.form.perusahaan,
                    pengurus : this.form.pengurus,
                    persyaratan : this.persyaratan,
                    opd: this.form.opd,
                    permohonan : this.form.permohonan
                }
                
                 this.button.InsertLoading = true, 
                 this.button.Insert = false, 
                
                 axios
                    .get(urlBase.urlAxios+'/permohonan/InsertForm', {'params': params})
                    .then(data => (  
                        $("#submit_verifikasi").modal("hide"),
                     
                        this.$router.push({ path: '/permohonan/detail/'+data.data}),
                        console.log("INSERT :"+data),
                        this.$noty.info("DATA BERHASIL DI REKAM ...", {
                          killer: true,
                          timeout: 6000,
                          layout: 'topLeft'
                        })
                        
                    ))
                     .catch(error => {
                      console.log(error.message);
                    });
            },
            
            pjsNomorPermohonan(){
                swal({
                      title: "Informasi",
                      text: "ketik 'PG-0001' apabila permohonan tidak ada nomor dari Perusahaan",
                    });
            }
            
        },
        components:{
            Breadcums,
            LoadingComp,
            PerusahaanAuto,
            PengurusAuto,
            modalPengurus
            
         }
    }
</script>



<style scoop>
    .errorField {
      border-color: red;
      background: #FDD;
    }
    
@keyframes click-wave {
  0% {
    height: 20px;
    width: 20px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 80px;
    width: 80px;
    margin-left: -60px;
    margin-top: 0px;
    opacity: 0;
  }
}

    
    
.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top:-3px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 20px;
  width: 20px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #40e0d0;
}
.option-input:checked::before {
  height: 20px;
  width: 20px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 16.66667px;
  text-align: center;
  line-height: 20px;
}
.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}
    .FocusNP:focus{
        border: 1px solid blue;
        background: black;
    }
    
.swal-title {
  margin: 0px;
  top:-10px;
  padding: 0px 0px 10px 0px;
  font-size: 11px;
  box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.21);
  margin-bottom: 28px;
}
    
.swal-footer {
  background-color: rgb(245, 248, 250);
  margin-top: 32px;
  border-top: 1px solid #E9EEF1;
  overflow: hidden;
}
    

</style>