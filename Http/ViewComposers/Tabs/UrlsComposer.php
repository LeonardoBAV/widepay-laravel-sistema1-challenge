<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\ViewComposers\Tabs;

use Illuminate\View\View;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;
use Modules\WidePayLaravelSistema1Challenge\Entities\User;
use Modules\WidePayLaravelSistema1Challenge\Services\UrlService;

class UrlsComposer
{

    private $url;
    private $urls;

    public function __construct(public UrlService $urlService)
    {
        $this->url = request()->route()->parameter('url');
        $this->urls = $urlService->listByUser(auth()->user());
    }


    public function compose(View $view)
    {
        $view->with('url', $this->url);
        $view->with('urls', $this->urls);
    }
}
