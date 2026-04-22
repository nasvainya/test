<?php

class Page
{
    private string $name;
    protected string $template;

    public function __construct()
    {
        $this->name = "page";
        $this->template = "
        <div class='default-page'>
            <p>🐚 Добро пожаловать в Океанариум 'Море песок' 🐚</p>
        </div>";
    }

    public function render(): void
    {
        echo $this->template;
    }

    public function getName(): string
    {
        return $this->name;
    }
}


class BlogPage extends Page
{
    public function __construct()
    {
        $this->name = "blog";
        
        $this->template = '
        <div class="blog-container">
            <h2>🌊 Наши обитатели 🌊</h2>
            <div class="cards-wrapper">
                <div class="card">
                    <div class="card-image">🐠</div>
                    <h3>Тропические рыбы</h3>
                    <p>Яркие обитатели коралловых рифов. Звание самых красочных и жиописных аквариумов по праву принадлежит им!</p>
                </div>
                <div class="card">
                    <div class="card-image">🦈</div>
                    <h3>Рифовые акулы</h3>
                    <p>Грациозные хищники океана. Но не бойтесь, мы хорошо их кормим, так что они добрые <3 !</p>
                </div>
                <div class="card">
                    <div class="card-image">🐙</div>
                    <h3>Осьминог</h3>
                    <p>Умнейший моллюск с тремя сердцами. Настолько умный, что он до сих помнит теорему Виета!</p>
                </div>
                <div class="card">
                    <div class="card-image">🐢</div>
                    <h3>Морская черепаха</h3>
                    <p>Древний странник океанских глубин. Потратив всю жизнь, чтобы проплыть через весь мир, они выбрали обоснаваться именно у нас!</p>
                </div>
                <div class="card">
                    <div class="card-image">🦭</div>
                    <h3>Тюлени</h3>
                    <p>Дружелюбные и игривые! Каждый день они готовы показывать свои    таланты на публику. Приходите, чтобы увидеть специальное представление!</p>
                </div>
                <div class="card">
                    <div class="card-image">⭐</div>
                    <h3>Морские звёзды</h3>
                    <p>Удивительные создания морского дна. Самые уникальные виды уже у нас!</p>
                </div>
            </div>
        </div>';
    }
}

echo '<div class="nav-links">';
echo '<a href="?page=page">🏠 Главная</a>';
echo '<a href="?page=blog">🐋 Наши обитатели</a>';
echo '</div>';


$pageType = isset($_GET['page']) ? (string)$_GET['page'] : 'page';


if ($pageType === 'blog') {
    $page = new BlogPage();
    $page->render();
} else {
    $page = new Page();
    $page->render();
}

