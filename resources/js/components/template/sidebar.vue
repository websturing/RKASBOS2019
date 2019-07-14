<template>
   <div>
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md align-self-start navbar-sticky">
           <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            <span class="font-weight-semibold">Main sidebar</span>
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        
            <div class="sidebar-content">
            <div class="card card-sidebar-mobile">

            <!-- Header -->
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Navigation</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-user">
                <div class="card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><img src="public/global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
                        </div>

                        <div class="media-body">
                            <div class="media-title font-weight-semibold">Victoria Baker</div>
                            <div class="font-size-xs opacity-50">
                                <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
                            </div>
                        </div>

                        <div class="ml-3 align-self-center">
                            <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item-header mt-0"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'Dashboard'}" class="nav-link">
                              <i class="icon-home4"></i>
                               <span> Dashboard </span>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'About'}" class="nav-link">
                              <i class="icon-home4"></i>
                               <span> About </span>
                        </router-link>
                    </li>
                </ul>
            </div>
            </div>
            </div>
        
       </div>
   </div>
</template>


<script>
    export default {
        mounted() {
            console.log('Sidebar Component mounted.');
            
        }
    }
</script>
