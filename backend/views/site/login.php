<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
?>
<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                                            <?= $form->field($model, 'username',[
                                                'inputOptions'=> [
                                                    'class' => 'form-control form-control-user',
                                                    'placeholder' =>'Enter your username'
                            
                                                ]

                                            ])->textInput(['autofocus' => true]) ?>

                                            <?= $form->field($model, 'password',[
                                                'inputOptions'=> [
                                                    'class' => 'form-control form-control-user',
                                                    'placeholder' =>'Enter your password'
                            
                                                ]
                                            ])->passwordInput() ?>

                                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                            <div class="form-group">
                                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
                                            </div>

                                            <?php ActiveForm::end(); ?>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo \yii\helpers\Url::to(['/site/forgot-password'])?>">Forgot Password?</a>
                                    </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

</body>
