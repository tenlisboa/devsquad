<template>
    <div class="container">
        <div class="row" >
            <div class="col-sm-12">
                <div class="card card-success" >
                    <div class="card-header" id="HeaderPainel" >
                        <span class="inverse strong" >Painel Administrativo</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <task-component nameTask="A fazer!" ></task-component>
                            <task-component nameTask="Fazendo!" ></task-component>
                            <task-component nameTask="Finalizado!" ></task-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
