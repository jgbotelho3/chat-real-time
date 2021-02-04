export default {
    state: {
        messages: {},
        users: {},
    },
    mutations:{},
    actions:{
        storeMessage(context, params){
            return axios.post('/chat/message', params)
                .then(response => console.log(response))
        }
    },
    getters: {}
}
