<?php
$input = $_GET["secret"] ?? "";
$keyword = "tanjiro";
$flag = "IDN_CTF{d0ub!e_t4njiro_m4ke_u_H4ppy?}";

// Sanitasi input: hapus spasi dan case insensitive
$clean_input = strtolower(str_replace(' ', '', $input));

// Hapus SATU kemunculan pertama tanjiro
$result = preg_replace("/".preg_quote($keyword, '/')."/", "", $clean_input, 1);

// Cek hasil akhir harus sama dengan keyword
$show_flag = ($result === $keyword);

// Handle redirects for specific cases
if ($input === $keyword) {
    header("Location: /tanjiro_code" . strtok($_SERVER["REQUEST_URI"], '?') . "?secret=");
    exit;
} elseif ($input !== "" && $input !== "tanjirotanjiro" && !$show_flag) {
    header("Location: /tanjiro_code" . strtok($_SERVER["REQUEST_URI"], '?') . "?secret=");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Demon Slayer CTF Challenge</title>
    <style>
        body {
            background: #1a1a1a;
            color: #ff9999;
            font-family: 'Courier New', monospace;
            padding: 2rem;
            line-height: 1.6;
            margin: 0;
            overflow-x: hidden;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ff6666;
            border-radius: 8px;
            padding: 20px;
            background: #222;
            box-shadow: 0 0 15px rgba(255, 102, 102, 0.3);
            position: relative;
            overflow: hidden;
        }
        h1 {
            text-align: center;
            color: #ff5555;
            margin-bottom: 30px;
            text-shadow: 0 0 5px rgba(255, 85, 85, 0.5);
        }
        h3 {
            border-bottom: 1px solid #ff6666;
            padding-bottom: 5px;
            color: #ff7777;
        }
        pre.nocopy {
            background: #2a2a2a;
            padding: 1rem;
            border-radius: 5px;
            border: 1px solid #ff6666;
            overflow-x: auto;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
        .success {
            color: #66ff66;
            font-size: 1.5rem;
            padding: 1rem;
            background: #2a3a2a;
            border-radius: 5px;
            border: 1px solid #66ff66;
            text-align: center;
            margin: 20px 0;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(102, 255, 102, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(102, 255, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(102, 255, 102, 0); }
        }
        .hint {
            background: #2a2a3a;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 3px solid #9999ff;
        }
        
        /* Enhanced water animation styles */
        .failure {
            color: #66ccff;
            font-size: 1.2rem;
            padding: 1rem;
            background: #2a2a3a;
            border-radius: 5px;
            border: 1px solid #66ccff;
            text-align: center;
            margin: 20px 0;
            animation: waterBreath 3s infinite;
            position: relative;
            overflow: hidden;
        }
        
        @keyframes waterBreath {
            0% { transform: translateY(0); box-shadow: 0 0 5px 0 rgba(100, 200, 255, 0.5); }
            50% { transform: translateY(-5px); box-shadow: 0 0 15px 5px rgba(100, 200, 255, 0.7); }
            100% { transform: translateY(0); box-shadow: 0 0 5px 0 rgba(100, 200, 255, 0.5); }
        }
        
        .water-ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(102, 204, 255, 0.3);
            transform: scale(0);
            opacity: 1;
            animation: ripple 3s linear infinite;
        }
        
        @keyframes ripple {
            0% { transform: scale(0); opacity: 1; }
            100% { transform: scale(3); opacity: 0; }
        }
        
        .water-effect {
            position: absolute;
            width: 100%;
            height: 150px;
            bottom: 0;
            left: 0;
            background: linear-gradient(to top, 
                rgba(100, 150, 255, 0.4), 
                rgba(100, 200, 255, 0.2) 60%, 
                transparent);
            opacity: 0;
            z-index: -1;
            transition: opacity 0.5s;
        }
        
        .water-waves {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%234facfe" fill-opacity="0.2" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: 100% 100%;
            opacity: 0.7;
            animation: waveMove 20s linear infinite;
        }
        
        @keyframes waveMove {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        .show-water {
            opacity: 1;
        }
        
        .water-message {
            animation: fadeInUp 1s ease-out;
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .swords {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        
        .sword {
            font-size: 2rem;
            margin: 0 15px;
            transform: rotate(45deg);
            display: inline-block;
            transition: all 0.5s;
        }
        
        .water-active {
            color: #66ccff;
            text-shadow: 0 0 10px rgba(102, 204, 255, 0.8);
            animation: waterSwordSlash 2s ease-in-out;
        }
        
        @keyframes waterSwordSlash {
            0% { transform: rotate(45deg) translateY(0); }
            10% { transform: rotate(0deg) translateY(0); }
            30% { transform: rotate(-90deg) translateY(-20px) scale(1.2); text-shadow: 0 0 20px #66ccff; }
            40% { transform: rotate(-180deg) translateY(0) scale(1.1); }
            60% { transform: rotate(-270deg) translateY(20px) scale(1.2); text-shadow: 0 0 20px #66ccff; }
            70% { transform: rotate(-360deg) translateY(0) scale(1.1); }
            100% { transform: rotate(45deg) translateY(0); }
        }
        
        .water-drops {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }
        
        .water-drop {
            position: absolute;
            width: 8px;
            height: 8px;
            background: rgba(102, 204, 255, 0.7);
            border-radius: 50%;
            animation: dropFall linear forwards;
        }
        
        @keyframes dropFall {
            0% { transform: translateY(-50px); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(calc(100vh - 50px)); opacity: 0; }
        }
        
        /* Fire animation for success */
        .fire-effect {
            position: absolute;
            width: 100%;
            height: 150px;
            bottom: 0;
            left: 0;
            background: linear-gradient(to top, rgba(255, 100, 50, 0.6), transparent);
            opacity: 0;
            z-index: -1;
            transition: opacity 0.5s;
        }
        
        .fire-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }
        
        .fire-particle {
            position: absolute;
            width: 10px;
            height: 10px;
            background: rgba(255, 150, 50, 0.8);
            border-radius: 50%;
            filter: blur(2px);
            animation: riseAndFade linear forwards;
        }
        
        @keyframes riseAndFade {
            0% { transform: translateY(20px); opacity: 0; }
            20% { opacity: 1; }
            100% { transform: translateY(-100px); opacity: 0; }
        }
        
        .fire-active {
            color: #ff6633;
            text-shadow: 0 0 10px rgba(255, 102, 51, 0.8);
            animation: fireSwordSlash 1.5s ease-in-out;
        }
        
        @keyframes fireSwordSlash {
            0% { transform: rotate(45deg); }
            50% { transform: rotate(405deg) scale(1.3); text-shadow: 0 0 25px #ff6633; }
            100% { transform: rotate(45deg); }
        }
        
        .show-fire {
            opacity: 1;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('contextmenu', e => e.preventDefault());
            document.addEventListener('keydown', e => {
                if ((e.ctrlKey && ['c', 'u'].includes(e.key.toLowerCase())) || e.key === 'F12') {
                    e.preventDefault();
                }
            });
            
            // Check if there's a parameter in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const secretParam = urlParams.get('secret');
            
            // Add sword elements
            const swordsDiv = document.createElement('div');
            swordsDiv.className = 'swords';
            swordsDiv.innerHTML = `
                <span class="sword" id="sword1">⚔️</span>
                <span class="sword" id="sword2">🗡️</span>
                <span class="sword" id="sword3">⚔️</span>
            `;
            
            // Insert swords after h1
            const h1 = document.querySelector('h1');
            h1.parentNode.insertBefore(swordsDiv, h1.nextSibling);
            
            // Create water and fire effects
            const waterEffect = document.createElement('div');
            waterEffect.className = 'water-effect';
            waterEffect.innerHTML = '<div class="water-waves"></div>';
            document.querySelector('.container').appendChild(waterEffect);
            
            const fireEffect = document.createElement('div');
            fireEffect.className = 'fire-effect';
            document.querySelector('.container').appendChild(fireEffect);
            
            // Create drops container
            const waterDrops = document.createElement('div');
            waterDrops.className = 'water-drops';
            waterDrops.id = 'waterDrops';
            document.querySelector('.container').appendChild(waterDrops);
            
            // Create fire particles container
            const fireParticles = document.createElement('div');
            fireParticles.className = 'fire-particles';
            fireParticles.id = 'fireParticles';
            document.querySelector('.container').appendChild(fireParticles);
            
            // Style the failure message if it exists
            const failureMsg = document.querySelector('p');
            if (failureMsg && failureMsg.textContent.includes('Pernapasan Air')) {
                failureMsg.className = 'failure water-message';
                failureMsg.innerHTML = `
                    🌊 Kamu hanya bisa Pernapasan Air, coba latihan lebih keras untuk dapatkan pernapasan Hinokami Kagura!
                    <div class="water-ripple" id="ripple1"></div>
                    <div class="water-ripple" id="ripple2"></div>
                `;
                
                // Position ripples
                setTimeout(() => {
                    const ripple1 = document.getElementById('ripple1');
                    const ripple2 = document.getElementById('ripple2');
                    
                    if (ripple1 && ripple2) {
                        ripple1.style.width = '200px';
                        ripple1.style.height = '200px';
                        ripple1.style.left = '70%';
                        ripple1.style.top = '50%';
                        
                        ripple2.style.width = '150px';
                        ripple2.style.height = '150px';
                        ripple2.style.left = '30%';
                        ripple2.style.top = '30%';
                        ripple2.style.animationDelay = '1.5s';
                    }
                    
                    // Activate water effects
                    waterEffect.classList.add('show-water');
                    
                    // Animate swords with water style
                    const swords = [
                        document.getElementById('sword1'),
                        document.getElementById('sword2'),
                        document.getElementById('sword3')
                    ];
                    
                    swords.forEach((sword, index) => {
                        setTimeout(() => {
                            sword.classList.add('water-active');
                            
                            setTimeout(() => {
                                sword.classList.remove('water-active');
                            }, 2000);
                        }, index * 300);
                    });
                    
                    // Create water drops
                    createWaterDrops();
                }, 100);
            }
            
            // Style the success message if it exists
            const successMsg = document.querySelector('.success');
            if (successMsg) {
                // Activate fire effects
                fireEffect.classList.add('show-fire');
                
                // Animate swords with fire style
                const swords = [
                    document.getElementById('sword1'),
                    document.getElementById('sword2'),
                    document.getElementById('sword3')
                ];
                
                swords.forEach((sword, index) => {
                    setTimeout(() => {
                        sword.classList.add('fire-active');
                        
                        setTimeout(() => {
                            sword.classList.remove('fire-active');
                        }, 1500);
                    }, index * 300);
                });
                
                // Create fire particles
                createFireParticles();
            }
        });
        
        function createWaterDrops() {
            const waterDrops = document.getElementById('waterDrops');
            if (!waterDrops) return;
            
            const dropCount = 30;
            
            for (let i = 0; i < dropCount; i++) {
                setTimeout(() => {
                    const drop = document.createElement('div');
                    drop.className = 'water-drop';
                    
                    // Random position and animation duration
                    const posX = Math.random() * window.innerWidth;
                    const size = 3 + Math.random() * 8;
                    const duration = 2 + Math.random() * 3; // seconds
                    
                    drop.style.left = `${posX}px`;
                    drop.style.width = `${size}px`;
                    drop.style.height = `${size}px`;
                    drop.style.animationDuration = `${duration}s`;
                    
                    waterDrops.appendChild(drop);
                    
                    // Remove drop after animation completes
                    setTimeout(() => {
                        if (waterDrops.contains(drop)) {
                            waterDrops.removeChild(drop);
                        }
                    }, duration * 1000);
                    
                }, i * 200);
            }
            
            // Continue creating drops
            setTimeout(createWaterDrops, dropCount * 200);
        }
        
        function createFireParticles() {
            const fireParticles = document.getElementById('fireParticles');
            if (!fireParticles) return;
            
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                setTimeout(() => {
                    const particle = document.createElement('div');
                    particle.className = 'fire-particle';
                    
                    // Random position, size, color and animation duration
                    const posX = Math.random() * window.innerWidth;
                    const size = 5 + Math.random() * 10;
                    const hue = 20 + Math.random() * 30; // oranges and reds
                    const duration = 1.5 + Math.random() * 2; // seconds
                    
                    particle.style.left = `${posX}px`;
                    particle.style.bottom = '0px';
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.background = `rgba(255, ${hue}%, 50%, ${0.5 + Math.random() * 0.5})`;
                    particle.style.animationDuration = `${duration}s`;
                    
                    fireParticles.appendChild(particle);
                    
                    // Remove particle after animation completes
                    setTimeout(() => {
                        if (fireParticles.contains(particle)) {
                            fireParticles.removeChild(particle);
                        }
                    }, duration * 1000);
                    
                }, i * 100);
            }
            
            // Continue creating particles
            setTimeout(createFireParticles, particleCount * 100);
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>🩸 Hashira Training IDN-CTF 🗡️</h1>
        <h3>Source Code Review:</h3>
        <pre class="nocopy">
&lt;?php
$input = $_GET["secret"] ?? "";

$clean_input = strtolower(str_replace(" ", "", $input));
$result = preg_replace("/".preg_quote($keyword, '/')."/", "", $clean_input, 1);

if ($result === "tanjiro") {
    echo $flag;
}

?&gt;
        </pre>

        <?php if($show_flag): ?>
            <div class="success">
            🎌 Congratulations! Anda telah menguasai teknik Hinokami Kagura.
            <br>
              ambil pedang baru : <?= $flag ?>
            </div>
        <?php else: ?>
            <p>🌊Kamu hanya bisa Pernapasan Air, cari tehnik untuk mencapai tehnik tingkat lanjut!</p>
        <?php endif; ?>
    </div>
</body>
</html>
