@foreach (recommended_posts() as $post)
<li>
    <div class="thumb">
        <a href="{{route('read_post', $post->post_slug)}}">
            <img src="{{asset('storage/images/post_images/thumbnails/thumb_'.$post->featured_image)}}" alt="Thumb">
        </a>
    </div>
    <div class="info">
        <div class="meta-title">
            <span class="post-date"><i class="fas fa-clock"></i> {{date_formatter($post->created_at)}}</span>
        </div>
        <a href="{{route('read_post', $post->post_slug)}}">{{$post->post_title}}</a>
    </div>
</li>
@endforeach