<template>
    <div class="container">
        <nav class="row navbar">
            <a href="/login" class="nav-item btn-nav">About</a>
            <a href="/" class="nav-item btn-nav">Catalogue</a>
            <button v-if="isOpen" @click="isOpen = false" class="fixed inset-0 h-full w-full bg-black opacity-0 cursor-default"></button>
            <div class="nav-dropdown">
                <div class="relative">
                    <button @click="isOpen = !isOpen" class="nav-item btn-nav">{{user.username}}</button>
                    <div v-if="isOpen" class="absolute py-2 rounded-lg bg-white w-full shadow-xl mt-1">
                        <a :href="'/'+user.username" class="block px-4 py-2 hover:bg-indigo-500">Profile</a>
                        <a href="/settings" class="block px-4 py-2 hover:bg-indigo-500">Settings</a>
                        <a href="/user/logout" class="block px-4 py-2 hover:bg-indigo-500">Sign Out</a>
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
    .navbar{
        display: flex;
        justify-content: space-between;
        height: 10vh;
        background-color: #FEB3B1;
        margin-top: 1vh;
    }

    .nav-dropdown{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        margin-left: 6%;
        margin-right: 6%;
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

    a{
        text-decoration: none;
    }
    .btn-nav:hover{
        color: #227C9D;
        text-decoration: underline 2px solid;
        text-underline-offset: 5px;
        cursor: pointer;
    }

</style>
