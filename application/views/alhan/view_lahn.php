
<!-- Main -->
<div id="preview" >
    <div class="inner" >

        <div class="content">
            <header>
                <h2 style="text-align: right;"><?= $lahn->name ?></h2>
            </header>
            <center> <?= $lahn->link ?></center>
            <center><button onclick="btnClicked()" type="button" id="doneBTN" class="btn" style="background-color:#0F9E5E;color: #FFF" >Done (60)</button></center>

        </div>
    </div>

</div>

<script>

    var interval = setInterval(myTimer, 1000);
    var m = <?= $lahn->minutes ?>;
    var s = <?= $lahn->seconds ?>;
    var points_add = "<?= $user->visited ?>".includes("L_<?= $lahn->id ?>");

    function myTimer() {
        if (m < 0) {
            document.getElementById("doneBTN").innerHTML = "Done";
            clearInterval(interval); //stops timer
        } else {
            document.getElementById("doneBTN").innerHTML = "Done (" + m + ":" + s + ")";
            
            if (s == 0) {
                m--;
                s = 59;
            }
            s--;
        }

    }

    function btnClicked() {
        if (m >= 0) {
            show_alert_danger("please wait " + m + ":" + s + " seconds");
        } else if (points_add == false) {
            addPoints(5, "-L_<?= $lahn->id ?>");

        } else {
            show_alert_danger("you got these points before.. come again next week :)")
        }
    }

    function addPoints(p, v) {
        points_add = true;
        show_alert_success("+" + p + " points");
        $.ajax({
            url: "<?= base_url() ?>Points/add_points",
            type: "POST",
            data: {points: p, visited: v},
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


