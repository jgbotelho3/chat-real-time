export default {
    state: {
        messages: [],
        users: [],
    },
    mutations: {
        LOAD_MESSAGES(state, messages) {
            state.messages = messages
        },
        ADD_MESSAGE (state, message){
            state.messages.push(message)
        }
    },
    actions: {
        storeMessage(context, params) {
            return axios.post('/chat/message', params)
                .then(response => context.commit('ADD_MESSAGE', response.data))
        },

        loadMessages(context) {
            return axios.get('/chat/messages')
                .then(response => context.commit('LOAD_MESSAGES', response.data))
        }
    },
    getters: {
        messages(state){
            return _.orderBy(state.messages, 'id', 'asc');
        }
    }
}
