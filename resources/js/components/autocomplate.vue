   <template>
    <div class="col-sm-12 autocomplate" style="position:relative">
        <input type="text" class="form-control" placeholder="Ketik Nama izin / nonizin"  
            v-model="autoSearch"
            @keydown.up="up"
            @keydown.down="down"
            @keydown.enter="SelectItem">
        <div class="popoverATC">
            <div class="optionsACT" ref="opstionsACTList">
                <ul>
                    <li v-for="(match,index) in matches"
                        
                        :key="match[filterby]"
                        :class="{ 'selected' : (selected == index)}"
                        v-text="match[filterby]"
                        @click="itemClick(index)"
                    >
                        {{match}}
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-75 mx-auto mb-3"></div>
        
        
        
    </div>
    
</template>


<script>
    import urlBase from '@/js/setting/urlBase';
    
    export default {
        mounted(){
            console.log('autocomplate');
        },
        props:[ "izinlist","filterby"],
        data(){
          return {
            Selectitem:null,
            itemHeight:37,
            selected:0,
            autoSearch:'',
            visible:false,
          }  
        },
        methods:{
             toggleVisible(){
                this.visible = !this.visible;
            },
            itemClick(index){
                console.log(this.matches[index]);
                this.selected = index;
                this.SelectItem();
            },
            SelectItem(index){
                console.log(this.Selectitem = this.matches[this.selected]);
                this.$router.push({ path: '/form/permohonan/'+this.matches[this.selected]['opdi_id']+'/'+this.matches[this.selected]['opd_id']});
                
            },
            up(){
                if(this.selected == 0){
                    return;
                }
                this.selected -= 1;
                this.scrollToItem();
            },
            down(){
                if(this.selected >=this.matches.length -1){
                    return;
                }
                this.selected += 1;
                this.scrollToItem();
            },
            scrollToItem(){
                this.$refs.opstionsACTList.scrollTop = this.selected * this.itemHeight;
            }
        },
        computed:{
            matches(){
                this.$emit('atchange', this.autoSearch);
                
                if(this.autoSearch === ''){
                    return [];
                }
  
                return this.izinlist.filter((opd) => opd[this.filterby].toLowerCase().includes(this.autoSearch.toLowerCase()));
            }
        }
    }
</script>
<style>
    .optionsACT{
        max-height: 150px;
        overflow-y: scroll;
    }
    
    .optionsACT ul {
        list-style-type: none;
        text-align: left;
        padding-left: 0;
    }
    .optionsACT li{
        padding: 8px;
        border-bottom: 1px solid #dfdfdf;
        cursor: pointer;
    }
    .optionsACT li.selected{
     background: blue;
    }
    
    .optionsACT::-webkit-scrollbar-track {
      border: 1px solid #000;
      padding: 2px 0;
      background-color: #404040;
    }

    .optionsACT::-webkit-scrollbar {
      width: 10px;
    }

    .optionsACT::-webkit-scrollbar-thumb {
      border-radius: 10px;
      box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #737272;
      border: 1px solid #000;
    }
    
</style>