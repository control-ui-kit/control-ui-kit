<?php

namespace ControlUIKit\Helpers;

use League\Uri\Uri;
use League\Uri\UriModifier;

class UrlManipulation
{
    private string $url;
    private ?string $anchor = null;

    public function url($url): self
    {
        $this->url = $url;

        return $this;
    }

    public function withAnchor($anchor): self
    {
        $this->anchor = $anchor;

        return $this;
    }

    public function append($query): string
    {
        $uri = Uri::createFromString($this->url);

        if ($this->anchor) {
            return (string) UriModifier::appendQuery($uri->withFragment($this->anchor), $query);
        }

        return (string) UriModifier::appendQuery($uri, $query);
    }
}
