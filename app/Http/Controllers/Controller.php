<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $metaTitle;
    protected $metaDescription;
    protected $metaKeywords;
    protected $site;
    public function __construct()
    {
        $this->metaTitle = getSettings('site_name');
        $this->metaDescription = getSeoSettings('description');
        $this->metaKeywords = getSeoSettings('keywords');

        SEOMeta::setTitle($this->metaTitle);
        SEOMeta::setDescription($this->metaDescription);
        SEOMeta::setKeywords($this->metaKeywords);
        SEOMeta::setCanonical(url()->current());
        OpenGraph::setTitle(SEOMeta::getTitle());
        OpenGraph::setDescription($this->metaDescription);
        OpenGraph::setSiteName($this->metaTitle);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addImage(getSettings('site_logo'));
        JsonLd::addImage(getSettings('site_logo'));

        JsonLd::setTitle(SEOMeta::getTitle());
        JsonLd::setDescription($this->metaDescription);
        JsonLd::setSite(url('/'));
        JsonLd::setType('WebSite');

        $this->site = Site::first();
    }
}
