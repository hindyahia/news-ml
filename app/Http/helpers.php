<?php
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

function languages()
{
    $seconds = 3600;
    return Cache::remember('languages', $seconds, function () {
        return Language::get();
    });

}

function file_url($dir, $default = "")
{
    return $dir === $default ? url('/images/' . $dir) : url('/storage/' . $dir);
}
function categories()
{
    return \App\Models\Category::all();
}


function storeFile($file, $folder_name, $old_file = null)
{
    if (is_file($file)) {
        @Storage::delete($old_file);
        $new_file = $file->store($folder_name);
    } else {
        $new_file = $file;
    }
    return $new_file;
}

function settings()
{
    $minutes = 24;
    return Cache::remember('settings', $minutes, function () {

        return Setting::pluck('value', 'key')->map(function ($value, $key) {
            if (in_array($key, Setting::files_name) && !empty($value))
                $value = file_url("setting/$value");

            return $value;
        });
    });
}

function setting_value($key)
{
    $settings = settings();
    return $settings[$key] ?? null;
}

