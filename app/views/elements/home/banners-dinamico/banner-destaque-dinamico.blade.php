<div class="col-lg-6 hidden-md">
    <?php $rand_keys = array_rand($banners200x400)?>
    <a rel="nofollow" href="{{route($banners200x400[$rand_keys]['url'])}}">
        <img class="match-height" src="{{asset($banners200x400[$rand_keys]['imagem'])}}" width="200" height="480"
             alt="">
    </a>
</div>