echo '<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: "Segoe UI", Arial, sans-serif;
        background: linear-gradient(135deg, #0a1a2a 0%, #0d3b5e 30%, #1a6b8a 60%, #2a9d8f 100%);
        min-height: 100vh;
        padding: 30px 20px;
        position: relative;
        overflow-x: hidden;
    }
    
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 20% 30%, rgba(100, 200, 255, 0.15) 0%, transparent 50%),
                    radial-gradient(circle at 80% 70%, rgba(50, 150, 200, 0.1) 0%, transparent 60%);
        animation: lightMove 15s ease-in-out infinite alternate;
        pointer-events: none;
        z-index: 0;
    }
    
    @keyframes lightMove {
        0% { opacity: 0.5; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.1); }
        100% { opacity: 0.5; transform: scale(1); }
    }
    

    .bubbles-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }
    

    .bubble {
        position: absolute;
        bottom: -50px;
        background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.4), rgba(150, 220, 255, 0.1));
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: inset -5px -5px 10px rgba(0, 0, 0, 0.1), 0 0 15px rgba(100, 200, 255, 0.2);
        animation: floatUp linear infinite;
    }
    
    @keyframes floatUp {
        0% {
            bottom: -50px;
            opacity: 0;
            transform: translateX(0) scale(0.5);
        }
        10% {
            opacity: 0.6;
        }
        90% {
            opacity: 0.4;
        }
        100% {
            bottom: 110%;
            opacity: 0;
            transform: translateX(30px) scale(1.2);
        }
    }
    

    .fish {
        position: fixed;
        font-size: 24px;
        opacity: 0.3;
        pointer-events: none;
        z-index: 1;
        animation: swim linear infinite;
        filter: drop-shadow(0 0 10px rgba(0, 150, 200, 0.3));
    }
    
    @keyframes swim {
        0% {
            left: -60px;
            transform: scaleX(1);
        }
        49% {
            transform: scaleX(1);
        }
        50% {
            left: calc(100% + 60px);
            transform: scaleX(-1);
        }
        51% {
            transform: scaleX(-1);
        }
        99% {
            transform: scaleX(-1);
        }
        100% {
            left: -60px;
            transform: scaleX(1);
        }
    }
    

    .seaweed {
        position: fixed;
        bottom: 0;
        width: 4px;
        background: linear-gradient(to top, #1a5c3a, #2d8c5a, #3db87a);
        border-radius: 50% 50% 0 0;
        opacity: 0.3;
        pointer-events: none;
        z-index: 1;
        transform-origin: bottom;
        animation: sway 6s ease-in-out infinite alternate;
    }
    
    .seaweed::before,
    .seaweed::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 60%;
        background: inherit;
        border-radius: inherit;
        transform-origin: bottom;
    }
    
    .seaweed::before {
        transform: rotate(15deg);
    }
    
    .seaweed::after {
        transform: rotate(-15deg);
    }
    
    @keyframes sway {
        0% { transform: rotate(-5deg); }
        100% { transform: rotate(5deg); }
    }
    

    .wave-bottom {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 40px;
        pointer-events: none;
        z-index: 1;
        opacity: 0.4;
    }
    
    .wave-bottom svg {
        position: absolute;
        bottom: 0;
        width: 200%;
        height: 100%;
        animation: waveMove 8s linear infinite;
    }
    
    .wave-bottom svg:last-child {
        animation: waveMove 10s linear infinite reverse;
        opacity: 0.5;
    }
    
    @keyframes waveMove {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    

    .nav-links {
        text-align: center;
        margin-bottom: 40px;
        position: relative;
        z-index: 10;
    }
    
    .nav-links a {
        display: inline-block;
        padding: 14px 35px;
        margin: 0 12px;
        background: rgba(10, 40, 60, 0.6);
        color: #ffffff;
        text-decoration: none;
        border-radius: 40px;
        font-size: 18px;
        font-weight: 500;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(100, 200, 255, 0.3);
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0, 20, 40, 0.4), 0 0 20px rgba(0, 150, 255, 0.1);
    }
    
    .nav-links a:hover {
        background: rgba(20, 80, 120, 0.7);
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(0, 20, 40, 0.5), 0 0 30px rgba(0, 200, 255, 0.3);
        border-color: #6ec8e8;
    }
    

    .default-page {
        max-width: 600px;
        margin: 80px auto;
        padding: 60px 40px;
        background: rgba(10, 40, 60, 0.5);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        border: 1px solid rgba(100, 200, 255, 0.3);
        text-align: center;
        position: relative;
        z-index: 10;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3), 0 0 50px rgba(0, 150, 200, 0.1);
        animation: glow 4s ease-in-out infinite alternate;
    }
    
    @keyframes glow {
        0% { box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3), 0 0 30px rgba(0, 150, 200, 0.1); }
        100% { box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3), 0 0 60px rgba(0, 200, 255, 0.3); }
    }
    
    .default-page p {
        color: #ffffff;
        font-size: 32px;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        position: relative;
        z-index: 2;
    }
    

    .blog-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 10;
    }
    
    .blog-container h2 {
        text-align: center;
        color: #ffffff;
        font-size: 42px;
        margin-bottom: 45px;
        text-shadow: 3px 3px 15px rgba(0, 0, 0, 0.4);
        letter-spacing: 3px;
        animation: titleFloat 5s ease-in-out infinite;
    }
    
    @keyframes titleFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    
    .cards-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
    }
    
    .card {
        background: rgba(10, 40, 60, 0.5);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 30px 25px;
        width: 300px;
        text-align: center;
        border: 1px solid rgba(100, 200, 255, 0.3);
        transition: all 0.4s ease;
        box-shadow: 0 8px 35px rgba(0, 0, 0, 0.3);
        animation: cardGlow 5s ease-in-out infinite alternate;
    }
    
    @keyframes cardGlow {
        0% { border-color: rgba(100, 200, 255, 0.2); }
        100% { border-color: rgba(100, 200, 255, 0.5); }
    }
    
    .card:hover {
        transform: translateY(-10px) scale(1.02);
        background: rgba(20, 60, 90, 0.6);
        border-color: #7ec8e0;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4), 0 0 40px rgba(0, 200, 255, 0.2);
    }
    
    .card-image {
        font-size: 90px;
        margin-bottom: 20px;
        filter: drop-shadow(2px 6px 10px rgba(0, 0, 0, 0.3));
        animation: iconBounce 3s ease-in-out infinite;
    }
    
    @keyframes iconBounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    
    .card h3 {
        color: #ffffff;
        font-size: 24px;
        margin-bottom: 12px;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.4);
    }
    
    .card p {
        color: #c5e8f0;
        font-size: 15px;
        opacity: 0.95;
    }
