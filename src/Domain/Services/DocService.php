<?php

namespace ZnBundle\Dashboard\Domain\Services;

use ZnCore\Base\Exceptions\NotFoundException;
use ZnCore\Base\Libs\FileSystem\Helpers\FilePathHelper;
use ZnCore\Base\Libs\FileSystem\Helpers\FindFileHelper;
use ZnCore\Base\Helpers\StringHelper;
use ZnCore\Base\Helpers\TemplateHelper;
use ZnCore\Base\Legacy\Yii\Helpers\FileHelper;
use ZnBundle\Dashboard\Domain\Interfaces\Services\DocServiceInterface;

class DocService implements DocServiceInterface
{

    private $docFileNameMask;
    private $docDirectory;

    public function __construct(string $docFileNameMask = 'v{version}.html', string $docDirectory = 'docs/api/dist')
    {
        $this->docFileNameMask = $docFileNameMask;
        $this->docDirectory = $docDirectory;
    }

    public function versionList(): array {
        $list = FindFileHelper::scanDir(FilePathHelper::rootPath() . '/' . $this->docDirectory);
        $pattern = $this->generateRegExp($this->docFileNameMask);
        $result = [];
        foreach ($list as $fileName) {
            if(preg_match($pattern, $fileName, $matches)) {
                $version = $matches[1];
                $result[] = $version;
            }
        }
        return $result;
    }

    public function htmlByVersion(int $version): string {
        $fileName = TemplateHelper::render($this->docFileNameMask, ['version' => $version]);
        $docFileName = FilePathHelper::path($this->docDirectory . '/' . $fileName);
        $htmlContent = @file_get_contents($docFileName);
        if(empty($htmlContent)) {
            throw new NotFoundException("Not found API documentation for version v{$version}!");
        }
        return $htmlContent;
    }

    private function generateRegExp($docFileNameMask) {
        $pattern = preg_quote($docFileNameMask);
        $pattern = str_replace('\{version\}', '(\d+)', $pattern);
        $pattern = '/' . $pattern . '/i';
        return $pattern;
    }

}
