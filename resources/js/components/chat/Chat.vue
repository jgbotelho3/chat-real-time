<template>
    <div>
        <messages></messages>
        <div class="form-group">
            <textarea @keydown="keyDownMessage" v-model="body" placeholder="Sua mensagem" class="form-control"/>
        </div>
        <button :disabled="isLoading" @click.prevent="sendMessage" class="btn btn-success">
            Enviar
            <pulse-loader :loading="isLoading" :color="'#fff'" :size="'6px'" class="align"></pulse-loader>
        </button>
    </div>
</template>

<script>
import PulseLoader from 'vue-spinner/src/PulseLoader'
export default {
    data(){
        return {
            body: '',
            isLoading: false
        }
    },
    methods: {
        keyDownMessage(event){
            if(event.keyCode === 13 && !event.shiftKey){
                event.preventDefault();
                this.sendMessage();
            }
        },

        sendMessage(){

            if(!this.body || this.body.trim() === '' || this.isLoading){
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
    .align{ float: right}
</style>

