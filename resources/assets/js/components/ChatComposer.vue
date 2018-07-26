<template lang="html">
   <div class="chat-composer">
        <input class="form-control" type="text" placeholder="start messaging" v-model="messageText" @keyup.enter="sendMessage"/>
        <button class="btn btn-primary" @click="sendMessage">Send</button>
   </div>
</template>

<script>
    export default {
        data(){
            return{
                messageText: ''
            }
        },

        methods: {
            sendMessage(){

                this.$emit('messagesent', {

                    message: this.messageText,
                    user: "John Doe"

                    });

                this.messageText = '';
            }
        }
    }
</script>

<style lang="css">
.chat-composer{
    display: flex;
}
.chat-composer input{
    flex: 1 auto;
}
.chat-composer button{
    border-radus: 0;
}
</style>
