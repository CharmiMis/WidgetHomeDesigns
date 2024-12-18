<?php
//app/Services/TranslationService.php
namespace App\Services;

use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Support\Facades\Cache;

class TranslationService
{
    protected $translate;

    public function __construct()
    {
        $this->translate = new TranslateClient([
            'key' => env('GOOGLE_API_KEY')
        ]);
    }

    public function translate($text, $targetLanguage = 'en')
    {
        $cacheKey = 'translation_' . md5($text . $targetLanguage);

        // Caching the translated text for 24 hours to reduce API calls
        return Cache::remember($cacheKey, 24 * 60 * 60, function () use ($text, $targetLanguage) {
            $result = $this->translate->translate($text, [
                'target' => $targetLanguage,
            ]);

            return $result['text'] ?? $text;
        });
    }
}
