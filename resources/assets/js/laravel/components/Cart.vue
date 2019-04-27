<template>
    <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-shopping-basket"></i>
            <span class="badge badge-secondary badge-pill">{{ $store.state.cartCount }}</span>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
            <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                Carrinho
            </div>
            <ul class="nav-items my-2" v-if="$store.state.cart.length > 0">
                <li v-for="item in $store.state.cart" :key="item.id">
                    <a class="text-dark media py-2" href="javascript:void(0)">
                        <div class="mx-3">
                            <i class="fa fa-fw fa-user-plus text-info"></i>
                        </div>
                        <div class="media-body font-size-sm pr-2">
                            <div class="font-w600">{{ item.title }}</div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="p-2 border-top">
                <a class="btn btn-light btn-block text-center" href="javascript:void(0)">
                    <i class="fa fa-fw fa-eye mr-1"></i> Finalizar
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
