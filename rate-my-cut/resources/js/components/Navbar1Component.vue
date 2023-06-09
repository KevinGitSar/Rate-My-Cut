<template>
    <div class="">
        <nav class="flex justify-between h-16 bg-[#FEB3B1]">

            <a href="/search" class="flex flex-col justify-center w-full align-center text-center text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer mx-5 nav-item">Search</a>

            <a href="/" class="flex flex-col justify-center w-full align-center text-center text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer mx-5 nav-item">Catalogue</a>

            <a href="/login" class="flex flex-col justify-center w-full align-center text-center text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer mx-5 nav-item">Log In</a>
        </nav>
    </div>
</template>

<script>
    export default {
    }
</script>

<style scoped>
    .nav-item{
        text-shadow: -1px -1px 0 #000, 1px -1px #000, -1px 1px #000, 1px 1px #000;
        font-family: 'K2D', sans-serif;
    }

</style>
