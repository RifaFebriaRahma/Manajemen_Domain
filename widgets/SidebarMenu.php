<?php


namespace app\widgets;


use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class SidebarMenu extends Widget
{
    public $items = [];
    public $linkTemplate = '<a href="{url}" class="nav-link {active}">{icon} {label}</a>';
    public $labelTemplate = '<li class="nav-header text-gray font-italic">{label}</li>';
    public $iconTemplate = '<i class="nav-icon {icon}"></i>';

    public function run()
    {
        echo $this->renderItem($this->items);
    }

    protected function renderItem($items)
    {
        if (!empty($items)) {
            $rsItem = '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
            foreach ($items as $key => $val) {
                $_isheader = isset($val['header']) ? $val['header'] : false;
                $_items = isset($val['items']) ? $val['items'] : [];
                $_label = isset($val['label']) ? $val['label'] : '';
                $_icon = isset($val['icon']) ? strtr($this->iconTemplate, ['{icon}' => $val['icon']]) : '';
                $_url = isset($val['url']) ? Url::to([$val['url']]) : '#';
                $_active = isset($val['url']) ? (('/' . \Yii::$app->requestedRoute == $val['url']) ? 'active' : '') : '';
                if ($_isheader == true) {
                    $rsItem .= strtr($this->labelTemplate, ['{label}' => strtoupper($_label)]);
                } else {
                    $rsItem .= '<li class="nav-item">';
                    if (empty($_items)) {
                        $replace = [
                            '{label}' => '<p>' . $_label . '</p>',
                            '{url}' => $_url,
                            '{icon}' => $_icon,
                            '{active}' => $_active
                        ];
                        $rsItem .= strtr($this->linkTemplate, $replace);
                    } else {
                        $replace = [
                            '{label}' => '<p>' . $_label . '<i class="right fas fa-angle-left"></i></p>',
                            '{url}' => $_url,
                            '{icon}' => $_icon,
                            '{active}' => $_active
                        ];
                        $rsItem .= strtr($this->linkTemplate, $replace);
                        $rsItem .= $this->renderItems($_items);
                    }
                    $rsItem .= '</li>';
                }
            }
            $rsItem .= '</ul>';
        } else {
            $rsItem = '';
        }
        return $rsItem;
    }

    protected function renderItems($items)
    {
        $rsSubitem = '<ul class="nav nav-treeview">';
        foreach ($items as $key => $val) {
            $_items = isset($val['items']) ? $val['items'] : [];
            $_label = isset($val['label']) ? $val['label'] : '';
            $_icon = isset($val['icon']) ? strtr($this->iconTemplate, ['{icon}' => $val['icon']]) : '';
            $_url = isset($val['url']) ? Url::to([$val['url']]) : '#';
            $_active = isset($val['url']) ? (('/' . \Yii::$app->requestedRoute == $val['url']) ? 'active' : '') : '';
            $rsSubitem .= '<li class="nav-item">';
            if (empty($_items)) {
                $replace = [
                    '{label}' => '<p>' . $_label . '</p>',
                    '{url}' => $_url,
                    '{icon}' => $_icon,
                    '{active}' => $_active
                ];
                $rsSubitem .= strtr($this->linkTemplate, $replace);
            } else {
                $replace = [
                    '{label}' => '<p>' . $_label . '<i class="right fas fa-angle-left"></i></p>',
                    '{url}' => $_url,
                    '{icon}' => $_icon,
                    '{active}' => $_active
                ];
                $rsSubitem .= strtr($this->linkTemplate, $replace);
                $rsSubitem .= $this->renderItems($_items);
            }
            $rsSubitem .= '</li>';
        }
        $rsSubitem .= '</ul>';
        return $rsSubitem;
    }
}