<template>
    <div class="message">
        <strong>{{message.user.name}}</strong>: {{message.body}}
    </div>
</template>

<script>
export default {
    props: ['message']
}
</script>

<style scoped>

</style>
