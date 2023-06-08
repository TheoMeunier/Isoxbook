<?php

namespace App\Http\Controllers\Api\FileManager;

use App\Http\Requests\UploadFileRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiFileController extends AbstractFileManagerController
{
    /**
     * @return Application|ResponseFactory|\Illuminate\Http\Response
     */
    public function delete(string $file)
    {
        $this->filesysteme()->delete($file);

        return response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * @return mixed
     */
    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $files  = $this->filesysteme()->files($folder);

        return collect($files)
            ->filter(fn (string $file) => ! str_starts_with($file, '.'))
            ->values()
            ->map([$this, 'toArray']);
    }

    /**
     * @return array<int>
     */
    public function store(UploadFileRequest $request): array
    {
        /** @var \Illuminate\Http\UploadedFile $file */
        $file     = $request->file('file');
        $folder   = $request->post('folder');
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        /** @phpstan-ignore-next-line  */
        $path     = $file->storeAs($folder, $filename.'_'.$file->hashName(), 'public');

        /* @phpstan-ignore-next-line  */
        return $this->toArray($path);
    }

    public function toArray(string $file): array
    {
        $info = pathinfo($file);
        $disk = $this->filesysteme();

        return [
            'id'        => $file,
            'name'      => $info['basename'],
            'url'       => $disk->url($file),
            'folder'    => pathinfo_dirname($info),
            'thumbnail' => $disk->url($file),
        ];
    }
}
