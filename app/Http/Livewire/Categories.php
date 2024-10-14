<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Notifications\blogNotification;
use Illuminate\Support\Facades\Notification;

class Categories extends Component
{
    public $category_name;
    public $selected_category_id;
    public $updateCategoryMode = false;

    public $subcategory_name;
    public $selected_subcategory_id;
    public $updateSubCategoryMode = false;
    public $parent_category;

    protected $listeners = [
        'resetModalForm',
        "deleteCtegoryAction",
        "deletesubCategoryAction"
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->category_name = null;
        $this->subcategory_name = null;
        $this->parent_category = null;
    }
    
    public function addCategory(){
        $this->validate([
            "category_name"=>'required|unique:categories,category_name'
        ]);

        $category = new Category();
        $category->category_name = $this->category_name;
        $saved = $category->save();

        
        $admin = User::where('role', 1)->get();
        if($saved){
            Notification::send($admin, new blogNotification([
                'desc'=>auth()->user()->name." Created A new Category (".$this->category_name.")",
                'blog_image' => '',
                'title'=> 'new Blog Category Added',
                'time'=> now(),
                'type' => 'success'
            ]));
            $this->dispatchBrowserEvent('hideCategoriesModal');
            $this->category_name = null;
            $this->showToast("New Category Added Successfully", 'success');

            
        }else{
            Notification::send($admin, new blogNotification([
                'desc'=>auth()->user()->name." Failed to  Create A new Category (".$this->category_name.")",
                'blog_image' => '',
                'title'=> 'new Blog Category Failed!',
                'time'=> now(),
                'type' => 'danger'
            ]));
            $this->showToast("something Went Wrong", 'error');
        }
    }
    public function addSubCategory(){
        $this->validate([
            "parent_category"=>'required',
            "subcategory_name"=>'required|unique:sub_categories,subcategory_name'
        ]);

        $subcategory = new SubCategory();
        $subcategory->subcategory_name = $this->subcategory_name;
        $subcategory->slug = Str::slug($this->subcategory_name);
        $subcategory->parent_category = $this->parent_category;
        $saved = $subcategory->save();
        $admin = User::where('role', 1)->get();

        if($saved){
            $this->dispatchBrowserEvent('hideSubCategoriesModal');
            Notification::send($admin, new blogNotification([
                'desc'=>auth()->user()->name." Created A new Sub-Category (".$this->subcategory_name.")",
                'blog_image' => '',
                'title'=> 'new Blog Sub-Category Added',
                'time'=> now(),
                'type' => 'success'
            ]));
            $this->subcategory_name = null;
            $this->parent_category = null;
            $this->showToast("New Sub Category Added Successfully", 'success');
           
        }else{
            $this->showToast("something Went Wrong", 'error');
        }
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        $this->selected_category_id = $category->id;
        $this->category_name = $category->category_name;
        $this->updateCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showCategoriesModa');
    }
    public function editSubCategory($id){
        $subcategory = SubCategory::findOrFail($id);
        $this->selected_subcategory_id = $subcategory->id;
        $this->parent_category = $subcategory->parent_category;
        $this->subcategory_name = $subcategory->subcategory_name;
        $this->updateSubCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showSubCategoriesModa');
    }

