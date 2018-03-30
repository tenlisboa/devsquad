<template>
    <div class="container">
        <div class="row" >
            <div class="col-sm-12">
                <div class="card card-success" >
                    <div class="card-header header-painel" >
                        <span class="inverse strong" >Painel Administrativo</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <new-task-component typeTask="todo" nameTask="A fazer!" ></new-task-component>
                            <new-task-component typeTask="doing" nameTask="Fazendo!" ></new-task-component>
                            <new-task-component typeTask="finished" nameTask="Finalizado!" ></new-task-component>
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
