<template>
    <div>
            <button @click="followUser" v-if="message=='Not Following' ? buttonText = 'Follow' : buttonText = 'Unfollow'">
                {{ buttonText }}
            </button>
    </div>
</template>

<script>
    //user = username of the user to follow
window.csrf_token = "{{ csrf_token() }}";
import axios from 'axios';
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': window.csrf_token
};

    //message will determine if authenticated user is already following or not
    export default 
    {
        props:['message', 'user'],
        data()
        {
            return{
                buttonText: 'Follow',
                userToFollow: this.user,
            }
        },
        methods:
        {
            followUser(e)
            {
                if(this.buttonText == 'Follow'){
                    axios.get('/follow/' + this.userToFollow).then(response =>{
                        if(response.status == 200){
                            console.log('Success:' + response);
                        }
                    }).catch(error=>{
                        console.log('Error:' + error);
                    });
                } 
                else{    
                    axios.get('/unfollow/' + this.userToFollow).then(response =>{
                        if(response.status == 200){
                            console.log('Success:' + response);
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
