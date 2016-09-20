
<!-- Main -->
<div id="preview" >
    <div class="inner" >

        <div class="content">
            <header>
                <h2 style="text-align: center;">Leadership points Table</h2>
            </header>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Name</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $prevAtt = -1;
                    foreach ($points as $point) {
                        $class = "";
                        $style = "";
                        if ($point->id == $this->session->id) {
                            $class = "hvr-pulse";
                            $style = 'style="background-color: aquamarine;"';
                        }
                        if ($point->points == $prevAtt)
                            $i--;
                        ?>
                        <tr class="<?= $class ?>" <?= $style ?>>
                            <td><?= $i++ ?></td>
                            <td><?= $point->name ?></td>
                            <td><?= $point->points ?></td> 
                        </tr>
                        <?php
                        $prevAtt = $point->points;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>


