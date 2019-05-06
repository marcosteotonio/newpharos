@extends('layouts.site')
<?php
use Carbon\Carbon;
?>
@section('css_after')
<style>
    .profile_edit{

    }
    .profile_edit__title{
        text-transform: uppercase;
        margin-bottom: 30px;
        font-size: 34px;
        font-weight: 600;
    }
</style>
@endsection

@section('content')
    <div class="container padding-65 profile_edit"> <!-- CONTENT-BEGAN -->
       <div class="row">
            <div class="col-md-3 mobile_hide"> </div>
            <div class="col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile_edit__title">
                            {{ __('profile.edit_profile_title')}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!--  -->
                        @include('includes.profile_details_edit')
                        
                        <hr>
                        <!--  -->
                        @include('includes.profile_main_image_change')

                        
                        <hr>
                        <!--  -->
                        @include('includes.profile_image_form')
                        
                        <hr>
                        <!--  -->
                        @include('includes.profile_videos_form')
                        
                    </div>
                </div>
            </div>
            
       </div>
    </div> <!-- CONTENT-END -->
@endsection

@section('js_after')
    <script type="text/javascript" src="{{ asset('js/plugins/jQuery-Mask/jquery.mask.min.js') }}" async></script>
    <script type="text/javascript" src="{{ asset('js/form.js') }}" async></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('.owl-carousel').owlCarousel({
                items: 4,
                margin:10,
                nav:true,
                dots: false,
                lazyLoadEager: true,
                navText: ['<i class="fa fa-angle-left fa-2x"></i>','<i class="fa fa-angle-right fa-2x"></i>'],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:4
                    }
                }
            }).show()

        });
    </script>
@endsection
