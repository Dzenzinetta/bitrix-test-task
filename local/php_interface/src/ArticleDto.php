<?php

namespace Testtask;

class ArticleDto
{
    public string $id;

    public string $title;

    public string $previewText = '';

    public string $detailText = '';

    public ?string $imageUrl = null;

    public ?string $sourceLink = null;

    public function __construct(array $data)
    {
        $this->id = (string) ($data['id'] ?? '');
        $this->title = (string) ($data['title'] ?? '');
        $this->previewText = (string) ($data['previewText'] ?? '');
        $this->detailText = (string) ($data['detailText'] ?? '');
        $this->imageUrl = isset($data['imageUrl']) ? (string) $data['imageUrl'] : null;
        $this->sourceLink = isset($data['url']) ? (string) $data['url'] : null;
    }
}
