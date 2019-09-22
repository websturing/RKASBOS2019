<template>
<div>
    <breadcums></breadcums> 
    <div class="page-content pt-0" >
    <sidebar></sidebar>
    
    <div class="content-wrapper">
    <div class="content">
      <div class="card">
    		<div class="card-header header-elements-sm-inline">
                <h6 class="card-title">
                     <input type="text"  class="form-control" placeholder="ketik Nama perusahaan / Nama izin / opd">
                </h6>
                <div class="header-elements">
                    <span class="badge bg-success badge-pill">28 active</span>
                    <div class="list-icons ml-3">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="table-responsive">
            <table class="table text-nowrap table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                    </tr>
                </thead>
               
            </table>
            </div>
            <div class="card-footer">
               
            </div>
							
        
        </div>
    </div>
    </div>
    </div>
</div>    
</template>


<script>
    import breadcums from '@/js/components/template/breadcums';
    import sidebar from '@/js/components/template/sidebar';
    
    
    export default{
        mounted(){
            console.log('perusahaanIndex');
        },
        components:{
            sidebar,
            breadcums
        }
    }

</script>