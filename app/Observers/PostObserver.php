<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    
    public function creating(Post $post)
    {
        if(! \App::runningInConsole()){
            $post->user_id = auth()->user()->id;
        }
        
    }

   
    public function updated(Post $post)
    {
       
    } 

    
    public function deleting(Post $post)
    {
        if($post->image){
            Storage::delete($post->image->url);
        }
    }

    
    public function restored(Post $post)
    {
        
    }

    public function forceDeleted(Post $post)
    {
        
    }
}
