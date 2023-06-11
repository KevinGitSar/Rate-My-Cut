<template>
    <div class="container flex flex-col justify-center bg-[#FFCB77] w-full h-20">
        <div class="row justify-content-center">
            <h1 class="text-5xl text-center text-[#FEF9EF] m-auto ">{{ title }}</h1>
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
