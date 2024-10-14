<aside>
    <div class="sidebar-item search">
        <div class="sidebar-info">
            <form action="{{route('search_posts')}}">
                <input type="text" name="query" value="{{Request('query')}}" class="form-control">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="sidebar-item recent-post">
        <div class="title">
            <h4>Recommended Post</h4>
        </div>
        <ul>
            <x-IDM-recommended-posts />

        </ul>
    </div>
    <div class="sidebar-item category">
        <div class="title">
            <h4>category list</h4>
        </div>
        <div class="sidebar-info">
            <ul>
                <x-IDM-category-list />
            </ul>
        </div>
    </div>
    <div class="sidebar-item gallery">
        <div class="title">
            <h4>Gallery</h4>
        </div>
        <div class="sidebar-info">
            <ul>
                {{
                    $id = (isset($post_id)? $post_id : null)
                }}
                @foreach (latest_sidebar_images($id, 6) as $item)
                <li>
                    <a href="{{route('read_post', $item->post_slug)}}">
                        <img src="{{asset('storage/images/post_images/thumbnails/thumb_'.$item->featured_image)}}" alt="thumb">
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <div class="sidebar-item social-sidebar">
        <div class="title">
            <h4>follow us</h4>
        </div>
        <div class="sidebar-info">
            <ul>
                @if (!empty(site_socials()->blog_facebook))
                <li class="facebook">
                    <a href="{{site_socials()->blog_facebook}}">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                @endif
                @if (!empty(site_socials()->blog_twitter))
                <li class="twitter">
                    <a href="{{site_socials()->blog_twitter}}">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                @endif
                @if (!empty(site_socials()->blog_youtube))
                <li class="youtube">
                    <a href="{{site_socials()->blog_youtube}}">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
                @endif
                @if (!empty(site_socials()->blog_instagram))
                <li class="g-plus">
                    <a href="{{site_socials()->blog_instagram}}">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                @endif

               
            </ul>
        </div>
    </div>
    <div class="sidebar-item tags">
        <div class="title">
            <h4>tags</h4>
        </div>
        <div class="sidebar-info">
            <ul>
                <li><a href="#" onclick="alert('Invalid input')">Fashion</a>
                </li>
                <li><a href="#" onclick="alert('Invalid input')">Education</a>
                </li>
                <li><a href="#" onclick="alert('Invalid input')">nation</a>
                </li>
                <li><a href="#" onclick="alert('Invalid input')">study</a>
                </li>
                <li><a href="#" onclick="alert('Invalid input')">health</a>
                </li>
                <li><a href="#" onclick="alert('Invalid input')">food</a>
                </li>
                <li><a href="#" onclick="alert('Invalid input')">travel</a>
                </li>
                <li><a href="#" onclick="alert('Invalid input')">science</a>
                </li>
            </ul>
        </div>
    </div>
</aside>