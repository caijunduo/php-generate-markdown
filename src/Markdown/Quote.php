<?php
declare(strict_types=1);

namespace Lonely345\Markdown;


use function array_merge;

/**
 * 引用
 * @package Adb\Markdown
 */
trait Quote
{
    /**
     * 引用段
     * @param string $string
     * @return string
     */
    public function quote(string $string = ''): string
    {
        return '> ' . $string;
    }

    /**
     * 一行引用
     * @param string $string
     */
    public function quoteLine(string $string = ''): void
    {
        $this->data[] = '> ' . $string;
    }

    /**
     * 引用列表，由引用端组成
     * @param mixed ...$lines
     */
    public function quoteList(...$lines): void
    {
        $this->data = array_merge($this->data, $lines);
    }
}