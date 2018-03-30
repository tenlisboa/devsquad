<template>
    <div class="col-sm-4">
        <div class="card card-success" >
            <div id="name-task" class="card-header" >
                {{ nameTask }}
            </div>
            <div class="card-body" >
                <div class="list-group" >
                    <div class="list-group-item wrapper" >
                        <input placeholder="Adicionar nova tarefa..." v-model="new_task" class="form-control" >
                        &nbsp;
                        <button class="btn btn button-add" v-on:click="addTask(typeTask)" ><i class="fa fa-plus inverse"></i></button>
                    </div>
                    <div class="list-group-item wrapper" >
                        <ul class="list-group ">
                            <li v-if="typeTask == 'todo'" v-for="task in todo" class="list-group-item align-horizontal task">  
                                <label class="label-task">{{ task.name }}</label>
                                <button @click="TodoToDoing(task.name)" class="btn btn" style="float: right"><i class="fas fa-angle-right"></i></button>             
                            </li>                            

                            <li v-if="typeTask == 'doing'"  v-for="task in doing" class="list-group-item align-horizontal task">  
                                <button class="btn btn" style="float: left"><i class="fas fa-angle-left"></i></button>             
                                <label class="label-task" >{{ task.name }}</label>                           
                                <button class="btn btn" style="float: right"><i class="fas fa-angle-right"></i></button>             
                            </li>
                            <modal-actions-component idModel="modal_move_doing"></modal-actions-component>

                            <li v-if="typeTask == 'finished'"v-for="task in finished" class="list-group-item align-horizontal task">        
                                <button class="btn btn" style="float: left"><i class="fas fa-angle-left"></i></button>             
                                <label class="label-task">{{ task.name }}</label>                           
                            </li>
                            <modal-actions-component idModal="modal_move_finished"></modal-actions-component>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>                     
</template>

<script>
    export default {
        methods:{
            addTask: function(typeTask) {
                if(this.new_task != '') {

                    if(typeTask == 'doing') {
                        this.doing.push({ name: this.new_task});
                    }
                    else if(typeTask == 'finished') {
                        this.finished.push({name: this.new_task});
                    }
                    else if(typeTask == 'todo') {
                        this.todo.push({name: this.new_task});
                    }
                    
                    this.new_task = '';
                }
                    
            },
            TodoToDoing: function(name) {
                this.new_task = name;
                alert(this.new_task)
                this.addTask('finished');
                /*this.todo = this.todo.filter( function(task) {
                    if(task.name != name) {
                        return task;
                    }
                })*/
            },
            deleteDoing: function(name) {

            },
            deleteFinished: function(name) {

            },
            
        },
        data: function() {
            return {
                todo: [
                    { name: 'Correr1'},
                    {name: 'Correr2'},
                    {name: 'Correr3'},
                    {name: 'Correr4'},
                    {name: 'Correr5'}
                ],
                doing: [
                    {name: 'Nadar'}                    
                ],
                finished: [
                    {name: 'Andar'}                    
                ],
                new_task: '',
                id_task_selected: '',
            }
        },
        props: ['nameTask', 'typeTask'],
    }
</script>