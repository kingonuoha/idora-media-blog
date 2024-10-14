<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(9);
        $desc = $this->post_body();
        $author = User::inRandomOrder()->where('role', 1)->first();
        return [
            'author_id' => $author->id,
        // 'category_id',
        'post_slug' =>Str::slug($title),
        'post_content' => $desc,
        'featured_image' => "default.png",
        'post_title' => $title,
        'meta_title' =>$title,
        'meta_desc' => $title,
        'meta_tags' => $this->faker->firstNameFemale(),
        ];
    }
    public function post_body(){
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Quis risus sed vulputate odio ut enim blandit. Cum sociis natoque penatibus et magnis dis parturient montes nascetur. Nullam ac tortor vitae purus faucibus. Accumsan tortor posuere ac ut consequat semper viverra nam. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Nec sagittis aliquam malesuada bibendum arcu vitae. Laoreet sit amet cursus sit amet. Commodo elit at imperdiet dui. Turpis egestas integer eget aliquet nibh praesent tristique magna. Sapien pellentesque habitant morbi tristique senectus. Scelerisque varius morbi enim nunc faucibus a. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar. Quam elementum pulvinar etiam non quam lacus. Vitae ultricies leo integer malesuada. Amet risus nullam eget felis eget. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus a. Mattis aliquam faucibus purus in. Scelerisque varius morbi enim nunc faucibus.

        Sit amet mauris commodo quis imperdiet massa. Massa ultricies mi quis hendrerit dolor magna eget est. Nisl suscipit adipiscing bibendum est ultricies integer quis. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Neque aliquam vestibulum morbi blandit. Fames ac turpis egestas sed. Consectetur lorem donec massa sapien faucibus. Porttitor leo a diam sollicitudin tempor id. Diam sit amet nisl suscipit adipiscing bibendum est ultricies integer. Massa vitae tortor condimentum lacinia quis. Nisi quis eleifend quam adipiscing. Urna porttitor rhoncus dolor purus. Justo donec enim diam vulputate ut. Morbi enim nunc faucibus a pellentesque sit amet porttitor. Condimentum id venenatis a condimentum vitae sapien pellentesque habitant. Nunc id cursus metus aliquam eleifend mi in nulla posuere. Ullamcorper morbi tincidunt ornare massa. Egestas diam in arcu cursus euismod quis viverra. Sit amet mauris commodo quis imperdiet massa.
        
        Vitae elementum curabitur vitae nunc sed velit dignissim. Accumsan sit amet nulla facilisi. Habitant morbi tristique senectus et netus. Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et. At auctor urna nunc id cursus metus aliquam eleifend. Elit sed vulputate mi sit amet mauris commodo quis imperdiet. Magna eget est lorem ipsum dolor sit amet consectetur adipiscing. Sodales neque sodales ut etiam sit amet nisl purus. Consectetur lorem donec massa sapien faucibus et molestie. Est ante in nibh mauris. Aliquam sem fringilla ut morbi. Morbi quis commodo odio aenean sed adipiscing. Nisl nunc mi ipsum faucibus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Tellus molestie nunc non blandit massa. Velit laoreet id donec ultrices tincidunt arcu non sodales. Tincidunt arcu non sodales neque sodales ut etiam.
        
        Nisi lacus sed viverra tellus in hac. Tempus egestas sed sed risus pretium quam. Libero volutpat sed cras ornare arcu dui vivamus arcu felis. Pellentesque nec nam aliquam sem. Faucibus turpis in eu mi bibendum. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Fusce id velit ut tortor. Turpis nunc eget lorem dolor sed viverra ipsum nunc. Diam ut venenatis tellus in metus vulputate eu scelerisque. Suspendisse in est ante in nibh mauris cursus mattis.
        
        Fringilla est ullamcorper eget nulla facilisi etiam. Mauris a diam maecenas sed enim ut sem viverra. Vitae justo eget magna fermentum iaculis eu non diam phasellus. Amet porttitor eget dolor morbi non arcu risus quis. Consectetur a erat nam at lectus urna. A diam maecenas sed enim ut sem viverra aliquet. Sed ullamcorper morbi tincidunt ornare. Dignissim sodales ut eu sem integer vitae justo eget magna. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Turpis egestas sed tempus urna et. Ante metus dictum at tempor commodo ullamcorper. Dignissim suspendisse in est ante in nibh mauris cursus. A diam maecenas sed enim ut sem viverra. Feugiat sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla.';
    }
}
