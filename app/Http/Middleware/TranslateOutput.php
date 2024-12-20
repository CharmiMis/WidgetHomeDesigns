<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\TranslationService;


class TranslateOutput
{
    protected $translator;

    public function __construct(TranslationService $translator)
    {
        $this->translator = $translator;
    }

    public function handle($request, Closure $next)
    {
        // Process the request and capture the response
        $response = $next($request);

        // Only process HTML responses
        if (strpos($response->headers->get('Content-Type'), 'text/html') !== false) {
            $targetLanguage = $request->session()->get('preffrelang', 'en');
            // $languages = ['hi', 'zh', 'ro']; // Languages for testing
            // $targetLanguage = $languages[array_rand($languages)];

            // Get the rendered HTML content
            $content = $response->getContent();

            // Translate the HTML content, excluding <script> and <style> blocks
            $translatedContent = $this->translateHtml($content, $targetLanguage);

            // Set the translated content as the response
            $response->setContent($translatedContent);
        }

        return $response;
    }

    protected function translateHtml($html, $language)
    {
        // Pattern to exclude content within <script> and <style> tags, and elements with data-no-translate
        $pattern = '/(<(script|style)[^>]*>.*?<\/\2>|<[^>]*data-no-translate[^>]*>.*?<\/[^>]+>|>)([^<]*)(?=<|$)/is';

        return preg_replace_callback(
            $pattern,
            function ($matches) use ($language) {
                $fullMatch = $matches[0];
                $text = isset($matches[3]) ? trim($matches[3]) : '';

                // Skip translation if the content is inside <script>/<style> or if empty/numeric
                if ($text === '' || is_numeric($text) || strpos($fullMatch, 'data-no-translate') !== false) {
                    return $fullMatch;
                }

                // Translate the text
                $translatedText = $this->translator->translate($text, $language);
                return str_replace($text, $translatedText, $fullMatch);
            },
            $html
        );
    }
}
