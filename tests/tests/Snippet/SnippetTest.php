<?php
use Concrete\Package\PushupSocial\Src\PushupSocial\Snippet\Snippet;

/**
 * @todo include base libraries
 */
function h($val) {
    return htmlentities($val);
}

class SnippetTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        $this->view = $this->getMockBuilder('View')
                                ->setMethods(array('addFooterItem'))
                                ->getMock();
    }

    public function testRegister()
    {
        $communityId = '1234567890';
        $this->view->expects($this->once())
                        ->method('addFooterItem')
                        ->with($this->stringContains('//PushupSocial snippet'));

        $snippet = new Snippet($this->view);

        $snippet->register($communityId);
    }

    public function testBuildSnippetCommunityId()
    {
        $communityId = '1234567890';
        $snippet = new Snippet($this->view);
        $codeSnippet = $snippet->buildSnippet($communityId);

        $this->assertContains($communityId, $codeSnippet);
    }

    public function testBuildSnippetComment()
    {
        $communityId = '1234567890';
        $snippet = new Snippet($this->view);
        $codeSnippet = $snippet->buildSnippet($communityId);

        $this->assertContains('//PushupSocial snippet', $codeSnippet);
    }
}
