
<!-- Main -->
<div id="preview" >
    <div class="inner" >

        <div class="content">
            <header>
                <h2 style="text-align: center;">Leadership attendance Table</h2>
            </header>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Name</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $prevAtt = -1;
                    foreach ($attendance as $att) {
                        $class = "";
                        $style = "";
                        if ($att->id == $this->session->id) {
                            $class = "hvr-pulse";
                            $style = 'style="background-color: aquamarine;"';
                        }
                        if ($att->attendance == $prevAtt)
                            $i--;
                        ?>
                        <tr class="<?= $class ?>" <?= $style ?>>
                            <td><?= $i++ ?></td>
                            <td><?= $att->name ?></td>
                            <td><?= $att->attendance ?></td> 
                        </tr>
                        <?php
                        $prevAtt = $att->attendance;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>


