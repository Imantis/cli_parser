<?php

namespace App;

use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

class CustomParser
{
    private $tags_attributes = [];
    private $link;

    /*
     * @param array $tags_attributes
     * @param string $link
     * @return void
     */
    function __construct(array $tags_attributes, string $link)
    {
        $this->tags_attributes = $tags_attributes;
        $this->link = $link;
    }

    /*
     * @return void
     */
    function outputJson()
    {
        $output = [];
        $dom = new Dom;
        $dom->loadFromUrl($this->link, (new Options())->setRemoveScripts(false));

        foreach ($this->tags_attributes as $tag_attribute) {
            $attributes_data = $dom->find($tag_attribute['tag']);

            foreach ($attributes_data as $attribute_data) {
                if ($attribute_data->getAttribute($tag_attribute['attribute'])) {
                    $output[$tag_attribute['tag']][] = $attribute_data->getAttribute($tag_attribute['attribute']);
                }
            }
        }

        echo json_encode($output, JSON_PRETTY_PRINT);
    }
}