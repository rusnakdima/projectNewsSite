<?php
    use yii\helpers\Html; // разрешить использовать объект Html
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.7.0/dist/vue.js"></script>
        <style>
            ion-icon{
                width: 8em;
                height: 3em;
            }
            #networks > a > ion-icon{
                width: 1.5em;
                height: 1.5em;
            }
            input, textarea{
                border: none;
            }
        </style>
    </head>
    <body style="text-align: justify" class="bg-white text-dark">
        <div id="profile" class="bg-white border rounded-3 p-3" style="float: right; right: 87px; top: 87px; position: absolute; text-align: center;">
            <div class="figure-img"><ion-icon name="person-outline"></ion-icon></div>
            <big><?= Yii::$app->user->identity->username ?></big><br>
            <a type="button" href="<?=Yii::$app->urlManager->createUrl(['site/logout'])?>" class="btn btn-primary">Log out</a>
        </div>

        <!--Header-->
        <nav class="navbar navbar-expand-lg d-flex flex-wrap align-items-center justify-content-center justify-content-md-between border-bottom text-light">
            <div class="container-fluid">
                <a href="<?=Yii::$app->urlManager->createUrl(['site/index'])?>" class="d-flex align-items-center mb-2 mb-md-0 text-decoration-none">Name company</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav flex-wrap me-auto mb-2 mb-lg-0">
                        <li class='nav-item'><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>" class='nav-link'>Home</a></li>

                        <li class='nav-item'><a href="<?= Yii::$app->urlManager->createUrl(['site/about']) ?>" class='nav-link'>About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Language</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Russian</a></li>
                                <li><a class="dropdown-item" href="#">English</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav flex-wrap mt-2 mx-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Themes</a>
                            <ul class="dropdown-menu bg-white text-dark border" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#" id="light">Light</a></li>
                                <li><a class="dropdown-item" href="#" id="dark">Dark</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div>
                        <?php if(Yii::$app->user->isGuest){ ?>
                            <a type="button" class="btn btn-outline-primary me-2" href="<?=Yii::$app->urlManager->createUrl(['site/login'])?>">Login</a>
                            <a type="button" class="btn btn-primary" href="<?=Yii::$app->urlManager->createUrl(['site/register'])?>">Sign-up</a>
                        <?php } else { ?>
                            <ion-icon onclick="$('#profile').toggle();" name="person-outline"></ion-icon>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>

        <!--Content-->
        <?= $content ?>

        <!--Footer-->
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 mx-2 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">Name company</a>
                <p class="text-muted">© 2022 <a href="<?=Yii::$app->urlManager->createUrl(['site/terms'])?>" class="nav-link p-0">Terms of Service</a> <a href="<?=Yii::$app->urlManager->createUrl(['site/privacy'])?>" class="nav-link p-0">Privacy Policy</a></p>
            </div>

            <div class="col mb-3">
                <h5>Social networks</h5>
                <div id="networks" class="row row-cols-sm-3 mx-2">
                    <a href="https://www.facebook.com/profile.php?id=100012837421755" target="_blank" class="nav-link p-0"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="https://vk.com/dmitriyr03" target="_blank" class="nav-link p-0"><ion-icon name="logo-vk"></ion-icon></a>
                    <a href="https://github.com/rusnakdima" target="_blank" class="nav-link p-0"><ion-icon name="logo-github"></ion-icon></a>
                    <a href="https://twitter.com/Dmitriy303" target="_blank" class="nav-link p-0"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="https://www.youtube.com/channel/UCulRfcSqKl30sYNBuQ6CsHA" target="_blank" class="nav-link p-0"><ion-icon name="logo-youtube"></ion-icon></a>
                </div>
            </div>

            <div class="col mb-3">
                <h5>Themes</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/index'])?>" class="nav-link p-0">Home</a></li>
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/kazakhstan'])?>" class="nav-link p-0">Kazakhstan</a></li>
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/world'])?>" class="nav-link p-0">World</a></li>
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/business'])?>" class="nav-link p-0">Business</a></li>
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/sport'])?>" class="nav-link p-0">Sport</a></li>
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/nature'])?>" class="nav-link p-0">Nature</a></li>
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/travel'])?>" class="nav-link p-0">Travel</a></li>
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/itIndustry'])?>" class="nav-link p-0">IT Industry</a></li>
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/health'])?>" class="nav-link p-0">Health</a></li>
                    <!--<li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/faq'])?>" class="nav-link p-0">FAQ</a></li>-->
                    <li class="nav-item mb-2"><a href="<?=Yii::$app->urlManager->createUrl(['site/about'])?>" class="nav-link p-0">About</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0">no name</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0">no name</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0">no name</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0">no name</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0">no name</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0">no name</a></li>
                </ul>
            </div>
        </footer>
        
        <!--Scripts-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script>
            $('#profile').hide();
            $(document).ready(function() {
                if(localStorage['theme'] == undefined) localStorage['theme'] = "light";
                if(localStorage['theme'] == "light") LightTheme();
                if(localStorage['theme'] == "dark") DarkTheme();
            });
            function LightTheme(){
                localStorage["theme"] = "light";
                $(".bg-dark, input, textarea").addClass("bg-white").removeClass("bg-dark");
                $(".text-light, .navbar a, input, textarea").addClass("text-dark").removeClass("text-light");
                $("footer .nav-link").css({"color": "rgba(31,37,41,0.75)"});
                $(".navbar .nav-link").removeClass("text-dark").css({"color":"#aaa"});
                var title = "<?php echo $this->title ?>";
                var list = document.querySelectorAll('.navbar .nav-link');
                for(var i = 0; i < list.length; i++){
                    if($(list[i]).text() == title){
                        $(list[i]).css({"color":"#000"});
                    }
                }
                $("#networks > a").css({"color": "#000", "background-color": "#fff"});
                $("#networks > a").mouseover(function(){
                    $(this).css({"background-color": "#000", "color": "#fff"});
                });
                $("#networks > a").mouseout(function(){
                    $(this).css({"background-color": "#fff", "color": "#000"});
                });
                $(".text-white-50").addClass("text-muted").removeClass("text-white-50");
                $(".link-light").addClass("link-dark").removeClass("link-light");
            }
            function DarkTheme(){
                localStorage["theme"] = "dark";
                $(".bg-white, input, textarea").addClass("bg-dark").removeClass("bg-white");
                $(".text-dark, .navbar a, input, textarea").addClass("text-light").removeClass("text-dark");
                $("footer .nav-link").css({"color": "rgba(248,249,250,0.75)"});
                $(".navbar .nav-link").removeClass("text-light").css({"color":"#aaa"});
                var title = "<?php echo $this->title ?>";
                var list = document.querySelectorAll('.navbar .nav-link');
                for(var i = 0; i < list.length; i++){
                    if($(list[i]).text() == title){
                        $(list[i]).css({"color":"#fff"});
                    }
                }
                $("#networks > a").css({"color": "#fff", "background-color": "#212529"});
                $("#networks > a").mouseover(function(){
                    $(this).css({"background-color": "#fff", "color": "#212529"});
                });
                $("#networks > a").mouseout(function(){
                    $(this).css({"background-color": "#212529", "color": "#fff"});
                });
                $(".text-muted").addClass("text-white-50").removeClass("text-muted");
                $(".link-dark").addClass("link-light").removeClass("link-dark");
            }
            $("#light").click(function(){
                LightTheme();
            });
            $("#dark").click(function(){
                DarkTheme();
            });
        </script>
    </body>
</html>