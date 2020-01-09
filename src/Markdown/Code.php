<?php
declare(strict_types=1);

namespace Lonely345\Markdown;

/**
 * 代码
 * @package Adb\Markdown
 */
trait Code
{
    /**
     * 文本
     * @param string $content
     */
    public function text(string $content = ''): void
    {
        $this->code('text', $content);
    }

    /**
     * JSON
     * @param string $content
     */
    public function json(string $content = ''): void
    {
        $this->code('json', $content);
    }

    /**
     * PHP
     * @param string $content
     */
    public function php(string $content = ''): void
    {
        $this->code('php', $content);
    }

    /**
     * C
     * @param string $content
     */
    public function c(string $content = ''): void
    {
        $this->code('c', $content);
    }

    /**
     * C++
     * @param string $content
     */
    public function cpp(string $content = ''): void
    {
        $this->code('c++', $content);
    }

    /**
     * Python
     * @param string $content
     */
    public function python(string $content = ''): void
    {
        $this->code('python', $content);
    }

    /**
     * Golang
     * @param string $content
     */
    public function golang(string $content = ''): void
    {
        $this->code('golang', $content);;
    }

    /**
     * Sql
     * @param string $content
     */
    public function sql(string $content = ''): void
    {
        $this->code('sql', $content);
    }

    /**
     * HTML
     * @param string $content
     */
    public function html(string $content = ''): void
    {
        $this->code('html', $content);
    }

    /**
     * CSS
     * @param string $content
     */
    public function css(string $content = ''): void
    {
        $this->code('css', $content);
    }

    /**
     * Javascript
     * @param string $content
     */
    public function javascript(string $content = ''): void
    {
        $this->code('javascript', $content);
    }

    /**
     * Bash
     * @param string $content
     */
    public function bash(string $content): void
    {
        $this->code('bash', $content);
    }

    /**
     * Java
     * @param string $content
     */
    public function java(string $content = ''): void
    {
        $this->code('java', $content);
    }

    private function code(string $type, string $content)
    {
        $this->data[] = '```' . $type . $content . '```';
    }
}