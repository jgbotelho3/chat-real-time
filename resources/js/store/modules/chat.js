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
        },

        LOAD_USERS (state, users){
            state.users = users
        },

        USER_JOINING (state, user){
            state.users.push(user)
        },

        USER_LEAVING (state, user){
            state.users = state.users.filter(item => {
                return item.id !== user.id
            })
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
