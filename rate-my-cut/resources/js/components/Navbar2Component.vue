<template>
    <div class="">
        <nav class="flex justify-between h-16 bg-[#FEB3B1]">
            <a href="/search" class="flex flex-col w-full justify-center align-center text-2xl text-center text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer px-5 nav-item">Search</a>

            <a href="/" class="flex flex-col w-full justify-center align-center text-2xl text-center text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer px-5 nav-item">Catalogue</a>

            <div @click="isOpen = !isOpen" class="flex flex-col w-full justify-center align-center hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 hover:decoration-white cursor-pointer px-5" @mouseleave="isOpen = false">
                <div class="flex justify-center w-full">
                    <div class="relative">
                        <button class="flex flex-col justify-center align-center text-[#FEF9EF] text-2xl px-5 nav-item">{{user.username}}</button>
                        <div v-if="isOpen" class="absolute py-2 rounded-lg bg-white w-28 shadow-xl mt-1">
                            <a :href="'/'+user.username" class="block px-4 py-2 hover:bg-indigo-500">Profile</a>
                            <a href="/settings" class="block px-4 py-2 hover:bg-indigo-500">Settings</a>
                            <a href="/user/logout" class="block px-4 py-2 hover:bg-indigo-500">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        props:['user'],
        data(){
            return {
                isOpen: false
            }
        }
    }
</script>

<style scoped>
    .nav-item{
        font-family: 'K2D', sans-serif;
        text-shadow: -1px -1px 0 #000, 1px -1px #000, -1px 1px #000, 1px 1px #000;
    }
</style>
