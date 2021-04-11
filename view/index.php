<?php ob_start(); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <a class="btn <?php if ($categoryFilter == 0) {
                            echo 'btn-primary';
                        } else {
                            echo 'btn-outline-primary';
                        } ?>" href="index.php">Toutes les catégories</a>
                        <?php
                        foreach ($categories as $category) {
                            if ($category['id'] == $categoryFilter) {
                                ?>
                                <a href="index.php?category=<?php echo $category['id']; ?>" class="btn"
                                   style="background-color: <?php echo $category['color']; ?>; color: #fff;">
                                    <?php echo $category['name']; ?>
                                </a>

                            <?php } else { ?>
                                <a href="index.php?category=<?php echo $category['id']; ?>" class="btn"
                                   style="color: <?php echo $category['color']; ?>; border-color: <?php echo $category['color']; ?>;">
                                    <?php echo $category['name']; ?>
                                </a>

                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Webinaire</th>
                <th scope="col">Lien</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($webinars as $webinar) {
                ?>

                <tr>
                    <td scope="row"><?php echo date('d/m/Y - h\hi', strtotime($webinar['date'])); ?></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#webinar-<?php echo $webinar['id']; ?>">
                            <?php if (strtotime($webinar['date']) > time()) { // si la date est future ?>
                                <span class="badge badge-secondary align-top">À venir</span>
                            <?php } ?>
                            <?php echo htmlspecialchars($webinar['webinar_name']); ?>
                        </a>
                        <br/>
                        <span class="badge badge-pill"
                              style="background-color: <?php echo $webinar['color']; ?>; color: #fff;"><?php echo $webinar['category_name']; ?></span>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">
                            <?php if (strtotime($webinar['date']) > time()) { // si la date est future ?>
                                Rejoindre le webinaire
                            <?php } else { ?>
                                Replay
                            <?php } ?>
                        </a>

                        <div class="modal fade" id="webinar-<?php echo $webinar['id']; ?>" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            id="exampleModalLabel"><?php echo htmlspecialchars($webinar['webinar_name']); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Description</h5>
                                        <p><?php echo htmlspecialchars($webinar['description']); ?></p>
                                        <p><em>Webinaire créé par <?php echo $webinar['login']; ?></em></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

<?php $content = ob_get_clean();
require 'template.php'; ?>