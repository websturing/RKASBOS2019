<template>
<div>
      <div class="row">
          <div class="col-md-4">
              <input type="text" v-model="local" class="form-control" @keyup="SrcPeropd(local)" placeholder="ketik OPD">
          </div>
      </div>
      <br/>
        
   <div class="row">
    <div class="col-md-4" v-for="(a,index) in peropd">
        <div class="card">           
            <div class="card-body min-height">
                <h5 class="card-title">{{a.opd}}</h5>
                <p class="card-text"></p>
            </div>

                <div class="card-footer bg-dark text-white d-flex justify-content-between">
                    <span class="font-size-sm text-uppercase font-weight-semibold">Jumlah Izin : {{a.izin_count}}</span>
                    <span class="font-size-sm text-uppercase text-success font-weight-semibold"></span>
                </div>
            </div>
		</div>	
   </div>
</div>
</template>


<script>
    export default {
        data(){
          return{
              local:null
          }  
        },
         mounted() {
            console.log('mounted peropd');  
             this.SrcPeropd(this.local);
           
        },
        props:{
            "peropd" : null,
            "SrcPeropd": Function,
        }
    }
</script>
<style scoop>
    .min-height{
        min-height:120px;
    }
</style>