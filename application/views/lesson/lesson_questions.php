
<!-- Main -->
<div id="preview" >
    <div class="inner" >
        <div class="image fit">
            <img src="<?= $lesson[0]->image_link ?>" alt="" />
        </div>
        <div class="content">
            <header>
                <h2 style="text-align: right;"><?= $lesson[0]->title ?></h2>
            </header>

            <?php
            foreach ($questions as $question) {
                $answers = array($question->correct_answer, $question->choice2, $question->choice3, $question->choice4);
                shuffle($answers);
                ?>
                <div style="border-radius: 15px;background-color: #00ffc4;padding:10px;margin-bottom: 20px;">

                    <div class="row">
                        <h2 style="text-align: right;color:blueviolet;"><?= $question->question ?></h2>
                    </div>

                    <style>
                        .choice{
                            border-radius: 15px;
                            padding:10px;
                            margin-bottom: 10px;
                            font-size: 28px;
                            text-align: center;
                            width:50%;
                            cursor: pointer;

                        }
                        .hvr-bounce-out {

                            vertical-align: middle;
                            -webkit-transform: translateZ(0);
                            transform: translateZ(0);
                            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                            -webkit-backface-visibility: hidden;
                            backface-visibility: hidden;
                            -moz-osx-font-smoothing: grayscale;
                            -webkit-transition-duration: 0.5s;
                            transition-duration: 0.5s;
                        }
                        .hvr-bounce-out:hover, .hvr-bounce-out:focus, .hvr-bounce-out:active {
                            -webkit-transform: scale(0.8);
                            transform: scale(0.8);
                            -webkit-transition-timing-function: cubic-bezier(0.47, 2.02, 0.31, -0.36);
                            transition-timing-function: cubic-bezier(0.47, 2.02, 0.31, -0.36);
                        }
                    </style>
                    <style>
                        @-webkit-keyframes hvr-buzz {
                            50% {
                                -webkit-transform: translateX(3px) rotate(2deg);
                                transform: translateX(3px) rotate(2deg);
                            }

                            100% {
                                -webkit-transform: translateX(-3px) rotate(-2deg);
                                transform: translateX(-3px) rotate(-2deg);
                            }
                        }

                        @keyframes hvr-buzz {
                            50% {
                                -webkit-transform: translateX(3px) rotate(2deg);
                                transform: translateX(3px) rotate(2deg);
                            }

                            100% {
                                -webkit-transform: translateX(-3px) rotate(-2deg);
                                transform: translateX(-3px) rotate(-2deg);
                            }
                        }

                        .hvr-buzz {
                            display: inline-block;
                            vertical-align: middle;
                            -webkit-transform: translateZ(0);
                            transform: translateZ(0);
                            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                            -webkit-backface-visibility: hidden;
                            backface-visibility: hidden;
                            -moz-osx-font-smoothing: grayscale;
                            -webkit-animation-name: hvr-buzz;
                            animation-name: hvr-buzz;
                            -webkit-animation-duration: 0.15s;
                            animation-duration: 0.15s;
                            -webkit-animation-timing-function: linear;
                            animation-timing-function: linear;
                            -webkit-animation-iteration-count: infinite;
                            animation-iteration-count: infinite;
                        }
                        

                    </style>

                    <form>
                        <div class="row" style="display: -webkit-box;">
                            <div onclick="checkanswer('<?= $answers[0] ?>', '<?= $question->correct_answer ?>','<?=$question->id?>')" class="choice hvr-bounce-out" style="background-color: #00ffff;">

                                <?= $answers[0] ?>
                            </div>

                            <div onclick="checkanswer('<?= $answers[1] ?>', '<?= $question->correct_answer ?>','<?=$question->id?>')" class="choice hvr-bounce-out" style="background-color: #fff700;">

                                <?= $answers[1] ?>
                            </div>
                        </div>

                        <div class="row" style="display: -webkit-box;">
                            <div onclick="checkanswer('<?= $answers[2] ?>', '<?= $question->correct_answer ?>','<?=$question->id?>')" class="choice hvr-bounce-out" style="background-color: #ffa500;">

                                <?= $answers[2] ?>
                            </div>

                            <div onclick="checkanswer('<?= $answers[3] ?>', '<?= $question->correct_answer ?>','<?=$question->id?>')" class="choice hvr-bounce-out" style="background-color: #ff00f7">

                                <?= $answers[3] ?>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <center> <i id="true_<?=$question->id?>" class="fa fa-check hvr-buzz" style="font-size:75px;display:none;" aria-hidden="true"><h5 id="ans_<?=$question->id?>"><?=$question->correct_answer?></h5></i></center>
                        <center><i id="false_<?=$question->id?>" class="fa fa-times hvr-buzz" style="font-size:75px;display:none;" aria-hidden="true"><h5 id="ans_<?=$question->id?>"><?=$question->correct_answer?></h5></i></center>
                        
                    </div>


                </div>
                <?php
            }
            ?>
        </div>
    </div>

</div>

<script type="text/javascript">
    function checkanswer($answer, $correct_answer,$id) {
        $true="true_"+$id;
        $false= "false_"+$id;       
        
               
        var points_add = "<?=$user->visited?>".includes("q_"+$id);
        
    
        if (document.getElementById($true).style.display == "none" && document.getElementById($false).style.display == "none") {
            if ($answer == $correct_answer){
                document.getElementById($true).style.display = "block";
                document.getElementById("ans_"+$id).fadeIn(1000);
                if(points_add==false)
                    addPoints(2,"-q_"+$id+"-");
                else
                    show_alert_danger("you have answerd this question before");
            }else
                document.getElementById($false).style.display = "block";
        }
    }
    
    
     function addPoints(p,v) {
         points_add = true;
         show_alert_success("+"+p+" points");
        $.ajax({
            url: "<?= base_url() ?>Points/add_points",
            type: "POST",
            data: {points: p,visited:v},
            dataType: "JSON",
            success: function () {
               
            }});

    }

    function show_alert_danger(message) {
        document.getElementById("myalert-danger").innerHTML = message;
        $('#myalert-danger').slideDown();
        $('#myalert-danger').fadeOut(5000);
    }
    function show_alert_success(message) {
        document.getElementById("myalert-success").innerHTML = message;
        $('#myalert-success').slideDown();
        $('#myalert-success').fadeOut(5000);
    }
</script>


