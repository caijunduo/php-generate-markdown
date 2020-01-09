<?php
declare(strict_types=1);

namespace Lonely345\Markdown;

use function str_repeat;

/**
 * 标题
 * @package Adb\Markdown
 */
trait Title
{
    /**
     * 一级标题
     * @param string $string
     */
    public function h1(string $string): void
    {
        $this->rawTitle($string, 1);
    }

    /**
     * 二级标题
     * @param string $string
     */
    public function h2(string $string): void
    {
        $this->rawTitle($string, 2);
    }

    /**
     * 三级标题
     * @param string $string
     */
    public function h3(string $string): void
    {
        $this->rawTitle($string, 3);
    }

    /**
     * 四级标题
     * @param string $string
     */
    public function h4(string $string): void
    {
        $this->rawTitle($string, 4);
    }

    /**
     * 五级标题
     * @param string $string
     */
    public function h5(string $string): void
    {
        $this->rawTitle($string, 5);
    }

    /**
     * 六级标题
     * @param string $string
     */
    public function h6(string $string): void
    {
        $this->rawTitle($string, 6);
    }


    /**
     * 写入指定等级标题
     * @param string $string
     * @param int $level
     */
    private function rawTitle(string $string, int $level = 1)
    {
        $this->data[] = str_repeat('#', $level) . ' ' . $string;
    }
}