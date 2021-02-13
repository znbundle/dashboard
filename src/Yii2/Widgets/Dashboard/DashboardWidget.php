<?php

namespace ZnBundle\Dashboard\Yii2\Widgets\Dashboard;

use ZnBundle\Dashboard\Yii2\Widgets\Dashboard\Helpers\DashboardHelper;
use ZnCore\Base\Helpers\StringHelper;
use ZnLib\Web\Widgets\Base\BaseWidget2;

class DashboardWidget extends BaseWidget2
{

    public $items;
    public $labelTemplate = '<h3>{html}</h3>';
    public $rowTemplate = '<div class="row">{html}</div>';
    public $colTemplate = '<div class="col">{html}</div>';

    private function generatePanel($panel): ?string
    {
        $counterList = DashboardHelper::prepareItems($panel['items']);
        if (empty($counterList)) {
            return null;
        }
        $perLine = $panel['perLine'] ?? 1;
        $tree = DashboardHelper::toTree($counterList, $perLine);
        $html = $this->renderPanel($tree);
        if (!empty($panel['label'])) {
            $title = StringHelper::renderTemplate($this->labelTemplate, ['html' => $panel['label']]);
            $html = $title . $html;
        }
        return $html;
    }

    private function renderPanel(array $tree): string
    {
        $html = '';
        foreach ($tree as $lineItems) {
            $rowHtml = '';
            foreach ($lineItems as $widgetHtml) {
                $rowHtml .= StringHelper::renderTemplate($this->colTemplate, ['html' => $widgetHtml]);
            }
            $html .= StringHelper::renderTemplate($this->rowTemplate, ['html' => $rowHtml]);
        }
        return $html;
    }

    public function run(): string
    {
        $all = [];
        $items = $this->items;
        $items = DashboardHelper::prepareItems($items);
        foreach ($items as $index => $panel) {
            $panelHtml = $this->generatePanel($panel);
            if (!empty($panelHtml)) {
                $all[] = $panelHtml;
            }
        }
        return implode('', $all);
    }
}
