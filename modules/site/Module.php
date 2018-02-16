<?php
/**
 * @copyright   (C) 2017 PHILIP Sylvain. All rights reserved.
 * @license     MIT; see LICENSE.md
 */

namespace app\modules\site;

use colibri\admin\models\Navigation;

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

        $app->urlManager->addRules([
            'admin/site/configuration' => 'admin/site/default/config',
        ]);
    }

    /**
     * Module afterInstall method (called just after application installation)
     *
     * @return string Migration messages
     */
    public static function afterInstall()
    {
        $siteNav = Navigation::findOne(['slug' => 'site-mainmenu']);

        $items = [
            [
                'name' => 'Home',
                'slug' => 'home',
                'route' => '/'
            ],
            [
                'name' => 'Contact',
                'slug' => 'contact',
                'route' => '/site/default/contact'
            ],
            [
                'name' => 'Login',
                'slug' => 'login',
                'route' => '/admin/login',
                'access_roles' => '!registered',
            ],
            [
                'name' => 'Profile',
                'slug' => 'profile',
                'route' => '/user/settings',
                'access_roles' => 'registered',
            ],
            [
                'name' => 'Logout',
                'slug' => 'logout',
                'route' => '/user/security/logout',
                'access_roles' => 'registered',
                'link_options' => 'data-method=post',
            ],
        ];

        foreach ($items as $item) {
            $node = new Navigation($item);
            $node->appendTo($siteNav);
        }

        $adminNav = Navigation::findOne(['slug' => 'admin-mainmenu']);

        $site = new Navigation([
            'name' => 'Site',
            'slug' => 'admin-site',
            'icon' => 'cube',
            'route' => 'site'
        ]);

        $site->appendTo($adminNav);

        $conf = new Navigation([
            'name' => 'Configuration',
            'slug' => 'admin-site-configuration',
            'icon' => 'gear',
            'route' => 'site/configuration']
        );

        $conf->appendTo($site);

        return '';
    }
}
