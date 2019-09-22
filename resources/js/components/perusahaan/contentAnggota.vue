<template>
    <div>
        <div class="card">
            <div class="card-header  bg-dark">
                <h6 class="card-title font-weight-bold">IDENTITAS PENGURUS</h6>
            </div>
            <div class="card-body">
                <fieldset class="mb-3"> 
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">NOMOR</label>
                            <div class="col-md-2">
                               <select class="form-control FocusNP" 
                                      placeholder="Pilih Kategori Identitas" 
                                      v-model="pengurusData.identitas_jenis">
                                   <option value="">-=== PILIH ===-</option>
                                   <option value="KTP">KTP</option>
                                   <option value="SIM">SIM</option>
                                   <option value="PASSPORT">PASSPORT</option>
                               </select>
                            </div>
                            <div class="col-md-4" >
                              <input type="text" class="form-control" 
                                    placeholder="ketik Nomor Identitas" 
                                    v-model="pengurusData.identitas_no">
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">NAMA </label>
                            <div class="col-md-5">
                               <input type="text" class="form-control" 
                                   placeholder="ketik Email pengurus"
                                   v-model="pengurusData.nama">
                            </div>                           
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-1">KONTAK </label>
                            <div class="col-md-5">
                               <input type="text" class="form-control" 
                                   placeholder="ketik Email pengurus"
                                   v-model="pengurusData.email">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" 
                                    placeholder="ketik Nomor Telp pengurus"
                                    v-model="pengurusData.contact">
                            </div>
                        </div>
                    </fieldset>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('DETAIL Component mounted.')
            console.log('DETAIL Component mounted.')
        },
        data(){
            return{
                perusahaan: "",
            }
        },
        props:['pengurusData'],
               
    }
</script>


