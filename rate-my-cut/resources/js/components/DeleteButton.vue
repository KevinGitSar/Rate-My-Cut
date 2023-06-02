<template>
    <div class="nav-dropdown">
        <div class="relative" @mouseleave="isOpen = false">
            <button @click="isOpen = !isOpen" class="nav-item btn-nav eraser"><img v-bind:src="'/icons/eraser.png'" class="w-4 h-4 bg-white absolute border-2 border-[#291F1F] hover:border-[#FEB3B1]" /></button>
            <div v-if="isOpen" class="absolute left-0 z-10 mt-0 w-20 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <form :action="'/delete/post/'+imagepath" method="POST">
                    <input type="hidden" name="_token" :value="csrf">
                    <button type="submit" class="hover:bg-[#FEB3B1] w-full">Delete</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['user', 'imagepath'],
        data(){
            return {
                isOpen: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        }
    }
</script>

<style scoped>
    .eraser {
        width: 25px;
        height: 25px;
        background-image: "{{ URL::to('/') }}/icons/eraser.png";
    }

    .nav-item{
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: column;
        font-size: 4vh;
        font-family: 'K2D', sans-serif;
        color: #FEF9EF;
        text-shadow: -1px -1px 0 #000, 1px -1px #000, -1px 1px #000, 1px 1px #000;
    }

    .btn-nav:hover{
        cursor: pointer;
    }
</style>