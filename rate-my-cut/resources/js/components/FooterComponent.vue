<template>
    <div class="container">
        <footer class="row footer">
            <p class="footer-item">Copyright &copy; RMC 2023</p>
            <p class="footer-item">Terms and Conditions</p>
        </footer>
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
    .footer{
        display: flex;
        justify-content: center;
        height: 8vh;
        background-color: #FFCB77;
        margin-top: 1vh;
    }

    .footer-item{
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: column;
        margin-left: 1vh;
        margin-right: 1vh;
        font-family: 'K2D', sans-serif;
        font-style: italic;
    }

</style>
