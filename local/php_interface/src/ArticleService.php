<?php

namespace Testtask;

class ArticleService
{
    private $parser;

    public function __construct()
    {
        $this->parser = new LentaParser;
    }

    /**
     * @return ArticleDto[]
     */
    public function getArticlesAboutMcDonalds(): array
    {
        $rawArticles = $this->getRawFromParser();

        $articles = [];
        foreach ($rawArticles as $ra) {
            $article = new ArticleDto($ra);
            if ($article->id !== 0 && $article->title !== '') {
                $articles[] = $article;
            }
        }

        return $articles;
    }

    private function getRawFromParser(): array
    {
        return $this->parser->getNews();
    }
}
