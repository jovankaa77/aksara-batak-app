<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SupabaseStorageService
{
    protected $url;
    protected $apiKey;
    protected $bucket;

    public function __construct()
    {
        $this->url = config('services.supabase.url');
        $this->apiKey = config('services.supabase.service_role_key');
        $this->bucket = 'post-images';
    }

    public function upload($file, $folder = 'thumbnails')
    {
        $filename = $folder . '/' . Str::uuid() . '.' . $file->getClientOriginalExtension();
        
        $response = Http::withHeaders([
            'apikey' => $this->apiKey,
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->attach(
            'thumbnail',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->put($this->url . "/storage/v1/object/$this->bucket/$filename");
            
        if (!$response->successful()) {
            throw new \Exception("Upload to Supabase failed: " . $response->body());
        }

        return $this->url . "/storage/v1/object/public/$this->bucket/$filename";
    }

    public function delete($fileUrl)
    {
        // Ambil path relatif setelah "/storage/v1/object/public/"
        $path = str_replace($this->url . "/storage/v1/object/public/$this->bucket/", '', $fileUrl);

        $response = Http::withHeaders([
            'apikey' => $this->apiKey,
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->delete($this->url . "/storage/v1/object/$this->bucket", [
            'prefixes' => [$path]
        ]);

        if (!$response->successful()) {
            throw new \Exception("Failed to delete file: " . $response->body());
        }

        return true;
    }

}
