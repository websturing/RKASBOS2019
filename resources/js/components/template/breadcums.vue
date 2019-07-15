<template>
    <div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<span class="breadcrumb-item active">
				       
					</span>
				</div>

				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

			<div class="header-elements d-none">
				<div class="breadcrumb justify-content-center">
					<a href="#" class="breadcrumb-elements-item">
						<i class="icon-comment-discussion mr-2"></i>
						Support
					</a>

					<div class="breadcrumb-elements-item dropdown p-0">
						<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
							<i class="icon-gear mr-2"></i>
							Settings
						</a>

						<div class="dropdown-menu dropdown-menu-right">
							<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
							<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
							<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="page-header-content header-elements-md-inline">
		 <slot name='spiner'></slot>
			<div class="page-title d-flex">
			
			<div v-for="title in titles">
			
				<h4>{{title.name}}</h4>
				<h6>{{title.subtitle}}</h6>
            </div>
				
			</div>

			<div class="header-elements d-none mb-3 mb-md-0">
				<div class="d-flex justify-content-center">
				 <div v-for="jumlahD in permohonanjumlah">
				     <a href="#" class="btn btn-link btn-float text-default">
                         <span class="text-bold">{{jumlahD.jumlah}}</span> 
                         <span>{{jumlahD.name}}</span>
				     </a>
				 </div>
					
					
				</div>
			</div>
		</div>
	</div>
    
</template>

<script>
    export default {
        mounted() {
            console.log('Dashboard Component mounted.');
            
        },
        props:{
            'titles' : null,
            'permohonanjumlah' : null
        }
    }
</script>
