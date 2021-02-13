import store from './store/store';

Echo.join('chat')
        .here(users => {
           store.commit('LOAD_USERS', users);
        })
        .joining(user => {
            store.commit('USER_JOINING', user);
        })
    .leaving(user => {
        store.commit('USER_LEAVING', user);
    })
    .listen('Chat.MessageCreated', event => {
        store.commit('ADD_MESSAGE', event.message);
    })
