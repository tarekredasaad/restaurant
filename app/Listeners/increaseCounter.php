<?php

namespace App\Listeners;

use App\Models\Video;
use App\Events\VideoViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class increaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VideoViewer $event)
    {
        if(!session()->has('videoIsVisited')){
        $this->updateViewer($event->video);
        }else{
            return false;
        }
    }
    function updateViewer($video){

        $video->viewers = $video->viewers +1;
        $video->save();
        session()->put('videoIsVisited',$video->id);
    }

}
