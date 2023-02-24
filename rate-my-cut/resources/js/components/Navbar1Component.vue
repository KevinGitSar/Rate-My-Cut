<template>
    <div class="container">
        <nav class="row navbar">
            <p class="nav-item">About</p>
            <p class="nav-item">Catalogue</p>
            <p class="nav-item">Log In</p>
        </nav>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
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

</style>
