<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    body {
        background: black;
    }

    .card-body {
        padding: 20%
    }

    h4 {
        font-size: 50px;


    }

    .neon-border {
        position: relative;
        border: 2px solid #8d8da7;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 0 5px blue;
        overflow: hidden;
        /* Ensure the glow effect doesn't overflow */
    }

    .neon-border::after {
        content: '';
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border: 2px solid #5e5e87;
        border-radius: 10px;
        z-index: -1;
        animation: neon-glow 1.5s linear infinite;
    }

    @keyframes neon-glow {
        0% {
            opacity: 0;
            box-shadow: 0 0 5px #00ff00;
        }

        50% {
            opacity: 1;
            box-shadow: 0 0 20px #00ff00, 0 0 40px #00ff00, 0 0 80px #00ff00;
        }

        100% {
            opacity: 0;
            box-shadow: 0 0 5px #00ff00;
        }
    }

    .clock {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        color: #17D4FE;
        font-size: 230px;
        font-family: Orbitron;
        letter-spacing: 7px;



    }

    #alarm {

        transition: opacity 0.5s ease, height 0.5s ease;
    }
    </style>


</head>

<body>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Analog Neon Watch</h3>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">



            <div class="card neon-border">
                <div class="row">

                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                        <button class="btn btn-secondary mb-3" id="buttton" style="Margin-bottom:5px">Set Alarm</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row" id="alarm" style="display:none">
                    <div class="col-md-4">
                        <input class="form-control" type="number" name="" id="Alarmhours" placeholder="Enter Hours">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" type="number" name="" id="Alarmmins" placeholder="Enter Minuttes">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" type="number" name="" id="Alarmsec" placeholder="Enter Seconds">

                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-secondary mb-3" id="alarmButton"
                            style="Margin-top:5px; text-center:center">Add
                            Alarm</button>
                        <button class="btn btn-secondary mb-3" id="alarmButtonstop"
                            style="Margin-top:5px; text-center:center;">Stop
                            Alarm</button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <h4 class="clock" id="clock"></h4>
                    </div>


                </div>

            </div>



        </div>
    </div>

    <script>
    var audio = new Audio('alarm.wav');


    (function() {


        setInterval(() => {
            var date = new Date();
            const hour = date.getHours();
            const min = date.getMinutes();
            const sec = date.getSeconds();

            document.getElementById('clock').innerHTML = `${hour}:${min}:${sec}`;
        })
    })();

    var elements = document.querySelectorAll('.col-md-4');
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.textAlign = 'center';
    }



    const button = document.getElementById('buttton');
    const alarm = document.getElementById('alarmButton');
    const stopalarm = document.getElementById('alarmButtonstop');
    const showdiv = () => {

        document.getElementById('alarm').style.display = 'block';
    }



    const addAlarm = () => {
        const hourInput = document.getElementById('Alarmhours');
        const minuteInput = document.getElementById('Alarmmins');


        var hour = parseInt(hourInput.value);
        var minute = parseInt(minuteInput.value);
        var currentTime = new Date();
        var alarmTime = new Date();
        alarmTime.setHours(hour);
        alarmTime.setMinutes(minute);
        alarmTime.setSeconds(0);
        var timeDifference = alarmTime.getTime() - currentTime.getTime();
        alert(timeDifference);

        console.log('timeDifference');
        if (timeDifference > 0) {
            setTimeout(function() {
                playAlarm();

            }, timeDifference); // Convert minutes to milliseconds
        }


        function playAlarm() {
            audio.loop = true;
            audio.play();
        }
        alert('Alarm set for ' + hour + ' hour(s) and ' + minute + ' minute(s) from now.');
        document.getElementById('alarmButtonstop').style.display = 'block';

    };

    const stopAlarmAudio = () => {
        alert('stoping Alarm')
        audio.pause();

    }
    alarm.addEventListener('click', addAlarm)
    button.addEventListener('click', showdiv);
    stopalarm.addEventListener('click', stopAlarmAudio);
    </script>
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div id="showMessafe"></div>
            </div>
            <div class="row">
                <div class="col-ms-12">
                    <button id="button">Start Counter</button>
                    <button id="button2">Stop Counter</button>
                </div>
            </div>

        </div>

    </div> -->



    <!-- <script>
        (function() {
            setInterval(() => {
                var d = new Date().toLocaleString();
                document.getElementById('clock').innerHTML = d;
            }, 1000)
        })();
    </script> -->
    <!-- 
    <script>
    const button = document.getElementById('button');
    const button2 = document.getElementById('button2');
    const message = document.getElementById('showMessafe');
    let time;
    const valuechanged = () => {
        message.innerHTML = 'loading';
        let num = 0;
        time = setInterval(() => {
            message.innerHTML = ` i waiting for like ${num}`;
            num++;
        }, 1000)
    }


    button.addEventListener('click', valuechanged);
    button2.addEventListener('click', () => {
        clearInterval(time);
    });
    </script> -->
</body>

</html>