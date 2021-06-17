<template>
    <div class="row my-3 container p-0 ">
        <div class="  col ">
            <input type="text" placeholder="enter your todo" class="form-control m-0  " v-model="todo.name">
        </div>
        <div class="col">
            <button @click="addTodo()" class="btn btn-primary" :class="[todo.name ? 'active' : 'disabled  btn-secondary']">Save</button>
        </div>
    </div>
    
</template>
<script>
    export default {
        data: function(){
            return {
                todo: {
                    name: "",
                }
            }
        },
        methods: {
            addTodo() {
                if(this.todo.name == ''){
                    return;
                }else{
                   axios.post('api/todo/store', {
                       name: this.todo.name
                   }).then ( response => {
                       if (response.status == 201){
                           this.todo.name = "";
                           this.$emit('reloadList');
                       }
                   }).catch( error => {
                       console.log( errror) ;
                   })
                }
            }
        }
    }
</script>