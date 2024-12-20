<?php

namespace core;

class Cache
{
    use TSingleton;

    public function set($key, $data, $seconds = 3600): bool
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        if (file_put_contents($file, serialize($content))) {
            return true;
        } else {
            return false;
        }
    }

    public function get($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']) {
                return $content['data'];
            } else {
                unlink($file);
            }
        }
    }

    public function delete($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }
}