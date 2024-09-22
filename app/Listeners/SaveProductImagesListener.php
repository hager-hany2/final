<?php

namespace App\Listeners;

use App\Actions\ImageModelSave;
use App\traits\upload_images;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveProductImagesListener
{
    use upload_images;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        foreach ($event->images as $image) {

            $name = $this->upload($image, folder_name: 'products');
            ImageModelSave::make($event->product->id, 'Products', $name); //error here
        }
        //dd('now Listener working', $event->data, $event->images, $event->product);
    }
}
