<template>
    
     <div>
           <div v-for="title in titles">
              <vue-headful
                :title="title.page"
                description="Description from vue-headful"
                />
          </div>
          
           <Breadcums v-bind:titles="titles" 
           /></Breadcums>
            
            
      	<div class="page-content pt-0">
                <Sidebar/>
           
            <div class="content-wrapper">
                <div class="content">
                   
               
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Navbar component</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                           {{msg}}


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
    export default {
        mounted() {
            console.log('About Component mounted.')
        }
        ,
         data () {
            return {
                msg : "About",
                titles : [
                    {name: "About", subtitle: "", page: "About Page"}
                ],
               
            }
        },
        components:{
            Breadcums,
            Sidebar
        }
    }
</script>
