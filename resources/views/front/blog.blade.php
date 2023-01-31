@extends('front.layout.master')
@section('title')
    {{trans('app.blog')}}
@endsection
@section('css')
@endsection
@section('content')
    <!-- start blog section -->
    <section id="blog" class="blog-section blog-style-two ptb-100 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Latest News & Blog</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="item-single mb-30">
                        <div class="image">
                            @if($blog->photo)
                                <a href="{{route('user_blog_details',$blog->id)}}">
                                <img src="{{asset('admin/pictures/blog/' . $blog->id . '/'. $blog->photo->Filename)}}" alt="Demo Image"/>
                                </a>
                            @endif
                        </div>
                        <div class="content">
                            <ul class="info-list">
                                <li><i class='bx bx-calendar'></i> {{$blog->created_at->diffforhumans()}}</li>
                            </ul>
                            <h3>
                                <a href="{{route('user_blog_details',encrypt($blog->id))}}">{{$blog->name}}</a>
                            </h3>
                            <p>
                                {!! $blog->notes !!}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12 col-md-12">
                    <div class="pagination text-center">
                        {{ $blogs->render("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end blog section -->
@endsection
@section('js')
@endsection


