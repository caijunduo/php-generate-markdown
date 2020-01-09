<?php
declare(strict_types=1);

namespace Test;

use Lonely345\Markdown;
use PHPUnit\Framework\TestCase;
use function explode;
use function substr_count;

class MarkdownTest extends TestCase
{
    public function testCode()
    {
        $markdown = new Markdown();
        $markdown->json('
        {
            "name": "name1",
            "value": "value1"
        }
        ');
        $this->assertTrue('```json
        {
            "name": "name1",
            "value": "value1"
        }
        ```' === (string)$markdown);
    }

    public function testQuote()
    {
        $markdown = new Markdown();

        $markdown->quoteLine('quote');
        $this->assertTrue('> quote' === (string)$markdown);

        $markdown = new Markdown();
        $markdown->quoteList(
            $markdown->quote('quote1'),
            $markdown->quote('quote2'),
            $markdown->quote($markdown->quote('quote3'))
        );
        $markdown = explode("\n", (string)$markdown);
        $this->assertTrue('> quote1' === $markdown[0]);
        $this->assertTrue('> quote2' === $markdown[1]);
        $this->assertTrue('> > quote3' === $markdown[2]);
    }

    public function testStress()
    {
        $markdown = new Markdown();
        $markdown->line($markdown->bold('bold'));
        $this->assertTrue("**bold**" === (string)$markdown);

        $markdown = new Markdown();
        $markdown->line($markdown->italic('italic'));
        $this->assertTrue("__italic__" === (string)$markdown);

        $markdown = new Markdown();
        $markdown->line($markdown->strikethrough('strikethrough'));
        $this->assertTrue("--strikethrough--" === (string)$markdown);
    }

    public function testTable()
    {
        $markdown = new Markdown();
        $markdown->table(
            $markdown->tHead(
                $markdown->tr(
                    $markdown->column('Key'),
                    $markdown->column('Value')
                )
            ),
            $markdown->tBody(
                $markdown->tr(
                    $markdown->column('1'),
                    $markdown->column('小明')
                ),
                $markdown->tr(
                    $markdown->column('2'),
                    $markdown->column('小黑')
                )
            ),
            $markdown->tLines(
                $markdown->leftLine(),
            )
        );
        $markdown = explode("\n", (string)$markdown);

        $this->assertTrue('| Key | Value |' === $markdown[0]);
        $this->assertTrue('| :-- | -- |' === $markdown[1]);
        $this->assertTrue('| 1 | 小明 |' === $markdown[2]);
        $this->assertTrue('| 2 | 小黑 |' === $markdown[3]);
    }

    public function testTitle()
    {
        $markdown = new Markdown();
        $markdown->h1('h1');
        $markdown->h2('h2');
        $markdown->h3('h3');
        $markdown->h4('h4');
        $markdown->h5('h5');
        $markdown->h6('h6');
        $markdown = (string)$markdown;

        $this->assertTrue(21 === substr_count($markdown, '#'));
        $this->assertTrue(5 === substr_count($markdown, "\n"));

        $markdown = explode("\n", $markdown);

        $this->assertTrue('# h1' === $markdown[0],);
        $this->assertTrue('## h2' === $markdown[1],);
        $this->assertTrue('### h3' === $markdown[2],);
        $this->assertTrue('#### h4' === $markdown[3],);
        $this->assertTrue('##### h5' === $markdown[4],);
        $this->assertTrue('###### h6' === $markdown[5],);
    }

    public function testTodo()
    {
        $markdown = new Markdown();
        $markdown->todoLine('todo', false);
        $this->assertTrue('- [ ] todo' === (string)$markdown);

        $markdown = new Markdown();
        $markdown->todoList(
            $markdown->todo('todo1', false),
            $markdown->todo('todo2', true)
        );
        $markdown = explode("\n", (string)$markdown);
        $this->assertTrue('- [ ] todo1' === $markdown[0]);
        $this->assertTrue('- [x] todo2' === $markdown[1]);
    }
}