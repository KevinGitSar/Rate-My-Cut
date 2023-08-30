<template>
    <div class="container flex flex-col justify-center w-full xs:h-[75px] sm:h-[100px]">
        <div class="row justify-content-center">
            <h1 class="text-center text-[#FFCB77] m-auto xs:text-4xl sm:text-5xl md:text-6xl">{{ title }}</h1>
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
