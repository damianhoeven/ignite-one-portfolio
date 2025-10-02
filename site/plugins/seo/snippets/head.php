<?php

/**
 * @var \Kirby\Cms\Page $page
 */

use Kirby\Cms\Html;

$tags = $page->metadata()->snippetData();

// ❌ Verwijder bestaande og:locale tag
$tags = array_filter($tags, function ($tag) {
    return !(
        isset($tag['attributes']['property']) &&
        $tag['attributes']['property'] === 'og:locale'
    );
});

// ✅ Voeg onze eigen og:locale tag toe aan het einde van de tags-lijst
$tags[] = [
    'tag' => 'meta',
    'attributes' => [
        'property' => 'og:locale',
        'content' => option('tobimori.seo.lang', 'nl_NL'),
    ],
];

// Als we slots gebruiken, eerst prioriteitstags
if (isset($slot)) {
    foreach (array_filter($tags, fn ($tag) => $tag['priority'] ?? false) as $tag) {
        echo Html::tag($tag['tag'], $tag['content'] ?? null, $tag['attributes'] ?? []) . PHP_EOL;
    }

    echo $slot;

    $tags = array_filter($tags, fn ($tag) => !($tag['priority'] ?? false));
}

// Normale tags
foreach ($tags as $tag) {
    echo Html::tag($tag['tag'], $tag['content'] ?? null, $tag['attributes'] ?? []) . PHP_EOL;
}
