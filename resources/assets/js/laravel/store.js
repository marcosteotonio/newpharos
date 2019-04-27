let store = {
    state: {
        cart: [],
        cartCount: 0,
        filters: {},
        profiles: [],
        profileList: [],
    },

    mutations: {
        addToCart(state, item) {
            state.cart.push(item);
            state.cartCount++;
        },
        setProfiles(state, profiles) {
            state.profiles = state.profileList = profiles;
        },
        setFilters(state, filters) {
            
            state.filters = filters;
            
            var feet = false;
            var dummy = false;
            var weight = false;
            var height = false;

            state.profileList = state.profiles.filter((profile) => {

                // Validação filtro sapatos.
                if (profile.feet >= state.filters.feet.value[0] && profile.feet <= state.filters.feet.value[1]) {
                    feet = true;
                }
                
                // Validação filtro manequim.
                if (profile.dummy >= state.filters.dummy.value[0] && profile.dummy <= state.filters.dummy.value[1]) {
                    dummy = true;
                }

                // Validação filtro peso.
                if (profile.weight >= state.filters.weight.value[0] && profile.weight <= state.filters.weight.value[1]) {
                    weight = true;
                }

                // Validação filtro altura.
                if (profile.height >= state.filters.height.value[0] && profile.height <= state.filters.height.value[1]) {
                    height = true;
                }

                if (feet && dummy && weight && height) {
                    return true;
                }

                return false;
            });
        },
    },
    actions: {
        getProfiles({ commit }) {
            axios.get('/api/profiles').then(response => {
                commit('setProfiles', response.data);
            });
        }
    }
};

export default store;