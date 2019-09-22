<template>
    <div>
        <div id="overlayer"></div>
        <span class="loader">
            <span class="loader-inner"></span>
        </span>
        <span class="LoadingOverley">Loading ... </span>
    </div>
    
</template>
<style>
.LoadingOverley{
    display: inline-block;
    position: absolute;
    color:#fff;
    z-index:9999 !important;
    font-weight:bold;
    top: 54%;
    left:49%;


}
#overlayer {
  top:0px;
  width:100%;
  height:100%;  
  position:absolute;
  z-index: 9999 !important;
  background-color: rgba(0,0,0,0.5);
}
.loader {
  display: inline-block;
  width: 30px;
  height: 30px;
  position: absolute;
  z-index:9999 !important;
  border: 4px solid #Fff;
  top: 50%;
  left:50%;
  animation: loader 2s infinite ease;
}

.loader-inner {
  vertical-align: top;
  display: inline-block;
  width: 100%;
  background-color: #fff;
  animation: loader-inner 2s infinite ease-in;
}

@keyframes loader {
  0% {
    transform: rotate(0deg);
  }
  
  25% {
    transform: rotate(180deg);
  }
  
  50% {
    transform: rotate(180deg);
  }
  
  75% {
    transform: rotate(360deg);
  }
  
  100% {
    transform: rotate(360deg);
  }
}

@keyframes loader-inner {
  0% {
    height: 0%;
  }
  
  25% {
    height: 0%;
  }
  
  50% {
    height: 100%;
  }
  
  75% {
    height: 100%;
  }
  
  100% {
    height: 0%;
  }
}
</style>
<script>
export default{
        mounted(){
            console.log('loading.io')
        }
}
</script>