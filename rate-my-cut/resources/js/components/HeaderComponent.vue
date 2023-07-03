<template>
    <div class="container flex flex-col justify-center bg-[#FFCB77] w-full h-10 xs:h-14 sm:h-16 md:h-20 lg:h-24">
        <div class="row justify-content-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-center text-[#FEF9EF] m-auto ">{{ title }}</h1>
        </div>
    </div>
</template>

<script>
    export default {
        props:['title'],
    }
</script>

<style scoped>
    
    h1{
        font-style: italic;
        font-family: 'K2D', sans-serif;
        text-shadow: -1px -1px 0 #000, 1px -1px #000, -1px 1px #000, 1px 1px #000;
    }

</style>
