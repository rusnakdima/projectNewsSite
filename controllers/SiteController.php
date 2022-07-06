<?php

    namespace app\controllers;
    use Yii;
    use yii\web\Controller;
    use app\models\Register;
    use app\models\LoginForm;

    class SiteController extends Controller{
        public function actions(){
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
        public function actionIndex(){
            return $this->render('index');
        }
        public function actionAbout(){
            return $this->render('about');
        }
        public function actionFaq(){
            return $this->render('faq');
        }
        public function actionKazakhstan(){
            return $this->render('kazakhstan');
        }
        public function actionWorld(){
            return $this->render('world');
        }
        public function actionBusiness(){
            return $this->render('business');
        }
        public function actionSport(){
            return $this->render('sport');
        }
        public function actionNature(){
            return $this->render('nature');
        }
        public function actionTravel(){
            return $this->render('travel');
        }
        public function actionItIndustry(){
            return $this->render('itIndustry');
        }
        public function actionHealth(){
            return $this->render('health');
        }
        public function actionLogin(){
            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }
    
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            }
    
            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        public function actionRegister(){
            $model = new Register();
    
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate() && $_POST['Register']['password'] == $_POST['Register']['conf_pass'] && $_POST['Register']['rememberMe'] == true) {
                    $model->username = $_POST['Register']['username'];
                    //$model->pass = password_hash($_POST['Register']['pass'], PASSWORD_ARGON2I);
                    $model->password = $_POST['Register']['password'];
                    $model->email = $_POST['Register']['email'];
                    $model->auth_key = md5(random_bytes(5));
                    $model->access_token = password_hash(random_bytes(10), PASSWORD_DEFAULT);
                    if($model->save()){
                        return $this->redirect(['login']);
                    }
                }
            }
    
            return $this->render('register', [
                'model' => $model,
            ]);
        }
        public function actionLogout(){
            Yii::$app->user->logout();
    
            return $this->goHome();
        }
    }