<div class="wrap">
    <div class="main auth_wrap">
        @commonHeader()
        <span id="dirty_content">
            {!! $content !!}
        </span>
    </div>
    @commonFooter()
    <div class="overlay"></div>
    <div class="bg">
        <img data-src="{{asset('/images/bg_1920.jpg')}}" alt="" class="bg_1920 lozad">
        <img data-src="{{asset('/images/bg_1600.jpg')}}" alt="" class="bg_1600 lozad">
        <img data-src="{{asset('/images/bg_1440.jpg')}}" alt="" class="bg_1440 lozad">
        <img data-src="{{asset('/images/bg_1280.jpg')}}" alt="" class="bg_1280 lozad">
        <img data-src="{{asset('/images/bg_768.jpg')}}" alt="" class="bg_768 lozad">
        <img data-src="{{asset('/images/bg_480.jpg')}}" alt="" class="bg_480 lozad">
        <img data-src="{{asset('/images/bg_360.jpg')}}" alt="" class="bg_360 lozad">
    </div>
</div>
