
<!-- Main -->
<div id="preview" class="vertical">
    <div class="inner" >
        <div class="image fit">
            <img src="<?= $lesson[0]->image_link ?>" alt="" />

        </div>
        <div class="content">
            <header>
                <h2 style="text-align: right;"><?= $lesson[0]->title ?></h2>
            </header>

            <div style="border-radius: 15px;background-color: #00ffc4;padding:10px;margin-bottom: 10px;">
                <h2 style="text-align: right;color:blueviolet;"> الأية♦</h2>
                <p style="margin:0;font-size: 20px;text-align: right"> <?= $lesson[0]->verse ?></p>
            </div>

            <div style="border-radius: 15px;background-color: #00ffff;padding:10px;margin-bottom: 10px;">
                <h2 style="text-align: right;color:blueviolet;">الدرس♦</h2>
                <h3 style="margin:0;font-size: 20px;text-align: right"> <?= $lesson[0]->summary ?></h3>
            </div>

            <div style="border-radius: 15px;background-color: #fff700;padding:10px;margin-bottom: 10px;">
                <h2 style="text-align: right;color:blueviolet;"> التدريب♦</h2>
                <p style="margin:0;font-size: 20px;text-align: right;"> <?= $lesson[0]->tadreeb ?></p>
            </div>
            <center><button onclick="btnClicked()" type="button" id="doneBTN" class="btn" style="background-color:#0F9E5E;color: #FFF" >Done (60)</button></center>
        </div>
    </div>

</div>

<script>

    var interval = setInterval(myTimer, 1000);
    var t = 60;
    <?php
    $visited="false";
    if(strpos( $user->visited,"summary") !== false )
            $visited="true";
       ?>
    var points_add = <?=$visited?>;
   
    function myTimer() {
        if (t == 0) {
            document.getElementById("doneBTN").innerHTML = "Done";
            clearInterval(interval); //stops timer
        } else {
            document.getElementById("doneBTN").innerHTML = "Done (" + t + ")";

        }
        t--;
    }

    function btnClicked() {
        if (t > 0) {
            show_alert_danger("please wait " + t + " seconds");
        } else if (points_add == false) {
            addPoints(10,"-summary-");
            
        } else {
            show_alert_danger("you got these points before.. come again next week :)")
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


