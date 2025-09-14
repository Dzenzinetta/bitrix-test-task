<?php
namespace Kustov\Testtask;

include_once 'simple_html_dom.php';

error_reporting(E_ALL ^ E_DEPRECATED);

define("LIMIT", 10);
define("WELCOME", "Приветствую! этот текст тут только для того, чтобы пофлексить\n\n");

class LentaParser
{
    private string $url;
    private string $lentaUrl;
    private \simple_html_dom $dom;

    // TO-DO: Вынести селекторы в константы
    
    public function __construct()
    {
        $this->lentaUrl = 'https://lenta.ru/';
        $this->dom = new \simple_html_dom();
    }
    
    public function getNewsByKeyword(): void
    {
        $news = [];
        $mcdonaldsPage = $this->lentaUrl . 'tags/organizations/mcdonald-s/';

        echo WELCOME;
        
        try {

            $page = $this->curlGetPage($mcdonaldsPage);
          
            $this->dom->load($page);

            $newsItems = $this->dom->find('.content-tags-page__item');
            echo "Найдено: " . count($newsItems) . "\n";

            foreach ($newsItems as $item) {
              if (count($news) > 0) {
                break;
              }

              $scamBanner = $item->find('.card-full-other__wrap', 0); 
              if($scamBanner){
                continue;
              }

              $newsTitle = $item->find('.card-full-news__title', 0); 
              $newsSource = $item->find('.card-full-news', 0);
              $detail = $this->getArticleDetails($this->lentaUrl . $newsSource->href);

              $news[] = [
                'name' => $newsTitle->plaintext,
                'preview-text' => $detail['previewText'],
                'detail-text' => $detail['detailText'],
                'detail-picture' => $detail['picture'],
                'url' => $this->lentaUrl . $newsSource->href,
              ];
            }
            
            var_dump($news);
        

        } catch (\Exception $e) {
            throw new \Exception("Ошибка парсинга: " . $e->getMessage());
        }
        
        /* return $news; */
    }

    private function curlGetPage(string $url): string
    {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
      curl_setopt($ch, CURLOPT_TIMEOUT, 15);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

      $response = curl_exec($ch);
      $error = curl_error($ch);
      curl_close($ch);

      if($error) {
        throw new \Exception("\n" . "CURL error: " . $error . "\n");
      }

      return $response ?: '';
    }

    /**
     * @return array{previewText: string, detailText: string, picture: string}
     */
    private function getArticleDetails(string $url):array {
      $articleDom = new \simple_html_dom();
      $articlePage = $this->curlGetPage($url);
      $articleDom->load($articlePage);

      $texts = $this->getArticleText($articleDom);

      return [
        'previewText' => $texts['preview'],
        'detailText' => $texts['detail'],
        'picture' => $this->getArticleImage($articleDom)
      ];
    }

    /**
     * @return array{preview: string, detail: string}
     */
    private function getArticleText(\simple_html_dom $dom): array {
      $articleText = '';
      $articleTextBlocks = $dom->find('.topic-body__content-text');

      $texts = [];
      foreach($articleTextBlocks as $articleTextBlock) {
        $text = trim(html_entity_decode($articleTextBlock->plaintext));
        if ($text !=='') $texts[] = $text;
      }
      
      return [
        'preview' => implode(' ', array_slice($texts, 0, 2)),
        'detail' => implode("\n\n", $texts)
      ];
    }

    private function getArticleImage(\simple_html_dom $dom): string {
      $articleImage = $dom->find('.topic-body__title-image-zoom', 0);
      $url = $this->lentaUrl . $articleImage->href;

      $imageDom = new \simple_html_dom();
      $imagePage = $this->curlGetPage($url);
      $imageDom->load($imagePage);

      $image = $imageDom->find('.comments-page__title-image', 0);

      return $this->lentaUrl . $image->src;
    }
    
}
