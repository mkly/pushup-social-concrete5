<?php
namespace Concrete\Package\PushupSocial\Src\PushupSocial\Snippet;

use Concrete\Package\PushupSocial\Src\PushupSocial\Configuration;
use AssetList;
use View;

class Snippet
{

    /**
     * @var View
     */
    protected $view;

    /**
     * @param View $view
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * @see Asset
     * @see AssetList
     *
     * @param string $communityId
     * @param string $position Constant from Asset class
     */
    public function register($communityId)
    {
        $this->view->addFooterItem($this->buildSnippet($communityId));
    }

    /**
     * @param string $communityId
     */
    public function buildSnippet($communityId)
    {
        return '<script>' . "\n" .
            '//PushupSocial snippet' . "\n" .
            '(function (p, s, h) {' . "\n" .
            '    (p[s] = p[s] || []).push(["_setAccount", "' .
            h($communityId) .
            '"], ["_setCDN", h], ["_setUrl", "http://node.pushup.com"], ["_displayBar"]);' . "\n" .
            '    s = (p = p.document).createElement("script");' . "\n" .
            '    s.src = h + "/pushup.min.js";' . "\n" .
            '    p.getElementsByTagName("head")[0].appendChild(s);' . "\n" .
            '})(window, "_pa", "http://node.pushup.com/min");' . "\n" .
            '</script>' . "\n"
        ;
    }
}
