<template>
    <div class="container align-content-center justify-content-center d-flex block">
        <div class="heading mt-5 w-50">
            <h2 class=" m-0 p-0">Todo List</h2>
            <add-todo v-on:reloadList="getAllTodos()"/>
            <hr>
            <list-view 
                :items="items" 
                v-on:reloadList="getAllTodos()"
            />
        </div>
        
    </div>
</template>

<script>
    import addTodo from './addTodo.vue';
    import ListView from './listView.vue';
    export default {
        components: { 
            addTodo, 
            ListView 
        },
        data: function (){
            return {
                items: []
            }
        },
        methods: {
            getAllTodos () {  // grtting data from the database
                axios.get('/api/todos')
                .then( response => {
                    this.items = response.data;
                }).catch( error => {
                    console.log(error);
                })
            },
            
            
        },
        created() { // calling the getTodos function
            this.getAllTodos();
        }
        
    }
</script>
