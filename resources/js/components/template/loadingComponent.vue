<template>
        <div  v-if="loading">
           <i class="icon-spinner2 spinner"> </i> Loading ...
        </div>
</template> 


<script>
    export default {
        mounted() {
            console.log('Loading Component mounted.');
            
        },
        props:{
            'loading': null,
        }
    }
</script>