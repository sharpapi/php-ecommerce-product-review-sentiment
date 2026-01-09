<?php

declare(strict_types=1);

namespace SharpAPI\EcommerceReviewSentiment;

use GuzzleHttp\Exception\GuzzleException;
use SharpAPI\Core\Client\SharpApiClient;

/**
 * Analyze product review sentiment using AI - returns POSITIVE/NEGATIVE/NEUTRAL
 *
 * @package SharpAPI\EcommerceReviewSentiment
 * @api
 */
class ProductReviewSentimentClient extends SharpApiClient
{
    public function __construct(
        string $apiKey,
        ?string $apiBaseUrl = 'https://sharpapi.com/api/v1',
        ?string $userAgent = 'SharpAPIPHPEcommerceReviewSentiment/1.0.0'
    ) {
        parent::__construct($apiKey, $apiBaseUrl, $userAgent);
    }

    /**
     * Analyze product review sentiment using AI - returns POSITIVE/NEGATIVE/NEUTRAL
     *
     * @param string $content The product review content to analyze
     * @return string Status URL for polling the job result
     * @throws GuzzleException
     * @api
     */
    public function analyzeReviewSentiment(string $content): string
    {
        $response = $this->makeRequest('POST', '/ecommerce/review_sentiment', [
            'content' => $content
        ]);

        return $this->parseStatusUrl($response);
    }
}
