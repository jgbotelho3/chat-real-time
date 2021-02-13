<template>
    <div class="chat-message">
        <div class="chat-info">
            <strong>{{message.user.name}}</strong> <span>{{message.created_at}}</span>
        </div>
        <div class="message-container">

            <div class="chat-img" v-if="message.user.image">
                <div class="img-box">
                    <img :src="`/storage/users/${message.user.image}`" :alt="message.user.name" />
                </div>
            </div>
            <div class="chat-img" v-else>
                <img src="/imgs/avatar.png" :alt="message.user.name" />
            </div>
            <div :class="['message', {'owner': message.owner}]">
                {{message.body}}
            </div>
        </div>



    </div>
</template>

<script>
export default {
    props: ['message']
}
</script>

<style scoped>
.chat-message{
    float: left;
    width: 100%;
    margin: 1rem;
}

.chat-info{
    display:flex;
    justify-content: space-between;
}

.chat-info span{
    margin-right: 3rem;
    font-size: .8rem;
}

.message-container{
    display: flex;
    align-items: center;
}

.chat-img{
    width: 100%;
    height: 60px;
    max-height: 60px;
    margin-right: 1rem;
    max-width: 60px;
}

.img-box{
    width: 100%;
    max-width: 80px;
    height: 80px;
    max-height: 80px;
}

img{
    max-width: 100%;
    height: 100%;
    border-radius: 20%;
    border: 1px solid #fff;
    background: #ccc;
    object-fit: cover;
}

.message{
    color: #000;
    padding: 0.8rem;
    background: #ccc;
    border: 1px solid #fff;
    border-radius: 10px;
    position: relative;
}

.message.owner{
    background: #dcf8c6;
}

.message::before{
    content: '';
    position: absolute;
    right: 100%;
    top: 14px;
    width: 0;
    height: 0;
    pointer-events: none;
    border: solid transparent;
    border-right-color: #ccc;
    border-width: 10px;
}

.message.owner::before{
    border-right-color: #dcf8c6;
}
</style>
