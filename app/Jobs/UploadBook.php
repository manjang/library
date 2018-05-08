<?php

namespace App\Jobs;

use Storage;
use File;

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
    public $bookId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Book $book, $bookId)
    {
        $this->book = $book;
        $this->bookId = $bookId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = storage_path() . '/books/' . $this->bookId;
        $fileName = $this->bookId . '.pdf';

        if (Storage::disk('s3images')->put('books/' . $fileName, fopen($path, 'r+'))) {
            File::delete($path);
        }

        $this->book->file = $fileName;
        $this->book->save();
    }
}
