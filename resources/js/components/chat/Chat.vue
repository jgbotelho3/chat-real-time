<template>
    <div>
        <messages></messages>
        <div class="box-text">
            <textarea @keydown="keyDownMessage" v-model="body" placeholder="Sua mensagem" class="textarea"/>
            <button :disabled="isLoading" @click.prevent="sendMessage" class="btn btn-success">
                Enviar
                <pulse-loader :loading="isLoading" :color="'#fff'" :size="'6px'" class="align"></pulse-loader>
            </button>
        </div>

    </div>
</template>

<script>
import PulseLoader from 'vue-spinner/src/PulseLoader'

export default {
    data() {
        return {
            body: '',
            isLoading: false
        }
    },
    methods: {
        keyDownMessage(event) {
            if (event.keyCode === 13 && !event.shiftKey) {
                event.preventDefault();
                this.sendMessage();
            }
        },

        sendMessage() {

            if (!this.body || this.body.trim() === '' || this.isLoading) {
                return
            }

            this.isLoading = true;

            this.$store.dispatch('storeMessage', {body: this.body})
                .then(() => this.body = '')
                .finally(() => this.isLoading = false);
        }
    },
    components: {
        PulseLoader
    }
}
</script>

<style>
.box-text{
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;

}
.textarea{
    background: #fff;
    flex: 1;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 6px;
    margin-right: 2rem
}

.textarea:focus{
    outline: #1d643b;
    border: 1px solid #1d643b;
}
.align {
    float: right
}

button{
    width: 100px;
}
</style>

