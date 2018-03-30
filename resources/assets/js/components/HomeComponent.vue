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
                            <div class="col-sm-4">
                                <div class="card card-success" >
                                    <div id="name-task" class="card-header" >
                                        A fazer!
                                    </div>
                                    <div class="card-body" >
                                        <div class="list-group" >
                                            <div class="list-group-item wrapper" >
                                                <input placeholder="Adicionar nova tarefa..." v-model="new_task_todo" class="form-control" >
                                                &nbsp;
                                                <button class="btn btn button-add" v-on:click="addTaskTodo()" ><i class="fa fa-plus inverse"></i></button>
                                            </div>
                                            
                                            <div class="list-group-item wrapper" >
                                                <ul class="list-group ">
                                                    <li v-for="(task, index) in todo" :key="task.name" class="list-group-item align-horizontal task">  
                                                        <label class="label-task">{{ task.name }}</label>
                                                        <button v-on:click="moveToDoing(task.name, 'todo', index)" class="btn btn" style="float: right"><i class="fas fa-angle-right"></i></button>             
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   

                            <div class="col-sm-4">
                                <div class="card card-success" >
                                    <div id="name-task" class="card-header" >
                                        Fazendo!
                                    </div>
                                    <div class="card-body" >
                                        <div class="list-group" >
                                            <div class="list-group-item wrapper" >
                                                <input placeholder="Adicionar nova tarefa..." v-model="new_task_doing" class="form-control" >
                                                &nbsp;
                                                <button class="btn btn button-add" v-on:click="addTaskDoing()" ><i class="fa fa-plus inverse"></i></button>
                                            </div>
                                            
                                            <div class="list-group-item wrapper" >
                                                <ul class="list-group ">
                                                    <li v-for="(task, index) in doing" :key="task.name" class="list-group-item align-horizontal task">  
                                                        <button v-on:click="moveToDo(task.name, 'doing', index)" class="btn btn" style="float: left"><i class="fas fa-angle-left"></i></button>             
                                                        <label class="label-task">{{ task.name }}</label>
                                                        <button v-on:click="moveToFinished(task.name, 'doing', index)" class="btn btn" style="float: right"><i class="fas fa-angle-right"></i></button>             
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card card-success" >
                                    <div id="name-task" class="card-header" >
                                        Finalizado!
                                    </div>
                                    <div class="card-body" >
                                        <div class="list-group" >
                                            <div class="list-group-item wrapper" >
                                                <input placeholder="Adicionar nova tarefa..." v-model="new_task_finished" class="form-control" >
                                                &nbsp;
                                                <button class="btn btn button-add" v-on:click="addTaskFinished()" ><i class="fa fa-plus inverse"></i></button>
                                            </div>
                                            
                                            <div class="list-group-item wrapper" >
                                                <ul class="list-group ">
                                                    <li v-for="(task, index) in finished" :key="task.name" class="list-group-item align-horizontal task">  
                                                        <button v-on:click="moveToDoing(task.name, 'finished', index)" class="btn btn" style="float: left"><i class="fas fa-angle-left"></i></button>             
                                                        <label class="label-task">{{ task.name }}</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods:{
            addTaskTodo: function() {
                if(this.new_task_todo != ''){
                    this.todo.push({name: this.new_task_todo});
                }
                this.new_task_todo = '';     
            },
            addTaskDoing: function() {
                if(this.new_task_doing != ''){
                    console.log(this.doing)
                    this.doing.push({name: this.new_task_doing});
                }
                this.new_task_doing = '';     
            },
            addTaskFinished: function() {
                if(this.new_task_finished != ''){
                    this.finished.push({name: this.new_task_finished});
                }
                this.new_task_finished = '';     
            },
            deleteTask: function(task, type, index) {
                switch(type){
                    case 'todo': 
                        Vue.delete(this.todo, index);
                        break;
                    case 'doing': 
                        Vue.delete(this.doing, index);
                        break;
                    case 'finished':
                        Vue.delete(this.finished, index);
                        break; 
                    default: 
                        break;
                }
            },
            moveToDo: function(task, type, index) {
                this.deleteTask(task,type,index);
                this.new_task_todo = task.toString();
                this.addTaskTodo();
                this.new_task_todo = '';
            },
            moveToDoing: function(task, type, index) {
                this.deleteTask(task, type, index);
                this.new_task_doing = task.toString();
                this.addTaskDoing();
                this.new_task_doing = '';
            },
            moveToFinished: function(task, type, index) {
                this.deleteTask(task, type, index);
                this.new_task_finished = task.toString();
                this.addTaskFinished();
                this.new_task_finished = '';
            },

        },
        data: function() {
            return {
                todo: [
                    {name: 'UM'},
                    {name: 'DOIS'},
                    {name: 'TRES'},
                    {name: 'QUATRO'},
                ],
                doing: [],
                finished: [],
                new_task_todo: '',
                new_task_doing: '',
                new_task_finished: '',
            }
        },
        props: ['nameTask', 'typeTask'],
    }
</script>
