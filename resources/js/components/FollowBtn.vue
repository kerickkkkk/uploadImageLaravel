<template>
    <div>
        <button @click="followUser" 
                class="btn btn-sm btn-primary h-100" 
                v-text="followStatus">
        </button>
    </div>
</template>

<script>
    export default {
        props:['userId','follows'],
        data(){
            return{
                status: this.follows
            }
        },
        computed:{
            followStatus(){ 
                return this.status ? 'unFollow' : 'Follow';
            }
        },
        methods:{
            followUser(){
                // 網址位置 localhost/profile/id
                // axios.post('follow/1')  會出現 localhost/profile/follow/1
                // axios.post('/follow/1') 會出現localhost/follow/1
                axios.post(`/follow/${this.userId}`)
                    .then(res=>{
                        this.status = !this.status;
                        console.log(res);

                    })
                    .catch( error =>{
                        // console.log(error.response);
                        if(error.response.status == 401) window.location = '/login';
                    })
            }
        }
    }
</script>
