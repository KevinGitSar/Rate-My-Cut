<template>
    <div class="container">
        <nav class="row navbar">
            <a href="/search" class="nav-item btn-nav">Search</a>
            <a href="/" class="nav-item btn-nav">Catalogue</a>
            <a href="/login" class="nav-item btn-nav">Log In</a>
        </nav>
    </div>
</template>

<script>
    export default {
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
