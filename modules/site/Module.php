<?php

namespace app\modules\site;

/**
 * site module definition class
 */
class Module extends \yii\base\Module implements \yii\base\BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\site\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        /* @var $app \yii\web\Application */
        $view = $app->getView();

        $view->on('colibri.admin.initSideNav', function($event) {
            $items = &$event->data;
            $items[] = ['label' => 'Site', 'icon' => 'cube', 'url' => ['#'], 'items' => [
                    ['label' => \Yii::t('admin', 'Configuration'), 'url' => ['/admin/site/default/config'], 'icon' => 'wrench'],
                ]];
        });

        $view->on('colibri.admin.dashboard.top-1', function($event) use ($view) {
            echo $view->render('@app/modules/site/admin/views/widgets/smallbox.php', [
                'background' => 'aqua',
                'title' => 'Small box 1',
                'icon' => 'bullhorn',
                'content' => '/app/modules/site/admin/Module injected this box',
            ]);
        });

        $view->on('colibri.admin.dashboard.top-2', function($event) use ($view) {
            echo $view->render('@app/modules/site/admin/views/widgets/smallbox.php', [
                'background' => 'green',
                'title' => 'Small box 2',
                'icon' => 'certificate',
                'content' => '/app/modules/site/admin/Module injected this box',
            ]);
        });

        $view->on('colibri.admin.dashboard.top-3', function($event) use ($view) {
            echo $view->render('@app/modules/site/admin/views/widgets/smallbox.php', [
                'background' => 'yellow',
                'title' => 'Small box 3',
                'icon' => 'bookmark',
                'content' => '/app/modules/site/admin/Module injected this box',

            ]);
        });

        $view->on('colibri.admin.dashboard.top-4', function($event) use ($view) {
            echo $view->render('@app/modules/site/admin/views/widgets/smallbox.php', [
                'background' => 'red',
                'title' => 'Small box 4',
                'icon' => 'bell',
                'content' => '/app/modules/site/admin/Module injected this box',

            ]);
        });

        $view->on('colibri.admin.dashboard.main-1', function($event) use ($view) {
            $items = &$event->data;
            $items[] = $view->render('@app/modules/site/admin/views/widgets/box.php', [
                'icon' => 'cube',
                'title' => 'Box 1',
                'type' => 'success',
            ]);
            $items[] = $view->render('@app/modules/site/admin/views/widgets/box.php', [
                'icon' => 'coffee',
                'title' => 'Box 2',
                'type' => 'primary'
            ]);
        });

        $view->on('colibri.admin.dashboard.main-2', function($event) use ($view) {
            $items = &$event->data;
            $items[] = $view->render('@app/modules/site/admin/views/widgets/box.php', [
                'icon' => 'clipboard',
                'title' => 'Box 3',
                'type' => 'warning'
            ]);
            $items[] = $view->render('@app/modules/site/admin/views/widgets/box.php', [
                'icon' => 'info',
                'title' => 'Box 4',
                'type' => 'danger'
            ]);

        });
    }
}
