<template>
    <div>
        <h3>{{ users.length }} online</h3>
        <div class="users">
            <div class="user" v-for="user in 10" key="user">
                <div class="user-img">
                    <img src="/imgs/avatar.png" alt=""/>
                </div>

                <strong>Nome user</strong>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        users() {
            return [];
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
}

.user-img img {
    max-width: 60px;
    border-radius: 100%;
    border: 1px solid #ccc;
}

.user strong {
}
</style>
