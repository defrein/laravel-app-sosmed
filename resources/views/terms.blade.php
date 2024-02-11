

@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id nemo nobis facere optio aspernatur exercitationem. Cum
                placeat harum quidem ea consequuntur sequi dolor ratione modi quibusdam doloribus, ducimus nihil asperiores dolorum
                repudiandae. Ipsum nostrum, iure excepturi nesciunt eaque dolore ullam assumenda repellendus, corrupti veritatis
                eveniet quaerat molestiae, delectus rerum nulla?
            </div>
        </div>

        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')

        </div>
    </div>
@endsection
