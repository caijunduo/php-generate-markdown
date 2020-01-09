<?php
declare(strict_types=1);

namespace Lonely345\Markdown;

/**
 * 强调
 * @package Adb\Markdown
 */
trait Stress
{
    /**
     * 加粗
     * @param string $string
     * @return string
     */
    public function bold(string $string = ''): string
    {
        return '**' . $string . '**';
    }

    /**
     * 斜体
     * @param string $string
     * @return string
     */
    public function italic(string $string = ''): string
    {
        return '__' . $string . '__';
    }

    /**
     * 删除线
     * @param string $string
     * @return string
     */
    public function strikethrough(string $string = ''): string
    {
        return '--' . $string . '--';
    }
}