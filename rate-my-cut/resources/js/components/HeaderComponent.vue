<template>
    <div class="container header">
        <div class="row justify-content-center">
            <h1>{{ title }}</h1>
        </div>
    </div>
</template>

<script>
    export default {
        props:['title'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .header{
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: column;
        height: 15vh;
        background-color: #FFCB77;
        width: 100%;
    }

    h1{
        text-align: center;
        margin: auto;
        font-style: italic;
        font-family: 'K2D', sans-serif;
        font-size: 10vh;
        color: #FEF9EF;
        text-shadow: -2px -2px 0 #000, 2px -2px #000, -2px 2px #000, 2px 2px #000;
    }

</style>
