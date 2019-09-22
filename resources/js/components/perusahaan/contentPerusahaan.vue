<template>
    <div>
        <div class="card">
            <div class="card-header  bg-primary header-elements-inline">
                <h6 class="card-title font-weight-bold">IDENTITAS PERUSAHAAN</h6>
                
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <div class="custom-container"></div>
               
                <fieldset class="mb-3">                           
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">NAMA</label>
                            <div class="col-md-2">
                               <select name="status" class="form-control" v-model="perusahaanData.status">
                                   <option value="0">-- pilih --</option>
                                   <option value="CV">CV</option>
                                   <option value="PT">PT</option>
                                   <option value="PERORANGAN">PERORANGAN</option>
                                   <option value="KELOMPOK">KELOMPOK</option>
                               </select>
                            </div>
                            <div class="col-md-6">
                                   <input type="text" class="form-control"
                                       v-model="perusahaanData.nama" 
                                       placeholder="ketik NPWP Perusahaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">NPWP</label>
                            <div class="col-md-4">
                               <input type="text" class="form-control" 
                                   v-model="perusahaanData.npwp"
                                   placeholder="ketik NPWP Perusahaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">ALAMAT</label>
                            <div class="col-md-4">
                               <textarea name="alamat" class="form-control" 
                                       v-model="perusahaanData.alamat"
                                       placeholder="Ketik Alamat Perusahaan.."
                                       rows="4"></textarea>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">KONTAK</label>
                            <div class="col-md-3">
                               <input type="text" class="form-control"
                                   v-model="perusahaanData.email" 
                                   placeholder="ketik Email Perusahaan">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control"
                                    v-model="perusahaanData.contact"  
                                    placeholder="ketik Nomor Telp Perusahaan">
                            </div>
                        </div>
                    </fieldset>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary" @click="dialog()">Update</button>
                <button class="btn btn-danger" type="reset">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>
     import urlBase from '@/js/setting/urlBase';
    export default {
        mounted() {
            console.log('DETAIL Component mounted.'),
            console.log("content perusahaan :"+this.perusahaanData)
        },
        data(){
            return{
                perusahaan: "",
            }
        },
        props:['perusahaanData'],
        data(){
            return {
                perusahaan:{}
            }
           
        },
        methods:{
            dialog(){
                           
               this.$dialog
                    .confirm('RUBAH DATA INI ?',{
                        loader: true
                    })
                    .then(dialog => {
                        this.update(dialog)
                        console.log('Clicked on proceed')
                    })
                    .catch(function () {
                        console.log('Clicked on cancel')
                    });
            },
            update(dialog){
                
                 var params = {
                    perusahaan : this.perusahaanData,
                }
                
                 axios
                    .get(urlBase.urlAxios+'/perusahaan/UpdateData', {'params': params})
                    .then(data => (  
                        console.log("updated:"+data.data),
                        this.$emit("UpdatePerusahaan",data.data),
                        this.$noty.success("DATA BERHASIL DI REKAM ...", {
                          killer: true,
                          timeout: 3000,
                          layout: 'topRight'
                        }),
                        dialog.close()
                        
                    ))
                     .catch(error => {
                      console.log(error.message);
                    });
                
               
            }
        }
       
    }
</script>


