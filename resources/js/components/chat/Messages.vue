<template>
    <div class="messageContainer" ref="messages">
        <scale-loader :loading="isLoading"></scale-loader>
        <message-interface v-for="message in messages"
                 :key="message.id"
                 :message="message">
        </message-interface>
    </div>

</template>

<script>
import ScaleLoader from 'vue-spinner/src/ScaleLoader'

export default {
    created() {
        this.loadingMessages();
    },
    data() {
        return {
            isLoading: false
        }
    },

    computed: {
        messages() {
            return this.$store.getters.messages;
        }
    },
    methods: {
        loadingMessages() {
            this.isLoading = true;

            this.$store.dispatch('loadMessages').finally(() => {
                this.isLoading = false
                this.scrollMessages()
            })
        },

        scrollMessages(){
            setTimeout(() => {
                // this.$refs.messages.scrollTo(0, this.$refs.messages.scrollHeight);
                this.$refs.messages.scroll({
                    top: this.$refs.messages.scrollHeight,
                    left: 0,
                    behavior: 'smooth'
                })
            }, 100)
        }
    },

    watch: {
        messages(){
            this.scrollMessages()
        }
    },
    components: {
        ScaleLoader
    }

}
</script>

<style scoped>
.messageContainer{
    height: 400px;
    max-height: 400px;
    overflow-x: hidden;
    overflow-y: auto;

}
</style>
