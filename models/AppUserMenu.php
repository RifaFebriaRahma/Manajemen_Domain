<?php


namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\Url;


class AppUserMenu
{
    public static function getMenus()
    {
        $group = (new Query())
            ->from('app_group')
            ->join('JOIN', 'app_user', 'userGroupId=groupId')
            ->where(['userId' => \Yii::$app->user->getId()])
            ->one();
        if(!empty($group)) {
            if ($group['groupType'] == 'DEVELOPER') {
                return array_merge(self::items(), (YII_ENV_DEV && !Yii::$app->user->isGuest) ? self::defaultMenu() : []);
            } else {
                return self::items();
            }
        }else{
            return [];
        }

    }

    private static function items()
    {
        $conn = Yii::$app->db;
        $items = [];
        $qMenu = "SELECT * FROM app_menu  
            JOIN app_group_menu ON gmMenuId=menuId
            JOIN app_user ON userGroupId=gmGroupId
            WHERE menuIsActive='1' AND (menuParentId='0' OR menuParentId IS NULL) AND menuIsSubAction='0' AND userId=:id
            GROUP BY menuId
            ORDER BY menuOrder ASC";
        $rsMenu = $conn->createCommand($qMenu, [
            ':id' => Yii::$app->user->id
        ])
            ->queryAll();
        foreach ($rsMenu as $val) {
            $row = [];
            if ($val['menuIsHeader'] == '1') {
                $row['label'] = Yii::t('app', $val['menuLabel']);
                $row['header'] = true;
            } else {
                $row['label'] = Yii::t('app', $val['menuLabel']);
                $row['url'] = empty($val['menuUrl']) ? '#' : $val['menuUrl'];
                $row['icon'] = $val['menuIcon'];
                $subItems = self::subItems($val['menuId']);
                if (count($subItems) > 0) {
                    $row['items'] = $subItems;
                }
            }
            $items[] = $row;
        }
        return $items;
    }

    private static function subItems($cnd = '')
    {
        $conn = Yii::$app->db;
        $items = [];
        $qMenu = "SELECT * FROM app_menu  
            JOIN app_group_menu ON gmMenuId=menuId
            JOIN app_user ON userGroupId=gmGroupId
            WHERE menuIsActive='1' AND menuParentId=:parentid AND menuIsSubAction='0' AND userId=:id
            GROUP BY menuId
            ORDER BY menuOrder ASC";
        $rsMenu = $conn->createCommand($qMenu, [
            ':id' => Yii::$app->user->id,
            ':parentid' => $cnd
        ])
            ->queryAll();
        foreach ($rsMenu as $val) {
            $row = [];
            $row['label'] = Yii::t('app', $val['menuLabel']);
            $row['url'] = empty($val['menuUrl']) ? '#' : $val['menuUrl'];
            $row['icon'] = $val['menuIcon'];
            $subItems = self::subItems($val['menuId']);
            if (count($subItems) > 0) {
                $row['items'] = $subItems;
            }
            $items[] = $row;
        }
        return $items;
    }

    private static function defaultMenu()
    {
        $result = [
            ['label' => Yii::t('app', 'YII Development Tools'), 'header' => true],
            ['label' => Yii::t('app', 'GII'), 'icon' => 'fa fa-cog', 'url' => '/gii'],
            ['label' => Yii::t('app', 'Menus'), 'icon' => 'fa fa-tag', 'url' => '/aplikasi/menu/index'],
            ['label' => Yii::t('app', 'User Group'), 'icon' => 'fa fa-tags', 'url' => '/aplikasi/group/index'],
        ];
        return $result;
    }
}