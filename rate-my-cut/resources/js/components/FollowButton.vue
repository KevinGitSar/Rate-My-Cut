<template>
    <div>
        <button @click="followUser" v-if="message == true ? buttonText = 'Unfollow' : buttonText = 'Follow'">
            {{ buttonText }}
        </button>
    </div>
</template>

<script>

    //message will determine if authenticated user is already following or not
    export default 
    {
        props:['messageprop', 'user'],
        data()
        {
            return{
                buttonText: '',
                userToFollow: this.user,
                message: this.messageprop,
            }
        },
        methods:
        {
            followUser(e)
            {
                //console.log(this.buttonText);
                if(this.buttonText == 'Follow'){
                    axios.get('/follow/' + this.userToFollow).then(response =>{
                        if(response.status == 200){
                            //console.log(response.data);
                            this.message = response.data;
                        }
                    }).catch(error=>{
                        console.log('Error:' + error);
                    });
                } 
                else if(this.buttonText == 'Unfollow'){    
                    axios.get('/unfollow/' + this.userToFollow).then(response =>{
                        if(response.status == 200){
                            //console.log(response.data);
                            this.message = response.data;
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
    button{
        background-color: white;
        border: 2px solid black;
        border-radius: 15px;
        padding: 2px;
    }
</style>
