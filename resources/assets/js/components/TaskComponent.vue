<template>
    <div class="col-sm-4">
        <div class="card card-success" >
            <div class="card-header" >
                {{ nameTask }}
            </div>
            <div class="card-body" >

            </div>
        </div>
    </div>                     
</template>

<script>
    export default {
        props: ['nameTask']
    }
</script>