    public function updateCategory()
    {
        $this->validate([
            "category_name"=>'required|unique:categories,category_name'
        ]);
        $category = Category::findOrFail($this->selected_category_id);
        $category->category_name = $this->category_name;
        $updated = $category->save();
        if($updated){
              //send Notification To all Admin
              $admin = User::where('role', 1)->get();
              Notification::send($admin, new blogNotification([
                  'desc'=>auth()->user()->name." Updated a category =>(".$this->category_name.")",
                  'blog_image' => '',
                  'title'=> 'Category Updated!',
                  'time'=> now(),
                  'type' => 'info'
              ]));
            $this->dispatchBrowserEvent('hideCategoriesModal');
            $this->updateCategoryMode = false;
            $this->showToast("Category Updated Successfully", 'success');
        }else{
            $this->showToast("something Went Wrong", 'error');
        }

    }
    public function updateSubCategory()
    {
        $this->validate([
            "parent_category"=>'required',
            "subcategory_name"=>'required|unique:sub_categories,subcategory_name',
            // $this->selected_subcategory_id,
        ]);
        $subcategory = SubCategory::findOrFail($this->selected_subcategory_id);
        $subcategory->subcategory_name = $this->subcategory_name;
        $subcategory->slug = Str::slug($this->subcategory_name);
        $subcategory->parent_category = $this->parent_category;
        $updated = $subcategory->save();
        if($updated){
             //send Notification To all Admin
             $admin = User::where('role', 1)->get();
             Notification::send($admin, new blogNotification([
                 'desc'=>auth()->user()->name." Updated a Sub-category =>(".$this->subcategory_name.")",
                 'blog_image' => '',
                 'title'=> 'Sub Category Updated!',
                 'time'=> now(),
                 'type' => 'success'
             ]));
            $this->dispatchBrowserEvent('hideSubCategoriesModal');
            $this->updateSubCategoryMode = false;
            $this->showToast("Sub Category Updated Successfully", 'success');
        }else{
            $this->showToast("something Went Wrong", 'error');
        }

    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $this->dispatchBrowserEvent('deleteCategoryConfirm', [
           "title" => "Are you sure?",
           "body" => "You are about to delete <b>".$category->category_name."</b> Category.",
           "id"=> $id
        ]);
    }
    public function deleteCtegoryAction($id){
        $category = Category::where('id',$id)->first();
        $subcategories = SubCategory::where('parent_category', $category->id)->whereHas("posts")->with('posts')->get();

        if(!empty($subcategories) && count($subcategories) > 0){
            $totalPost = 0;
            foreach ($subcategories  as $subcat) {
               $totalPost += Post::where('category_id', $subcat->id)->get()->count();
            }
            $this->showToast("this category has [".$totalPost."] posts related to it, cannot be deleted!", "error");
        }else{
            
            SubCategory::where("parent_category", $category->id)->delete();
            $category->delete();
            $this->showToast("Category Delete was Successfully",'info');

        }

    }

    public function deleteSubCategory($id){
        $subcategory = SubCategory::find($id);
        $this->dispatchBrowserEvent('deleteSubCategoryConfirm', [
            "title" => "Are you sure?",
            "body" => "You are about to delete <b>".$subcategory->subcategory_name."</b> Category.",
            "id"=> $id
         ]);
    }
    public function deletesubCategoryAction($id){
        $subcategory = SubCategory::where('id',$id)->first();
        $posts = Post::where('category_id', $subcategory->id)->get()->toArray();

        if(!empty($posts) && count($posts) > 0){
            $this->showToast("This Subcategory has (".count($posts).") Posts Related to it, it cannot be deleted!", "error");
        }else{
             //send Notification To all Admin
             $admin = User::where('role', 1)->get();
             Notification::send($admin, new blogNotification([
                 'desc'=>auth()->user()->name." Deleted a Sub-category =>(".$this->subcategory_name.")",
                 'blog_image' => '',
                 'title'=> 'Sub Category Deleted!',
                 'time'=> now(),
                 'type' => 'danger'
             ]));
            $subcategory->delete();
            $this->showToast("Subcategory Has been successfully Deleted!", "info");
        }
    }

    public function showToast($message, $type){
        return $this->dispatchBrowserEvent('showToast', [
            'message'=> $message,
            'type'=>$type
        ]);
    }

    public function render()
    {
        return view('livewire.categories', [
            'categories'=>Category::orderBy('ordering', 'asc')->get(),
            'subcategories'=>SubCategory::orderBy('ordering', 'asc')->get(),
        ]);
    }
}
