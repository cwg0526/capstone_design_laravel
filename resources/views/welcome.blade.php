<!DOCTYPE HTML>
<!--
	Miniport by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Miniport by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="/css/weather.css" />
</head>
<body class="is-preload">

<!-- Nav -->
<nav id="nav">
    <ul class="container">
        <li><a href="#top">Top</a></li>
        <li><a href="#work">Work</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>

<script>
    (function(d, s, id) {
        if (d.getElementById(id)) {
            if (window.__TOMORROW__) {
                window.__TOMORROW__.renderWidget();
            }
            return;
        }
        const fjs = d.getElementsByTagName(s)[0];
        const js = d.createElement(s);
        js.id = id;
        js.src = "https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js";

        fjs.parentNode.insertBefore(js, fjs);
    })(document, 'script', 'tomorrow-sdk');
</script>

<!-- Home -->
<article id="top" class="wrapper style4" style="padding-top: 0; height: 800px;">
    <div class="row" style="padding: 0 0 0 0;">
        <div class="col-4" style="border: 1px solid red;">
            <div class="tomorrow" data-location-id="065357" data-language="KO" data-unit-system="METRIC" data-skin="light" data-widget-type="upcoming" style="padding-bottom:22px;position:relative;">
                <a href="https://www.tomorrow.io/weather/" rel="nofollow noopener noreferrer" target="_blank" style="position: absolute; bottom: 0; transform: translateX(-50%); left: 50%;">
                    <img alt="Powered by Tomorrow.io" src="https://weather-website-client.tomorrow.io/img/powered-by-tomorrow.svg"/>
                </a>
                <?php
                if(isset($newLists) && is_array($newLists)){
                    foreach ($newLists as $txt){
                        echo $txt;
                        echo "<br>";
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-4" style="padding: 0 0 0 0;">
            <div class="tomorrow" data-location-id="065357" data-language="KO" data-unit-system="METRIC" data-skin="light" data-widget-type="upcoming" style="padding-bottom:22px;position:relative;">
                <a href="https://www.tomorrow.io/weather/" rel="nofollow noopener noreferrer" target="_blank" style="position: absolute; bottom: 0; transform: translateX(-50%); left: 50%;">
                    <img alt="Powered by Tomorrow.io" src="https://weather-website-client.tomorrow.io/img/powered-by-tomorrow.svg"/>
                </a>
                <?php
                if(isset($newLists) && is_array($newLists)){
                    foreach ($newLists as $txt){
                        echo $txt;
                        echo "<br>";
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-4" style="padding: 0 0 0 0;">
            <iframe style="width: 100%; height: 100%; margin-top: -20px;" src="https://m.map.kakao.com/actions/carRoute?startLoc=%EC%84%A0%ED%95%99%EC%97%AD%20%EC%9D%B8%EC%B2%9C1%ED%98%B8%EC%84%A0&sxEnc=LPQNNO&syEnc=QNNROPM&endLoc=%EC%82%BC%EC%A0%95%EB%8D%B0%EC%9D%B4%ED%83%80%EC%84%9C%EB%B9%84%EC%8A%A4&exEnc=LLMNSU&eyEnc=QOWLLTQ&ids=P13597528,P21161023&service="></iframe>
        </div>
    </div>
</article>

<!-- Work -->
<article id="work" class="wrapper style2">
    <div class="container">
        <header>
            <h2>Here's all the stuff I do.</h2>
            <p>Odio turpis amet sed consequat eget posuere consequat.</p>
        </header>
        <div class="row aln-center">
            <div class="col-4 col-6-medium col-12-small">
                <section class="box style1">
                    <span class="icon featured fa-comments"></span>
                    <h3>Consequat lorem</h3>
                    <p>Ornare nulla proin odio consequat sapien vestibulum ipsum primis sed amet consequat lorem dolore.</p>
                </section>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <section class="box style1">
                    <span class="icon solid featured fa-camera-retro"></span>
                    <h3>Lorem dolor tempus</h3>
                    <p>Ornare nulla proin odio consequat sapien vestibulum ipsum primis sed amet consequat lorem dolore.</p>
                </section>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <section class="box style1">
                    <span class="icon featured fa-thumbs-up"></span>
                    <h3>Feugiat posuere</h3>
                    <p>Ornare nulla proin odio consequat sapien vestibulum ipsum primis sed amet consequat lorem dolore.</p>
                </section>
            </div>
        </div>
        <footer>
            <p>Lorem ipsum dolor sit sapien vestibulum ipsum primis?</p>
            <a href="#portfolio" class="button large scrolly">See some of my recent work</a>
        </footer>
    </div>
</article>

<!-- Portfolio -->
<article id="portfolio" class="wrapper style3">
    <div class="container">
        <header>
            <h2>Here??????s some stuff I made recently.</h2>
            <p>Proin odio consequat  sapien vestibulum consequat lorem dolore feugiat.</p>
        </header>
        <div class="row">
            <div class="col-4 col-6-medium col-12-small">
                <article class="box style2">
                    <a href="#" class="image featured"><img src="/images/pic01.jpg" alt="" /></a>
                    <h3><a href="#">Magna feugiat</a></h3>
                    <p>Ornare nulla proin odio consequat.</p>
                </article>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <article class="box style2">
                    <a href="#" class="image featured"><img src="/images/pic02.jpg" alt="" /></a>
                    <h3><a href="#">Veroeros primis</a></h3>
                    <p>Ornare nulla proin odio consequat.</p>
                </article>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <article class="box style2">
                    <a href="#" class="image featured"><img src="/images/pic03.jpg" alt="" /></a>
                    <h3><a href="#">Lorem ipsum</a></h3>
                    <p>Ornare nulla proin odio consequat.</p>
                </article>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <article class="box style2">
                    <a href="#" class="image featured"><img src="/images/pic04.jpg" alt="" /></a>
                    <h3><a href="#">Tempus dolore</a></h3>
                    <p>Ornare nulla proin odio consequat.</p>
                </article>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <article class="box style2">
                    <a href="#" class="image featured"><img src="/images/pic05.jpg" alt="" /></a>
                    <h3><a href="#">Feugiat aliquam</a></h3>
                    <p>Ornare nulla proin odio consequat.</p>
                </article>
            </div>
            <div class="col-4 col-6-medium col-12-small">
                <article class="box style2">
                    <a href="#" class="image featured"><img src="/images/pic06.jpg" alt="" /></a>
                    <h3><a href="#">Sed amet ornare</a></h3>
                    <p>Ornare nulla proin odio consequat.</p>
                </article>
            </div>
        </div>
        <footer>
            <p>Lorem ipsum dolor sit sapien vestibulum ipsum primis?</p>
            <a href="#contact" class="button large scrolly">Get in touch with me</a>
        </footer>
    </div>
</article>

<!-- Contact -->
<article id="contact" class="wrapper style4">
    <div class="container medium">
        <header>
            <h2>Have me make stuff for you.</h2>
            <p>Ornare nulla proin odio consequat sapien vestibulum ipsum.</p>
        </header>
        <div class="row">
            <div class="col-12">
                <form method="post" action="#">
                    <div class="row">
                        <div class="col-6 col-12-small">
                            <input type="text" name="name" id="name" placeholder="Name" />
                        </div>
                        <div class="col-6 col-12-small">
                            <input type="text" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="subject" id="subject" placeholder="Subject" />
                        </div>
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Send Message" /></li>
                                <li><input type="reset" value="Clear Form" class="alt" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <hr />
                <h3>Find me on ...</h3>
                <ul class="social">
                    <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
                    <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                    <li><a href="#" class="icon brands fa-tumblr"><span class="label">Tumblr</span></a></li>
                    <li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
                    <li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
                    <!--
                    <li><a href="#" class="icon solid fa-rss"><span>RSS</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram"><span>Instagram</span></a></li>
                    <li><a href="#" class="icon brands fa-foursquare"><span>Foursquare</span></a></li>
                    <li><a href="#" class="icon brands fa-skype"><span>Skype</span></a></li>
                    <li><a href="#" class="icon brands fa-soundcloud"><span>Soundcloud</span></a></li>
                    <li><a href="#" class="icon brands fa-youtube"><span>YouTube</span></a></li>
                    <li><a href="#" class="icon brands fa-blogger"><span>Blogger</span></a></li>
                    <li><a href="#" class="icon brands fa-flickr"><span>Flickr</span></a></li>
                    <li><a href="#" class="icon brands fa-vimeo"><span>Vimeo</span></a></li>
                    -->
                </ul>
                <hr />
            </div>
        </div>
        <footer>
            <ul id="copyright">
                <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </footer>
    </div>
</article>

<!-- Scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.scrolly.min.js"></script>
<script src="/js/browser.min.js"></script>
<script src="/js/breakpoints.min.js"></script>
<script src="/js/util.js"></script>
<script src="/js/main.js"></script>
<script src="/js/weather.js"></script>
<script src="/js/jquery.mb.TYPlayer.min.js"></script>

</body>
</html>