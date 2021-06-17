<template>
    <div class="row pb-0">
        <div class="col ">
            <p :class="[item.completed ? 'text-decoration-line-through text-secondary' : '']">{{ item.name }}</p>
        </div>
        <div class="form-check col ">
            <input 
                class="form-check-input" 
                type="checkbox" 
                :class="[item.completed ? 'checked' : '']"
                @change="updateCheck()"
                v-model="item.completed"
                >
            <label class="form-check-label" for="defaultCheck1">
                completed ?
            </label>
            
        </div>
        <div class="col  d-flex align-content-right ">
            <i class="bi bi-trash-fill text-danger" style="cursor:pointer" @click="removeItem()"></i>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item'],
    methods: {
        removeItem(){
            axios.delete('api/todo/' + this.item.id)
            .then( response => {
                if (response.status == 200){
                    this.$emit('itemchanged');
                }
            })
            .catch(error => {
                console.log(error)
            })
        },
        updateCheck(){
            axios.put('api/todo/' + this.item.id , {
                completed: this.item.completed
            })
            .then( response => {
                if (response.status == 200){
                    this.$emit('itemchanged');
                }
            })
            .catch(error => {
                console.log(error)
            })
        },

    }
}
</script>
