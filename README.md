# Youtube List Bundle

A bundle provides [YouTube Bundle](https://github.com/heimrichhannot/contao-youtube-bundle) integration for [List Bundle](https://github.com/heimrichhannot/contao-list-bundle).

## Usage

This bundle add a new config element you can use in your list config.

### Template

The config elements add a formatted value `youtubeVideos` containing an array for each youtube field add by an config element.

```php
$templateData = [
    // ...
    'youtubeVideos' => [
        'youtubeField' => [ // The selected youtube field name from config element
            'video' => '' // Generated default template,
            'data' => [] // Video data for custom templates
        ]
    ]
]
``` 

Example custom template:
```yaml

{% if raw.addYouTube == "1" and youtubeVideos.youtube|default%}
    {% include '@VendorMyBundle/youtube/youtube_video_custom.html.twig' with youtubeVideos.youtube.data %}
{% endif %}
```