<template>
    <div v-show="countDown > 0" dismissible @dismiss="countDown=0" @dismiss-count-down="countDown" class="alert-box bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex mx-auto justify-around text-sm" role="alert">
        <p>{{message}}</p>
    </div>
</template>

<script>
export default {
    props:['message'],
    data(){
        return{
            countDown: 5,
        }
    },
    methods:{
        countDownTimer () {
                if (this.countDown > 0) {
                    setTimeout(() => {
                        this.countDown -= 1
                        this.countDownTimer()
                    }, 1000)
                }
            },
    },
    created(){
        this.countDownTimer();
    }
}
</script>
