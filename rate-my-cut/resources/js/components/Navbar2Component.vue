<template>
    <div>
        <nav class="flex justify-between h-8 bg-[#FFCB77] xs:h-10 sm:h-12 md:h-14 lg:h-16">
            <a href="/search" class="flex flex-col w-full justify-center align-center text-sm xs:text-lg sm:text-2xl md:text-3xl lg:text-4xl text-center text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer px-5 nav-item">Search</a>

            <a href="/" class="flex flex-col w-full justify-center align-center text-sm text-center xs:text-lg sm:text-2xl md:text-3xl lg:text-4xl text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer px-5 nav-item">Catalogue</a>

            <div @click="isOpen = !isOpen" class="flex flex-col w-full justify-center align-center hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 hover:decoration-white cursor-pointer px-5" @mouseleave="isOpen = false">
                <div class="flex justify-center w-full">
                    <div class="relative">
                        <button class="flex flex-col justify-center align-center text-[#FEF9EF] text-sm xs:text-lg sm:text-2xl md:text-3xl lg:text-4xl px-5 nav-item">{{user.username}}</button>
                        <div v-if="isOpen" class="absolute py-2 rounded-lg bg-white w-28 shadow-xl mt-1">
                            <a :href="'/'+user.username" class="block px-4 py-2 hover:bg-[#FE6D73]">Profile</a>
                            <a href="/settings" class="block px-4 py-2 hover:bg-[#FE6D73]">Settings</a>
                            <a href="/user/logout" class="block px-4 py-2 hover:bg-[#FE6D73]">Sign Out</a>
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
