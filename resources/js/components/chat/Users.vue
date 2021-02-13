<template>
    <div>
        <h3>{{ users.length }} online</h3>
        <div class="users">
            <div class="user" v-for="user in users" :key="user.id">
                <div class="user-img" v-if="user.image">
                    <div class="img-box">
                        <img :src="`/storage/users/${user.image}`" :alt="user.name"/>
                    </div>

                </div>
                <div class="user-img" v-else>
                    <img src="/imgs/avatar.png" alt=""/>
                </div>

                <strong v-text="user.name"></strong>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        users() {
            return this.$store.state.chat.users;
        }
    }
};
</script>

<style scoped>
.users {
height: 400px;
    max-height: 400px;
overflow-x: hidden;
    overflow-y: auto;
}

.user {
    display: flex;
    align-items: center;
    margin-top: 1rem;
}

.user-img {
    margin-right: 1rem;
    margin-top: 1rem;
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

img {
    max-width: 100%;
    height: 100%;
    border-radius: 20%;
    border: 1px solid #fff;
    background: #ccc;
    object-fit: cover;
}

.user strong {
}
</style>
