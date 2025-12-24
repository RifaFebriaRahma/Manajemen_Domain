<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetAdminLte extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
//    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $css = [
        'adminlte/dist/css/adminlte.css',
        'adminlte/plugins/fontawesome-free/css/all.min.css',
    ];
    public $js = [
        'adminlte/dist/js/adminlte.js',
        'adminlte/plugins/bootstrap/js/bootstrap.bundle.js',
        'adminlte/plugins/bootstrap/js/bootstrap.js',
        'adminlte/plugins/bootstrap/js/bootstrap.min.js',
//        'adminlte/plugins/jquery/jquery.js',
//        'adminlte/plugins/jquery/jquery.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset',
    ];
}
