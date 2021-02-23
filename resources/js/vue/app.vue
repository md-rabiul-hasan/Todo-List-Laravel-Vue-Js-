<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-item-from/>
        </div>
        <list-view />
    </div>
</template>

<script>
import addItemFrom from './addItemFrom'
import listView from './listView'

export default {
    components : {
        addItemFrom,
        listView
    }
}
</script>

<style scoped>
    .todoListContainer{
        width: 350px;
        margin: auto;
    }

    .heading{
        background: #e6e6e6;
        padding: 10px;
    }

    #title{
        text-align: center;
    }
</style>