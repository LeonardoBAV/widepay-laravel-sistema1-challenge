<?php

namespace Modules\WidePayLaravelSistema1Challenge\Http\ViewComposers\Tabs;

use Illuminate\View\View;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;

class UrlsComposer
{

    private $url;
    private $urls;

    public function __construct()
    {
        $this->url = request()->route()->parameter('url');
        $this->urls = Url::all();
    }


    public function compose(View $view)
    {
        $view->with('url', $this->url);
        $view->with('urls', $this->urls);
    }
}
