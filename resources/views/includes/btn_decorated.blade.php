<?php
/**
 * Uma breve explicação:
 * Isso gera um botão e acaba usando os dados url e Text.
 */
?>
<style type="text/css">
    .btn__decorated{
        
    }
    .btn__decorated:hover{
        filter: brightness(1.2);
        
    }
    .btn__decorated:hover{  
        transform: scale(1.1);
    }
    .btn__decorated_main{
        background-image: linear-gradient(#BB4F28,#8F3F20);
        height: 50px;
        background-size: 200% 57px;
        font-size: medium;
        text-transform: uppercase;
        color: white;
        font-weight: 800;
        display: inline-grid;
        background-repeat: repeat-y;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr;
        align-items: center;
        padding: 0px 15px;
    }
    .btn__decorated_side{
        height: 50px;
        display: inline-block;
        padding: 0px;
        margin: -5px;
        top: -1px;
        position: relative;
        width: 25px;
    }
    .btn__decorated_side_left{
        left: 0px;
    }
    .btn__decorated_side_right{
        right: 0px;
    }
    .btn__decorated_side > img{
        height: 100%;
        width: 100%
    }
</style>
<a href="<?php if(isset($url)){ echo $url; }else{ echo '#';}?>" class="btn__decorated">
    <div class="btn__decorated_side btn__decorated_side_left">
        <img src="<?php echo url( env('APP_PREFIX') . '/images/btn-left.png' ); ?>" alt=""> 
    </div>
    <div class="btn__decorated_main">
    <?php if(isset($text)){ echo $text; }else{ echo '#';}?>
    </div>
    <div class="btn__decorated_side btn__decorated_side_right">
    <img src="<?php echo url( env('APP_PREFIX') . '/images/btn-right.png' ); ?>" alt=""> 
    </div>
</a>