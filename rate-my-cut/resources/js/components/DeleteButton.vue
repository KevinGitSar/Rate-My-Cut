<template>
    <div class="nav-dropdown">
        <div class="relative">
            <button @click="isOpen = !isOpen" class="nav-item btn-nav">Delete</button>
            <div v-if="isOpen" class="absolute py-2 rounded-lg bg-white w-full shadow-xl mt-1">
                <a :href="'/'+user.username+'/'+imagepath" class="block px-4 py-2 hover:bg-indigo-500">Delete</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['user', 'imagepath'],
        data(){
            return {
                isOpen: false
            }
        }
    }
</script>

<style scoped>
    button {
        width: 25px;
        height: 25px;
        background-image: "{{ URL::to('/') }}/icons/eraser.png";
    }

    .nav-item{
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: column;
        margin-left: 6%;
        margin-right: 6%;
        font-size: 4vh;
        font-family: 'K2D', sans-serif;
        color: #FEF9EF;
        text-shadow: -1px -1px 0 #000, 1px -1px #000, -1px 1px #000, 1px 1px #000;
    }

    .btn-nav:hover{
        color: #227C9D;
        text-decoration: underline 2px solid;
        text-underline-offset: 5px;
        cursor: pointer;
    }
</style>