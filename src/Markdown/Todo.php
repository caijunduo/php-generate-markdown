<?php
declare(strict_types=1);

namespace Lonely345\Markdown;

use function array_merge;

/**
 * TODO列表
 * @package Adb\Markdown
 */
trait Todo
{
    /**
     * todo列表
     * @param mixed ...$lines
     */
    public function todoList(...$lines): void
    {
        $this->data = array_merge($this->data, $lines);
    }

    /**
     * todo段
     * @param string $string
     * @param bool $checkbox
     * @return string
     */
    public function todo(string $string = '', bool $checkbox = false): string
    {
        return '- [' . ($checkbox ? 'x' : ' ') . '] ' . $string;
    }

    /**
     * 一行todo
     * @param string $string
     * @param bool $checkbox
     */
    public function todoLine(string $string = '', bool $checkbox = false): void
    {
        $this->data[] = '- [' . ($checkbox ? 'x' : ' ') . '] ' . $string;
    }
}