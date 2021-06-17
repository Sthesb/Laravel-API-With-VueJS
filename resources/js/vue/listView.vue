<template>
    <div>
        <div v-for="(item, index) in items" :key="index" class="container" >
            
            <list-item
                :item="item" 
                class="container bg-light shadow p-3"
                v-on:itemchanged="$emit('reloadList')"
                 />
        </div>
         
    </div>
</template>

<script>
import listItem from './listItem.vue'

export default {
    components: { listItem },
    props: ['items']
}
</script>

