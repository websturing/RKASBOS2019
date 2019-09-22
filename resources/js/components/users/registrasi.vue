<template>
<div>
    
    <Breadcums v-bind:titles="titles"></Breadcums>
    
    <div class="page-content pt-0" >      
    <div class="content-wrapper">
        <div class="content">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                <div class="card-header font-weight-bold">
                    <center>FORM KELENGKAPAN DATA PENGGUNA</center>
                </div>
                
                <div class="card-body">
                    <fieldset>
                        <legend>IDENTITAS ACCOUNT</legend>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" 
                                        placeholder="Nama Lengkap"
                                        :class="{'errorField': $v.form.nama.$error}"
                                        v-model="form.nama">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Jenis Kelamin</label>
                                    <select class="form-control" 
                                            :class="{'errorField': $v.form.jk.$error}"
                                            v-model="form.jk">
                                        <option value="">-== Jenis Kelamin ==-</option>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" 
                                        placeholder="Tanggal Lahir"
                                        :class="{'errorField': $v.form.tglLahir.$error}"
                                        v-model="form.tglLahir">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Alamat</label>
                                    <textarea class="form-control" rows="4"
                                              placeholder="Alamat Lengkap"
                                              :class="{'errorField': $v.form.alamat.$error}"    
                                              v-model="form.alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input type="text" class="form-control" 
                                           placeholder="Email@example.com"
                                           :class="{'errorField': $v.form.email.$error}"
                                           v-model="form.email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Hp</label>
                                    <input type="text" class="form-control" 
                                           placeholder="Nomor Hp"
                                           :class="{'errorField': $v.form.hp.$error}"
                                           v-model="form.hp">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                
                <div class="card-footer">
                    <button type="button" class="btn btn-primary text-bold" @click="simpan()">SIMPAN</button>
                    <button type="button" class="btn btn-danger text-bold">BATAL</button>
                </div>
                    <div class="chart position-relative" id="traffic-sources"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</template>


<script>
    import Breadcums from '@/js/components/template/breadcums';
    import urlBase from '@/js/setting/urlBase';
    import { required, email, minLength, sameAs } from "vuelidate/lib/validators";
    
    
    export default{
        mounted(){
            console.log('resgtrasi users')
        },
        data(){
          return {
              form : {
                  nama:null,
                  jk:null,
                  tglLahir:null,
                  alamat:null,
                  hp:null,
                  email:null
              }
          }  
        },
        validations: {
            form:{
                nama:{ required },
                jk:{ required },
                tglLahir:{ required },
                alamat:{ required },
                hp:{ required },
                email:{ required },
            },
        },
        methods:{
          simpan(){
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
          }  
        },
        components:{
            Breadcums
        }
    }
    
</script>