<template>
    <div id="side-content" class="d-none d-md-block push">
         <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-venus-mars text-muted mr-1"></i> Sexo
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                </div>
            </div>
            
            <div class="block-content">
                <div class="form-group row gutters-tiny items-push">
                    <div class="col-6">
                        <div class="custom-control custom-block custom-control-primary">
                            <input type="checkbox" class="custom-control-input" id="gender-female" name="gender" v-model="filters.gender" value="feminino" @click="vueSliderCallback">
                            <label class="custom-control-label" for="gender-female">
                                <span class="d-block text-center">
                                    Feminino
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="custom-control custom-block custom-control-primary">
                            <input type="checkbox" class="custom-control-input" id="gender-male" name="gender" v-model="filters.gender" value="masculino" @click="vueSliderCallback">
                            <label class="custom-control-label" for="gender-male">
                                <span class="d-block text-center">
                                    Masculino
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-shoe-prints text-muted mr-1"></i> Sapato
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="form-group">
                    <vue-slider v-bind="filters.feet" v-model="filters.feet.value" @callback="vueSliderCallback"></vue-slider>
                </div>
            </div>
        </div>

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-street-view text-muted mr-1"></i> Manequim
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="form-group">
                    <vue-slider v-bind="filters.dummy" v-model="filters.dummy.value" @callback="vueSliderCallback"></vue-slider>
                </div>
            </div>
        </div>

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-portrait text-muted mr-1"></i> Idade
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="form-group">
                    <vue-slider v-bind="filters.age" v-model="filters.age.value" @callback="vueSliderCallback"></vue-slider>
                </div>
            </div>
        </div>

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-dumbbell text-muted mr-1"></i> Peso
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="form-group">
                    <vue-slider v-bind="filters.weight" v-model="filters.weight.value" @callback="vueSliderCallback"></vue-slider>
                </div>
            </div>
        </div>
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-ruler-vertical text-muted mr-1"></i> Altura
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="form-group">
                    <vue-slider v-bind="filters.height" v-model="filters.height.value" @callback="vueSliderCallback"></vue-slider>
                </div>
            </div>
        </div>    
    </div>
</template>

<script>

import vueSlider from 'vue-slider-component'

export default {
    name: 'ProfileFilter',
    components: {
        vueSlider
    },
    data() {
        return {
            filters: {
                gender: [],
                feet: {
                    value: [34, 40],
                    min: 15,
                    max: 50
                },
                dummy: {
                    value: [38, 44],
                    min: 0,
                    max: 60,
                    interval: 2,
                },
                age: {
                    value: [18, 30],
                    min: 1,
                    max: 100
                },
                weight: {
                    value: [50, 77],
                    min: 2,
                    max: 150,
                    formatter: "{value} kg"
                },
                height: {
                    value: [1.40, 1.80],
                    min: 1,
                    max: 2.20,
                    interval: 0.1,
                    formatter: "{value} m"
                },
            }
        }
    },
    created() {
        this.vueSliderCallback()
    },
    methods: {
        vueSliderCallback () {
            this.$store.commit('setFilters', this.filters);
        }
    }
}
</script>