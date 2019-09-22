    <template>
    <div>
     <input autocomplete=off class="form-control" 
                :placeholder="placeholderText" 
                v-model="autoSearch"
                @click="toggleVisible"
                @keydown.up="up"
                @keydown.down="down"
                @keydown.enter="SelectItem">
        
        <div id="txtData" v-if="visible"> 
              
            <div class="fieldForm" ref="opstionsACTList">
            <ul class="scrollLI">
                <li v-for="(match,index) in matches"
                    :key="match[filterby]"
                    v-text="match[filterby]"
                    @click="itemClick(index)"
                    :class="{ 'selected' : (selected == index)}"
                    class="selecteda"
                >
                  {{match}}

                </li>
            </ul>
        </div>
        </div>
    </div>
</template>


<script>
    export default {
        mounted(){
            console.log('autocomplate Template Mounted');
        },
        props:['placeholderText',"filterby","valueTxt"],
        data(){
            return{
               itemHeight:37,
               Selectitem:null,
               selected:0,
               autoSearch:'',
               visible:false
            }
        },
        methods:{
            toggleVisible(){
                this.visible = !this.visible
//                this.visible = true
            },
            itemClick(index){
                console.log(this.matches[index]);
                this.selected = index;
                this.SelectItem();
            },
            SelectItem(index){
//                console.log(this.Selectitem = this.matches[this.selected]);
                this.Selectitem = this.matches[this.selected];
                this.autoSearch = this.matches[this.selected]['nama']
                this.visible = false;
                this.$emit('DataAutoComplate', this.Selectitem);
                this.$emit('putpengurus', this.Selectitem);
                
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
                 this.$emit('putperusahaanNama', this.autoSearch);
                 this.$emit('putpengurusnama', this.autoSearch);

                if(this.autoSearch === ''){
                    return [];
                }
  
                return this.valueTxt.filter((nama) => nama[this.filterby].toLowerCase().includes(this.autoSearch.toLowerCase()));
            }
        },
        
    }

</script>


<style>
    input[list]{
        background: #dfdfdf;
    }
    .scrollLI{
        overflow: auto;
    }
    .fieldForm{
        max-height: 150px;
        overflow: hidden;
    }
    
    .fieldForm ul {
        list-style-type: none;
        text-align: left;
        padding-left: 0;
    }
    .fieldForm li{
        padding: 8px;
        border-bottom: 1px solid #dfdfdf;
        cursor: pointer;
    }
    .fieldForm li.selected{
     background: #333;
        color:white;
    }
    .fieldForm li.selecteda:hover{
     background: #333;
        color:white;
    }
    
    .fieldForm::-webkit-scrollbar-track {
      border: 1px solid #000;
      padding: 2px 0;
      background-color: #404040;
    }

    .fieldForm::-webkit-scrollbar {
      width: 10px;
    }

    .fieldForm::-webkit-scrollbar-thumb {
      border-radius: 10px;
      box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #737272;
      border: 1px solid #000;
    }
    #txtData{
        padding: 5px;
        border: 1px solid #dfdfdf;
    }
    
</style>