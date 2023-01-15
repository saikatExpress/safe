<?php include_once 'include/header.php'; ?>





<div class="all_complain_view">
    <h2>Fire Service Complain's Box</h2>
</div>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Complain's Table</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>COM ID</th>
                                <th>Name</th>
                                <th>Complains</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $db = new DataBase();
                            $query = "SELECT * FROM complains
                        LEFT JOIN user_reg on complains.u_id = user_reg.id
                         WHERE complains.category = 'fireservice'";

                            $data = $db->select($query);

                            foreach ($data ?: [] as $value) { ?>

                            <?php



                                $date = date_create($value['complain_time']);
                                $dateFormat = date_format($date, 'd M,y');
                                $timeFormat = date_format($date, "h.ia");




                                ?>

                            <tr>
                                <th scope="row"><?= $value['c_id'] ?></th>
                                <td><?= $value['firstname'] . " " . $value['lastname'] ?></td>
                                <td><?= $value['problems'] ?></td>
                                <td><?= $dateFormat . "<br>" . $timeFormat ?></td>
                                <td><a href="#" class="btn btn-success">Progress</a></td>
                            </tr>
                            <?php }


                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include_once 'include/footer.php'; ?>