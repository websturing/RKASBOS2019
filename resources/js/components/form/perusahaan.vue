<template>
    <div>
     <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">IDENTITAS PERUSAHAAN</legend>   
                                <div class="form-group row">
                                    <label class="col-form-label col-md-1">NAMA</label>
                                    <div class="col-md-2">
                                       <select name="status" class="form-control" :class="{'errorField': $v.form.select.$error}" v-model="form.select">
                                           <option value="0">-- pilih --</option>
                                           <option value="CV">CV</option>
                                           <option value="PT">PT</option>
                                           <option value="PERORANGAN">PERORANGAN</option>
                                           <option value="KELOMPOK">KELOMPOK</option>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="perusahaan_nama" class="form-control" :class="{'errorField': $v.form.name.$error}" placeholder="ketik nama perusahaan" v-model="form.name">
                                    </div>
                                </div>
                            </fieldset>
    </div>
</template>


<script>
    import { required, email, minLength, sameAs } from "vuelidate/lib/validators";
    export default {
        mounted(){
            console.log('mounted perusahaan form');
        },
        props:{
            'form':'',
            'submit':Function
        }
    }
</script>