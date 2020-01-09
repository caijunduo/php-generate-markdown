<?php
declare(strict_types=1);

namespace Lonely345;

use Lonely345\Markdown\Code;
use Lonely345\Markdown\Quote;
use Lonely345\Markdown\Stress;
use Lonely345\Markdown\Table;
use Lonely345\Markdown\Title;
use Lonely345\Markdown\Todo;
use function implode;

/**
 * Markdown
 * @package Adb
 */
class Markdown
{
    use Title, Quote, Todo, Stress, Table, Code;

    /**
     * 数据集
     * @var array $data
     */
    private $data = [];

    /**
     * 换行
     */
    public function br(): void
    {
        $this->data[] = '';
    }

    /**
     * 写入指定文本的一行
     * @param string $string
     */
    public function line(string $string): void
    {
        $this->data[] = $string;
    }

    /**
     * 分割线
     * @return string
     */
    public function dividing(): string
    {
        return '---';
    }


    /**
     * 超链接
     * @param string $url 链接地址
     * @param string $title 标题
     * @return string
     */
    public function link(string $url, string $title = '')
    {
        $title = $title ?: $url;
        return "[{$title}]({$url})";
    }

    /**
     * 图片
     * @param string $url 图片链接
     * @param string $description 图片描述
     */
    public function image(string $url, string $description = ''): void
    {
        $this->data[] = "![{$description}]({$url})";
    }

    /**
     * (string) Markdown object
     * @return string
     */
    public function __toString(): string
    {
        return implode("\n", $this->data);
    }
}