<?php
declare(strict_types=1);

namespace Lonely345\Markdown;

use function array_merge;
use function array_slice;
use function count;
use function implode;
use function str_repeat;
use function substr_count;

/**
 * 表格
 * @package Adb\Markdown
 */
trait Table
{
    /**
     * 表格
     * @param array $head
     * @param array $body
     * @param array $lines
     */
    public function table(array $head, array $body, array $lines = [])
    {
        $count = substr_count($head[0], '|') - 1;
        $listCount = count($lines);
        if (!$lines) {
            $line = ['|' . str_repeat(' ' . $this->tLine() . ' |', $count)];
        } elseif ($count <= $listCount) {
            $lines = array_slice($lines, 0, $count);
            $line = ['| ' . implode(' | ', $lines) . ' |'];
        } else {
            $line = ['| ' . implode(' | ', $lines) . str_repeat(' | ' . $this->tLine(), $count - $listCount) . ' |'];
        }

        $this->data = array_merge($this->data, $head, $line, $body);
    }

    /**
     * 表头
     * @param mixed ...$columns
     * @return array
     */
    public function tHead(...$columns): array
    {
        return $columns;
    }

    /**
     * 表身
     * @param mixed ...$columns
     * @return array
     */
    public function tBody(...$columns): array
    {
        return $columns;
    }

    /**
     * 行
     * @param mixed ...$columns
     * @return string
     */
    public function tr(...$columns): string
    {
        return '| ' . implode(' | ', $columns) . ' |';
    }

    /**
     * 段
     * @param string $string
     * @return string
     */
    public function column(string $string = ''): string
    {
        return $string;
    }

    /**
     * 左对齐
     * @return string
     */
    public function leftLine(): string
    {
        return ':--';
    }

    /**
     * 右对齐
     * @return string
     */
    public function rightLine(): string
    {
        return '--:';
    }

    /**
     * 居中
     * @return string
     */
    public function alignLine(): string
    {
        return ':--:';
    }

    /**
     * 对齐方式
     * @param mixed ...$lines
     * @return array
     */
    public function tLines(...$lines): array
    {
        return $lines;
    }

    /**
     * 默认
     * @return string
     */
    public function tLine(): string
    {
        return '--';
    }
}