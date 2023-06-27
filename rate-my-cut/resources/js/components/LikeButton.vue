<template>
    <div class="flex flex-col justify-center">
        <button @click="likePost" v-if="like == true ? buttonText = 'like' : buttonText = 'unlike'" class="w-8 h-8 sm:w-24 sm:h-10 ">
            <img v-if="buttonText=='like'" v-bind:src="'/icons/heart-x-FE6D73.png'" class="rounded-lg hover:bg-black"/>
            <img v-if="buttonText=='unlike'" v-bind:src="'/icons/heart-plus.png'" class="rounded-lg hover:bg-[#FE6D73]"/>
        </button>
    </div>
</template>

<script>

    //message will determine if authenticated user is already following or not
    export default 
    {
        props:['likeprop', 'post'],
        data()
        {
            return{
                buttonText: '',
                postID: this.post['id'],
                username: this.post['username'],
                like: this.likeprop,
                imageSource: '/icons/heart.png',
            }
        },
        methods:
        {
            likePost(e)
            {
                //console.log(this.buttonText);
                if(this.buttonText == 'unlike'){
                    axios.get('/like/' + this.postID).then(response =>{
                        if(response.status == 200){
                            //console.log(response.data);
                            this.like = response.data;
                        }
                    }).catch(error=>{
                        console.log('Error:' + error);
                    });
                } 
                else if(this.buttonText == 'like'){    
                    axios.get('/unlike/' + this.postID).then(response =>{
                        if(response.status == 200){
                            //console.log(response.data);
                            this.like = response.data;
                        }
                    }).catch(error=>{
                        console.log('Error:' + error);
                    });
                }
            },
        }
    }
</script>

<style scoped>
</style>
