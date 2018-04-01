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
                                                    <li v-for="(task, index) in todo" :key="task.id" class="list-group-item align-horizontal task">  
                                                        <label v-on:click="comfirmDelete(task.name_task, 'todo', index)" class="label-task">{{ task.name_task }}</label>
                                                        <button v-on:click="moveToDoing(task.name_task, 'todo', index)" class="btn btn" style="float: right"><i class="fas fa-angle-right"></i></button>             
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
                                                    <li v-for="(task, index) in doing" :key="task.id" class="list-group-item align-horizontal task">  
                                                        <button v-on:click="moveToDo(task.name_task, 'doing', index)" class="btn btn" style="float: left"><i class="fas fa-angle-left"></i></button>             
                                                        <label v-on:click="comfirmDelete(task.name_task, 'doing', index)" class="label-task">{{ task.name_task }}</label>
                                                        <button v-on:click="moveToFinished(task.name_task, 'doing', index)" class="btn btn" style="float: right"><i class="fas fa-angle-right"></i></button>             
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
                                                    <li v-for="(task, index) in finished" :key="task.id" class="list-group-item align-horizontal task">  
                                                        <button v-on:click="moveToDoing(task.name_task, 'finished', index)" class="btn btn" style="float: left"><i class="fas fa-angle-left"></i></button>             
                                                        <label v-on:click="comfirmDelete(task.name_task, 'finished', index)" class="label-task">{{ task.name_task }}</label>
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

        mounted() {
            console.log(this.dados)

            this.todo = this.dados.task_todo;
            this.doing = this.dados.task_doing;
            this.finished = this.dados.task_finished;
            this.idUser = this.dados.id_user;

        },

        props: ['dados'],

        data: function() {
            return {
                todo: [],
                doing: [],
                finished: [],
                new_task_todo: '',
                new_task_doing: '',
                new_task_finished: '',
                idUser: ''
            }
        },

        methods:{

            sendPostData: function(service, id_user, task_name, type_task) {

                let data = new FormData();
                data.append('service', service)
                data.append('id_user', id_user);
                data.append('task_name', task_name);
                data.append('type_task', type_task);

                axios.post('http://teamdevsquad.devlisb.ga:5020/api', data)
                    .then( function(res) {
                        console.log(res);
                    })
                    .catch( function(err) {
                        //console.log(err);
                    })
            },

            addTaskTodo: function() {
                if(this.new_task_todo != ''){
                    this.todo.push({name_task: this.new_task_todo});
                }

                this.sendPostData('add_task', this.idUser, this.new_task_todo, 'todo');

                this.new_task_todo = '';     
            },

            addTaskDoing: function() {
                if(this.new_task_doing != ''){
                    this.doing.push({name_task: this.new_task_doing});
                }

                this.sendPostData('add_task', this.idUser, this.new_task_doing, 'doing');

                this.new_task_doing = '';     
            },

            addTaskFinished: function() {
                if(this.new_task_finished != ''){
                    this.finished.push({name_task: this.new_task_finished});
                }

                this.sendPostData('add_task', this.idUser, this.new_task_finished, 'finished');

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
                this.sendPostData('delete_task', this.idUser, task, type)
            },

            moveToDo: function(task, type, index) {
                this.deleteTask(task,type,index);
                this.new_task_todo = task;
                this.addTaskTodo();
                this.new_task_todo = '';
            },

            moveToDoing: function(task, type, index) {
                this.deleteTask(task, type, index);
                this.new_task_doing = task;
                this.addTaskDoing();
                this.new_task_doing = '';
            },

            moveToFinished: function(task, type, index) {
                this.deleteTask(task, type, index);
                this.new_task_finished = task;
                this.addTaskFinished();
                this.new_task_finished = '';
            },

            comfirmDelete: function(task, type, index) {
                swal({
                    title: "Tem certeza que deseja finalizar esta tarefa?",
                    text: "Esta ação não poderá ser desfeita posteriormente!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        this.deleteTask(task, type, index);
                        swal("Tarefa concluida com sucesso.", {
                            icon: "success",
                        });
                    }
                });
            }

        },
    }
</script>
