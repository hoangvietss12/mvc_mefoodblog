<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\FirebaseException;

$serviceAccountPath = _DIR_ROOT.'/credentials.json';

try {
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccountPath);

    $storage = $firebase->createStorage();

    $bucket = $storage->getBucket();

} catch (FirebaseException $e) {
    echo "Kết nối tới Firebase thất bại: " . $e->getMessage() . "<br>";
} catch (Exception $e) {
    echo "Đã xảy ra lỗi: " . $e->getMessage() . "<br>";
}