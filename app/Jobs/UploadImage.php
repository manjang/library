<?php

namespace App\Jobs;

use Storage;
use File;
use Image;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $book;
    public $fileId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Book $book, $fileId)
    {
        $this->book = $book;
        $this->fileId = $fileId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = storage_path() . '/uploads/' . $this->fileId;
        $fileName = $this->fileId . '.png';

        Image::make($path)->encode('png')->fit(220, 310, function ($c) {
            $c->upsize();
        })->save();

        if (Storage::disk('s3images')->put('images/' . $fileName, fopen($path, 'r+'))) {
            File::delete($path);
        }

        $this->book->thumbnail = $fileName;
        $this->book->save();
    }
}