</style>';


echo '
<div class="bubbles-container" id="bubbles"></div>

<div class="fish" style="top: 15%; animation-duration: 20s;">🐟</div>
<div class="fish" style="top: 35%; animation-duration: 25s; font-size: 18px;">🐠</div>
<div class="fish" style="top: 55%; animation-duration: 30s; font-size: 30px;">🐡</div>
<div class="fish" style="top: 75%; animation-duration: 22s; font-size: 20px;">🐟</div>
<div class="fish" style="top: 85%; animation-duration: 28s;">🐠</div>

<div class="seaweed" style="left: 5%; height: 100px;"></div>
<div class="seaweed" style="left: 8%; height: 70px; animation-duration: 5s;"></div>
<div class="seaweed" style="right: 5%; height: 120px;"></div>
<div class="seaweed" style="right: 12%; height: 80px; animation-duration: 7s;"></div>

<div class="wave-bottom">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,60 C150,100 350,20 500,60 C650,100 850,20 1000,60 C1100,80 1150,90 1200,100 L1200,120 L0,120 Z" fill="rgba(30, 120, 150, 0.3)"/>
    </svg>
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,80 C200,40 400,100 600,80 C800,60 1000,100 1200,70 L1200,120 L0,120 Z" fill="rgba(20, 100, 130, 0.2)"/>
    </svg>
</div>

<script>
const bubblesContainer = document.getElementById("bubbles");
const bubbleCount = 25;

for (let i = 0; i < bubbleCount; i++) {
    const bubble = document.createElement("div");
    bubble.classList.add("bubble");
    
    const size = Math.random() * 40 + 10;
    const left = Math.random() * 100;
    const delay = Math.random() * 15;
    const duration = Math.random() * 10 + 10;
    
    bubble.style.width = size + "px";
    bubble.style.height = size + "px";
    bubble.style.left = left + "%";
    bubble.style.animationDelay = delay + "s";
    bubble.style.animationDuration = duration + "s";
    
    bubblesContainer.appendChild(bubble);
}

setInterval(() => {
    const bubble = document.createElement("div");
    bubble.classList.add("bubble");
    
    const size = Math.random() * 30 + 5;
    const left = Math.random() * 100;
    const duration = Math.random() * 8 + 8;
    
    bubble.style.width = size + "px";
    bubble.style.height = size + "px";
    bubble.style.left = left + "%";
    bubble.style.animationDuration = duration + "s";
    
    bubblesContainer.appendChild(bubble);
    
    setTimeout(() => {
        bubble.remove();
    }, duration * 1000);
}, 2000);
</script>
';



?>
