<template>
    <div>
        <nav class="flex justify-between h-8 bg-[#FFCB77] xs:h-10 sm:h-12 md:h-14 lg:h-16">
            <a href="/search" class="flex flex-col justify-center w-full align-center text-sm xs:text-lg sm:text-2xl md:text-3xl lg:text-3xl text-center text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer px-5 nav-item">Search</a>

            <a href="/" class="flex flex-col justify-center w-full align-center text-sm xs:text-lg sm:text-2xl md:text-3xl lg:text-3xl text-center text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer px-5 nav-item">Catalogue</a>

            <a href="/login" class="flex flex-col justify-center w-full align-center xs:text-lg text-sm sm:text-2xl md:text-3xl lg:text-3xl text-center text-[#FEF9EF] hover:bg-[#FE6D73] hover:underline hover:underline-offset-4 hover:decoration-2 cursor-pointer px-5 nav-item">Log In</a>
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
