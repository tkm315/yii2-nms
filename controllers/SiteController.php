<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Device;

class SiteController extends Controller
{
    public function actionAddDevice()
    {
        $model = new Device();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Device added!');
            return $this->refresh();
        }

        return $this->render('add-device', [
            'model' => $model,
        ]);
    }
   public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'only' => ['logout', 'add-device'],
            'rules' => [
                [
                    'actions' => ['logout'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
                [
                    'actions' => ['add-device'],
                    'allow' => true,
                    'roles' => ['@'],
                    'matchCallback' => function ($rule, $action) {
                        if (Yii::$app->user->identity->username === 'admin') {
                            return true;
                        }
                        Yii::$app->session->setFlash('error', 'Just admins can add device.');
                        Yii::$app->response->redirect(['site/index'])->send();
                        Yii::$app->end();
                    },
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
                'logout' => ['post'],
            ],
        ],
    ];
}


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
 
    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionStatusMonitoring()
    {
    $devices = Device::find()->all();
    //show the status in order(online, offline)
    usort($devices, function($a, $b) {
    $order = ['online' => 0, 'offline' => 1];
        return $order[$a->status] <=> $order[$b->status];
            });

// count the devices
    $statusCounts = [
        'online' => 0,
        'offline' => 0,
    ];

    foreach ($devices as $device) {
        if ($device->status === 'online') {
            $statusCounts['online']++;
        } else {
            // Treat any non-online status (including 'unknown') as offline
            $statusCounts['offline']++;
        }
    }

        return $this->render('status-monitoring', [
            'devices' => $devices,
            'statusCounts' => $statusCounts,
         ]);
    }

   public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
public function actionLogin()
{
    if (!Yii::$app->user->isGuest) {
        return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        return $this->goBack();
    }

    return $this->render('login', [
        'model' => $model,
    ]);
}

    /**
     * Logout action.
     *
     * @return Response
     */
public function actionLogout()
{
    Yii::$app->user->logout();
    return $this->goHome();
}

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
   public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
   public function actionAbout()
    {
        return $this->render('about');

    }
    

}
