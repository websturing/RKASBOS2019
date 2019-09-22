<template>
    <div>
        <div id="modal_large" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">DAFTAR PENGURUS PERMOHONAN 
                            <span class="text-bold txt-warning">{{perusahaan.nama}}</span> <span class='text-sm'>({{perusahaan.status}})</span>
                         </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>NAMA</td>
                                    <td>HP</td>
                                    <td>IDENTITAS</td>
                                    <td>NO ID</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(a, index) in pengurus">
                                   <td>{{index+1}}</td>
                                   <td>{{a.nama}}</td>
                                   <td>{{a.contact}}</td>
                                   <td>{{a.identitas_jenis}}</td>
                                   <td>{{a.identitas_no}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>


<script>
    export default {
        mounted(){
            console.log('MODAL ANGGOTA PENGURUS');
        },
        props:['show','perusahaan','pengurus']
    }
</script>